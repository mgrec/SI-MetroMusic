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
<h1>AJOUTER UN EVENEMENTS</h1>
<form action="" method="POST">
    <input type="text" name="nom">
    <input type="text" name="description">
    <input type="text" name="date">
    <input type="select" name="station">
    <input type="submit">
    <?= $_SESSION['artiste_id']?>
</form>

</body>
</html>
