<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 22/06/2016
 * Time: 10:54
 */

namespace Controller;

use Model\UserRepository;

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
            include "View/compte/inscription.php";
        } elseif ($_POST['password'] != $_POST['password2']) {
            echo 'Vos mot de passe ne correspondent pas';
            include "View/compte/inscription.php";
        } else {
            $data = $_POST;
            $hash = hash('sha256', $data['password'] . $data['email']);
            $data['hash'] = $hash;
            $this->repository->insertUser($data);
            include "View/compte/connexion.php";
        }
    }

    public function connexionAction()
    {
        $email = $this->repository->getUser($_POST['email']);
        if ($email != false && $email->hash == hash('sha256', $_POST['password'] . $_POST['email'])) {
            session_unset();
            $_SESSION['login'] = $email->email;
            $_SESSION['user_id'] = $email->id;
            $this->show();
        } else {
            session_unset();
            session_destroy();
            $msg = 'ta race';
            require "View/compte/connexion.php";
        }
    }

    public function displayConnexion()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->connexionAction();
            return;
        }
        require "View/compte/connexion.php";
    }

    public function show()
    {
        require "View/compte/profile_user.php";
    }

    /**
     * Check if user is connect
     * 
     * @return bool
     */
    private function checkAuth()
    {
        if ( !isset($_SESSION['user_id'])) return false;
        return true;
    }
}
