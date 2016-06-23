<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 22/06/2016
 * Time: 16:20
 */

namespace Model;


class ArtisteRepository
{
    private $PDO;

    public function __construct(\PDO $pdo)
    {
        $this->PDO = $pdo;
    }

    public function insertUser(array $data)
    {   $sql = "INSERT INTO `artiste` (`email`, `nom`, `hash`) VALUES (:email, :nom, :hash)";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':email', $data['email'], \PDO::PARAM_STR);
        $stmt->bindParam(':nom', $data['nom'], \PDO::PARAM_STR);
        $stmt->bindParam(':hash', $data['hash'], \PDO::PARAM_STR);
        $stmt->execute();
    }

    public function getUser($email){
        $sql = 'SELECT `id`, `email`, `hash` FROM `artiste` WHERE `email` = :email';
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_OBJ);
        return $row;
    }

    public function insertProj(array $data)
    {   $sql = "INSERT INTO `representation` (`nom`, `description`, `date`, `id_artiste`) VALUES (:nom, :description, :date, :id_artiste)";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':nom', $data['nom'], \PDO::PARAM_STR);
        $stmt->bindParam(':description', $data['description'], \PDO::PARAM_STR);
        $stmt->bindParam(':date', $data['date'], \PDO::PARAM_STR);
        $stmt->bindParam(':id_artiste', $data['id_artiste'], \PDO::PARAM_STR);
        $stmt->execute();
    }
}