<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 22/06/2016
 * Time: 10:56
 */
require_once __DIR__ . "/vendor/autoload.php";
try {
    $pdo = new PDO ('mysql:host=marylousadroot.mysql.db;dbname=marylousadroot;charset=UTF8', 'marylousadroot', 'jJHRtf7xnu24');
    $pdo->exec('set names UTF8');
} catch (PDOException $e) {

    die ($e->getMessage());
}