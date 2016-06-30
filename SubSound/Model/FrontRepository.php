<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 23/06/2016
 * Time: 14:38
 */

namespace Model;


class FrontRepository
{
    private $PDO;

    public function __construct(\PDO $pdo)
    {
        $this->PDO = $pdo;
    }

    public function GetEvent()
    {
        $sql = 'SELECT representation.nom as repnom, description, station, user.nom, user.image, plage_de, plage_a FROM `representation` INNER JOIN user ON user.id = id_artiste';
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $row;
    }
    
}