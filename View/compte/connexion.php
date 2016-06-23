<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 22/06/2016
 * Time: 10:56
 */
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1>USER - CONNEXION</h1>
<form action="index.php?a=connexion" method="POST">
    <input type="text" name="email">
    <input type="password" name="password">
    <input type="submit">
</form>
<a href="index.php">Accueil</a>
<h1><?= isset($msg) ?  $msg : ''?></h1>
</body>
</html>
