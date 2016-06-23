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
        $sql = 'SELECT * FROM `representation`';
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $row;
    }
    
}