<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 22/06/2016
 * Time: 10:54
 */

namespace Controller;

use Model\UserRepository;
use Intervention\Image\ImageManagerStatic as Image;

class UserController
{
    private $repository;

    public function __construct(\PDO $pdo)
    {
        $this->repository = new UserRepository($pdo);
    }

    public function displayInscription()
    {
        include "View/compte/inscription.php";
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
            if ($mime == 'image/jpeg') {
                $extension = '.jpg';
            } elseif ($mime == 'image/png') {
                $extension = '.png';
            } elseif ($mime == 'image/gif') {
                $extension = '.gif';
            } else {
                $extension = '';
            }
            $filename = time() . $extension;
            $img->resize(80, 80);
            $img->save('uploads/' . $filename);
            $data['image'] = $filename;
            $this->repository->insertUser($data);
            $row = $this->repository->GetEvent();
            include "View/home.php";
        }
    }

    public function connexionAction()
    {
        $check = $this->checkAuth();
        if ($check == true) {
            $infos = $this->repository->GetInfo($_SESSION['user_id']);
            $data = $this->repository->GetEvent();
            $follow = $this->repository->GetEventFollow($_SESSION['user_id']);
            $infos2 = $this->repository->GetInfosFollow($_SESSION['user_id']);
            require 'View/compte/profile_user.php';
        } else {
            $email = $this->repository->getUser($_POST['email']);
            if ($email != false && $email->hash == hash('sha256', $_POST['password'] . $_POST['email'])) {
                session_unset();
                $_SESSION['login'] = $email->email;
                $_SESSION['user_id'] = $email->id;
                $infos = $this->repository->GetInfo($_SESSION['user_id']);
                $follow = $this->repository->GetEventFollow($_SESSION['user_id']);
                $infos2 = $this->repository->GetInfosFollow($_SESSION['user_id']);
                $this->show();
            } else {
                session_unset();
                session_destroy();
                $msg = 'Erreur de connexion : mauvaise combinaison email/mot de passe';
                $row = $this->repository->GetEvent();
                require "View/home.php";
            }
        }
    }

    public function displayConnexion()
    {
        $check = $this->checkAuth();
        if ($check == true) {
            $data = $this->repository->GetEvent();
            $infos = $this->repository->GetInfo($_SESSION['user_id']);
            $infos2 = $this->repository->GetInfosFollow($_SESSION['user_id']);
            $follow = $this->repository->GetEventFollow($_SESSION['user_id']);
            require 'View/compte/profile_user.php';
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->connexionAction();
                return;
            }
            $row = $this->repository->GetEvent();
            require "View/home.php";
        }
    }

    public function like()
    {
        $data['id'] = $_GET['id'];
        $data['user_id'] = $_SESSION['user_id'];
        $this->repository->like_repr($data);
        $this->show();
    }

    public function follow()
    {
        $data['id'] = $_GET['id'];
        $data['user_id'] = $_SESSION['user_id'];
        $this->repository->follow_usr($data);
        $this->show();
    }

    public function show()
    {
        $data = $this->repository->GetEvent();
        $infos = $this->repository->GetInfo($_SESSION['user_id']);
        $infos2 = $this->repository->GetInfosFollow($_SESSION['user_id']);
        $follow = $this->repository->GetEventFollow($_SESSION['user_id']);
        require "View/compte/profile_user.php";
    }

    public function search()
    {
        $data = $_POST['search'];
        $data = $this->repository->search($data);
        $infos = $this->repository->GetInfo($_SESSION['user_id']);
        $infos2 = $this->repository->GetInfosFollow($_SESSION['user_id']);
        $follow = $this->repository->GetEventFollow($_SESSION['user_id']);
        require 'View/compte/search.php';
    }
    
    public function itineraireDisplay()
    {
        $infos = $this->repository->GetInfo($_SESSION['user_id']);
        $infos2 = $this->repository->GetInfosFollow($_SESSION['user_id']);
        $follow = $this->repository->GetEventFollow($_SESSION['user_id']);
        $data = $_GET['i'];
        $ligne = $this->repository->station($data);
        require 'View/itineraire.php';
    }

    /**
     * Check if user is connect
     *
     * @return bool
     */
    private function checkAuth()
    {
        if (!isset($_SESSION['user_id'])) {
            return false;
        }
        return true;
    }
}
