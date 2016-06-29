<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 22/06/2016
 * Time: 16:20
 */

namespace Controller;


use Model\ArtisteRepository;
use Intervention\Image\ImageManagerStatic as Image;

class ArtisteController
{
    private $repository;

    public function __construct(\PDO $pdo)
    {
        $this->repository = new artisteRepository($pdo);
    }

    public function insertAction()
    {
        if (count($_POST) === 0) {
            include "View/display.php";
        } elseif ($_POST['password'] != $_POST['password2']) {
            echo 'Vos mot de passe ne correspondent pas';
            include "View/display.php";
        } else {
            $data = $_POST;
            $hash = hash('sha256', $data['password'] . $data['email']);
            $data['hash'] = $hash;
            $img = Image::make($_FILES['image']["tmp_name"]);

            $mime = $img->mime();
            if ($mime == 'image/jpeg')
                $extension = '.jpg';
            elseif ($mime == 'image/png')
                $extension = '.png';
            elseif ($mime == 'image/gif')
                $extension = '.gif';
            else
                $extension = '';

            $filename  = time() . $extension;
            $img->resize(100,100);
            $img->save('uploads/'. $filename);
            $data['image'] = $filename;
            $this->repository->insertUser($data);
            $row = $this->repository->GetEvent();
            include "View/home.php";
        }
    }

    public function connexionAction()
    {
        $email = $this->repository->getUser($_POST['email']);
        if ($email != false && $email->hash == hash('sha256', $_POST['password'] . $_POST['email'])) {
            session_unset();
            $_SESSION['login'] = $email->email;
            $_SESSION['artiste_id'] = $email->id;
            $infos = $this->repository->GetInfo($_SESSION['artiste_id']);
            $infos2 = $this->repository->GetInfosFollow($_SESSION['artiste_id']);
            $this->show();
        } else {
            session_unset();
            session_destroy();
            $msg = 'Erreur de connexion : mauvaise combinaison email/mot de passe';
            $data = $this->repository->GetEvent();
            $row = $this->repository->GetEvent();
            require "View/home.php";
        }
    }

    public function displayConnexion()
    {
        $check = $this->checkAuth();
        if ($check == true) {
            $data = $this->repository->GetEvent();
            $infos = $this->repository->GetInfo($_SESSION['artiste_id']);
            $infos2 = $this->repository->GetInfosFollow($_SESSION['artiste_id']);
            require 'View/artiste/profile_artiste.php';
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->connexionAction();
                return;
            }
            $row = $this->repository->GetEvent();
            require "View/home.php";
        }
    }

    public function show()
    {
        $data = $this->repository->GetEvent();
        $infos = $this->repository->GetInfo($_SESSION['artiste_id']);
        $infos2 = $this->repository->GetInfosFollow($_SESSION['artiste_id']);
        require "View/artiste/profile_artiste.php";
    }


    public function addProj()
    {
        if (count($_POST) === 0) {
            require "View/artiste/ajouter.php";
        } else {
            $data = $_POST;
            $data['id_artiste'] = $_SESSION['artiste_id'];
            $this->repository->insertProj($data);
            $this->show();
        }
    }
    
    /**
     * Check if user is connect
     *
     * @return bool
     */
    private
    function checkAuth()
    {
        if (!isset($_SESSION['artiste_id'])) {
            return false;
        }
        return true;
    }
}
