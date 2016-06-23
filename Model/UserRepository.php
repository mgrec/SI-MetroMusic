<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 22/06/2016
 * Time: 10:55
 */

namespace Model;


class UserRepository
{
    private $PDO;

    public function __construct(\PDO $pdo)
    {
        $this->PDO = $pdo;
    }
    
    public function insertUser(array $data)
    {   $sql = "INSERT INTO `user` (`email`, `nom`, `hash`) VALUES (:email, :nom, :hash)";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':email', $data['email'], \PDO::PARAM_STR);
        $stmt->bindParam(':nom', $data['nom'], \PDO::PARAM_STR);
        $stmt->bindParam(':hash', $data['hash'], \PDO::PARAM_STR);
        $stmt->execute();
    }

    public function getUser($email){
        $sql = 'SELECT `id`, `email`, `hash` FROM `user` WHERE `email` = :email';
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_OBJ);
        return $row;
    }

}