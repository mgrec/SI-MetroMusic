<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 21/06/2016
 * Time: 15:12
 */
require_once 'init.php';
session_start();
$user = new \Controller\UserController($pdo);
$artiste = new \Controller\ArtisteController($pdo);
$front = new \Controller\frontController($pdo);
//SELECT ligne FROM est_sur WHERE id_station = (SELECT station FROM groupe WHERE id = 1);
$action = '';
if (isset($_GET['a'])) {
    $action = $_GET['a'];
}
switch ($action) {
    case 'user':
        $front->displayUser();
        break;
    case 'artiste':
        $front->displayArtiste();
        break;
    case 'connexion':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user->connexionAction();
        } else {
            $user->displayConnexion();
        }
        break;
    case 'connexionartiste':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $artiste->connexionAction();
        } else {
            $artiste->displayConnexion();
        }
        break; 
    case 'ajouter':
        $artiste->addProj();
        break;
    case 'like' :
        $user->like();
        break;
    case 'inscription' :
        $front->displayDefault();
        break;
    case 'follow' :
        $user->follow();
        break;
    case 'search' :
        $user->search();
        break;
    case 'deconnexion' :
        $front->deconnexion();
        $front->home();
        break;
    case 'itineraire':
        $user->itineraireDisplay();
        break;
    default :
        $front->home();
        break;
}

?>