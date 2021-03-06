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
    {   $sql = "INSERT INTO `user` (`email`, `nom`, `hash`, `type`, `image`) VALUES (:email, :nom, :hash, 1, :image)";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':email', $data['email'], \PDO::PARAM_STR);
        $stmt->bindParam(':nom', $data['nom'], \PDO::PARAM_STR);
        $stmt->bindParam(':hash', $data['hash'], \PDO::PARAM_STR);
        $stmt->bindParam(':image', $data['image'], \PDO::PARAM_STR);
        $stmt->execute();
    }

    public function getUser($email){
        $sql = 'SELECT `id`, `email`, `hash`, `nom` FROM `user` WHERE `email` = :email && `type` = 1';
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_OBJ);
        return $row;
    }

    public function insertProj(array $data)
    {   $sql = "INSERT INTO `representation` (`nom`, `description`, `id_artiste`, `date`, `image`, `plage_de`, `plage_a`, `station`) VALUES (:nom, :description, :id_artiste, :date, :image, :plage_de, :plage_a, :station)";
        $time2 = date('H:i:s', gmdate('U'));
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':nom', $data['nom'], \PDO::PARAM_STR);
        $stmt->bindParam(':description', $data['description'], \PDO::PARAM_STR);
        $stmt->bindParam(':id_artiste', $data['id_artiste'], \PDO::PARAM_STR);
        $stmt->bindParam(':date', $time2, \PDO::PARAM_STR);
        $stmt->bindParam(':image', $data['image'], \PDO::PARAM_STR);
        $stmt->bindParam(':plage_de', $data['plage_de'], \PDO::PARAM_STR);
        $stmt->bindParam(':plage_a', $data['plage_a'], \PDO::PARAM_STR);
        $stmt->bindParam(':station', $data['station'], \PDO::PARAM_STR);
        $stmt->execute();
    }

    public function GetEvent()
    {
        $sql = 'SELECT
(
  SELECT count(*)
  FROM `like_par`
  WHERE id_repr = r.id
)as countlike,
r.id as repid,
r.nom as repnom,
r.image as repimg,
description,
station,
plage_de,
plage_a,
user.nom,
user.image,
id_artiste
FROM
  `representation` r
  INNER JOIN user ON user.id = id_artiste ORDER BY repid DESC';
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $row;
    }

    public function GetInfo($data)
    {
        $sql = 'SELECT * FROM user WHERE id = :id';
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id', $data, \PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $row;
    }

    public function GetInfosFollow($data)
    {
        $sql="SELECT COUNT(id) as numb FROM suivis_par WHERE suivis_par.id_artiste = :id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id', $data, \PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $row;
    }

    public function whoFollowMe($data)
    {
        $sql='SELECT suivis_par.id_user, suivis_par.date, user.nom, user.image FROM suivis_par INNER JOIN user ON user.id = suivis_par.id_user WHERE id_artiste = :id';
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id', $data, \PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $row;
    }
    
    public function UpdateUser(array $data)
    {
        $sql="UPDATE `user` SET `nom` = :nom,`email` = :email,`hash` = :hash WHERE `id` = :artiste_id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':artiste_id', $data['id_artiste'], \PDO::PARAM_INT);
        $stmt->bindParam(':nom', $data['nom'], \PDO::PARAM_STR);
        $stmt->bindParam(':email', $data['email'], \PDO::PARAM_STR);
        $stmt->bindParam(':hash', $data['hash'], \PDO::PARAM_STR);
        $stmt->execute();
    }
}