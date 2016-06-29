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
    {
        $sql = "INSERT INTO `user` (`email`, `nom`, `hash`, `type`, `image`) VALUES (:email, :nom, :hash, 0, :image)";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':email', $data['email'], \PDO::PARAM_STR);
        $stmt->bindParam(':nom', $data['nom'], \PDO::PARAM_STR);
        $stmt->bindParam(':hash', $data['hash'], \PDO::PARAM_STR);
        $stmt->bindParam(':image', $data['image'], \PDO::PARAM_STR);
        $stmt->execute();
    }

    public function getUser($email)
    {
        $sql = 'SELECT `id`, `email`, `hash` FROM `user` WHERE `email` = :email && `type` = 0';
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_OBJ);
        return $row;
    }

    public function like_repr(array $data)
    {  
        $sql = "INSERT INTO `like_par` (`id_repr`, `id_user`, `etat`) VALUES (:id_repr, :id_user, 1)";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id_repr', $data['id']);
        $stmt->bindParam(':id_user', $data['user_id']);
        $stmt->execute();
    }
    
    public function incrLike(array $data)
    {
        $sql2="UPDATE representation SET like_count = like_count + 1  WHERE id = :id";
        $stmt2 = $this->PDO->prepare($sql2);
        $stmt2->bindParam(':id', $data['id']);
        $stmt2->execute();
    }
    
    public function GetEvent()
    {
        $sql = 'SELECT
(
  SELECT count(*)
  FROM `like_par`
  WHERE id_repr = r.id
)as mescouilles,
r.id as repid,
r.nom as repnom,
description,
station,
user.nom,
user.image,
id_artiste
FROM
  `representation` r
  INNER JOIN user ON user.id = id_artiste';
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $row;
    }

    public function follow_usr(array $data)
    {
        $sql = "INSERT INTO `suivis_par` (`id_artiste`, `id_user`, `etat`) VALUES (:id_artiste, :id_user, 1)";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id_artiste', $data['id']);
        $stmt->bindParam(':id_user', $data['user_id']);
        $stmt->execute();
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
    
    public function GetEventFollow($data)
    {
        $sql="SELECT * FROM representation INNER JOIN suivis_par ON suivis_par.id_artiste = representation.id_artiste && suivis_par.etat = 1 INNER JOIN user ON user.id = suivis_par.id_artiste WHERE suivis_par.id_user = 34";
        $stmt = $this->PDO->prepare($sql);
        $stmt->bindParam(':id_user', $data, \PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $row;
    }
    
    public function search($data)
    {
        $sql="SELECT
(
  SELECT count(*)
  FROM `like_par`
  WHERE id_repr = r.id
)as mescouilles,
r.id as repid,
r.nom as repnom,
description,
station,
user.nom,
user.image,
id_artiste
FROM
  `representation` r
  INNER JOIN user ON user.id = id_artiste WHERE station LIKE '%$data%' ORDER BY station";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $row;
    }
}