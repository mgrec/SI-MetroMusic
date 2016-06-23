<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 22/06/2016
 * Time: 16:20
 */

namespace Controller;


use Model\ArtisteRepository;

class ArtisteController
{
    private $repository;

    public function __construct(\PDO $pdo)
    {
        $this->repository = new artisteRepository($pdo);
    }

    public function displayInscription()
    {
        include "View/artiste/inscription.php";
    }
    
    public function insertAction()
    {
        if (count($_POST) === 0) {
            include "View/artiste/inscription.php";
        } elseif ($_POST['password'] != $_POST['password2']) {
            echo 'Vos mot de passe ne correspondent pas';
            include "View/artiste/inscription.php";
        } else {
            $data = $_POST;
            $hash = hash('sha256', $data['password'] . $data['email']);
            $data['hash'] = $hash;
            $this->repository->insertUser($data);
            include "View/artiste/connexion.php";
        }
    }

    public function connexionAction()
    {
        $email = $this->repository->getUser($_POST['email']);
        if ($email != false && $email->hash == hash('sha256', $_POST['password'] . $_POST['email'])) {
            session_unset();
            $_SESSION['login'] = $email->email;
            $_SESSION['artiste_id'] = $email->id;
            $this->show();
        } else {
            session_unset();
            session_destroy();
            $msg = 'ta race';
            require "View/artiste/connexion.php";
        }
    }

    public function displayConnexion()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->connexionAction();
            return;
        }
        require "View/artiste/connexion.php";
    }

    public function show()
    {
        require "View/artiste/profile_artiste.php";
    }
    
    public function addProj(){
            if (count($_POST) === 0) {
                require "View/artiste/ajouter.php";
            } else {
                $data = $_POST;
                $data['id_artiste'] = $_SESSION['artiste_id'];
                $this->repository->insertProj($data);
                require "View/artiste/profile_artiste.php";
            }
    }

    /**
     * Check if user is connect
     *
     * @return bool
     */
    private function checkAuth()
    {
        if ( !isset($_SESSION['artiste_id'])) return false;
        return true;
    }
}