<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 23/06/2016
 * Time: 10:39
 */

namespace Controller;
use Controller\ArtisteController;
use Controller\UserController;
use Model\FrontRepository;

class FrontController
{
    private $artiste;
    private $user;
    private $repository;
    
    public function __construct(\PDO $pdo)
    {
        $this->artiste = new ArtisteController($pdo);
        $this->user = new UserController($pdo);
        $this->repository = new FrontRepository($pdo);
    }

    public function displayDefault()
    {
        $data = $this->repository->GetEvent();
        require 'View/display.php';
    }
    
    public function displayUser()
    {
        $this->user->insertAction();
        require 'View/compte/displayUser.php';
    }
    
    public function displayArtiste()
    {
        $this->artiste->insertAction();
        require 'View/artiste/displayArtiste.php';
    }
    
}