<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 23/06/2016
 * Time: 11:12
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/accueil_profile.css">
    <script src="assets/js/jquery-2.2.3.js"></script>
    <title>SubSound</title>
</head>

<body>

<!--PROFIL-->
<div class="profil">
    <div class="profil_close">
        <a role="button" class="arrowr" href=""><img src="assets/img/arrow_right.png" alt=""></a>
    </div>

    <div class="profil_open">
        <?php foreach ($infos as $item1): ?>
        <a href="" class="modif_infos">Modifier mes infos</a>
            <img src="assets/img/arrow_left.png" alt="" class="arrow_left arrowl">
        <div class="circular profil2" style="background: url(uploads/<?=$item1->image?>) center;"></div>
        <h2><?= $item1->nom?></h2>
        <?php endforeach; ?>
        <div class="menu">
            <ul>
                <li><a href="">Artiste</a></li>
                <hr>
                <li><a href="">Abonnés</a></li>
                <span>123</span>
                <li><a href="">Abonnements</a></li>
                <span>196</span>
                <li><a href="">Plan métro</a></li>
                <li><a href="">Lignes de métro</a></li>
                <li><a href="">Trouver un itinéraire</a></li>
                <li><a href="index.php?a=deconnexion">Déconnexion</a></li>
            </ul>
        </div>

        <nav>
            <ul>
                <li>
                    <a href="">Droits d'auteur</a>
                </li>
                <li>
                    <a href="">Confidentialité</a>
                </li>
                <br>
                <li>
                    <a href="">À propos</a>
                </li>
                <li>
                    <a href="">Conditions d'utilisation</a>
                </li>
                <li>
                    <a href="">Contact</a>
                </li>
            </ul>
        </nav>

    </div>
</div>
<!--FIN PROFIL-->

<div class="content">



    <img src="assets/img/logo.png" alt="" class="logo">
    <!--RECHERCHE-->
    <div class="recherche">
        <form action="index.php?a=search" method="post">
            <input name='search' class="recherche-search" type="search">
            <input class="recherche-ipt" type="submit" value="Rechercher">
        </form>
    </div>
    <!--FIN RECHERCHE-->

    <!--ACTUALITES-->
    <div class="actualites">

        <form action="index.php?a=ajouter" method="post" class="partager">
            <img src="assets/img/photo_profil.png" alt="" class="photo_profil">
            <input type="text" name="nom" class="titre" placeholder="Ajouter un titre à votre publication">
            <input type="text" name="description" class="commentaire" placeholder="Ajouter une description à votre publication">
            <img src="assets/img/photo.png" alt="" class="photo">
            <a href="">Ajouter une photo/vidéo</a><img src="assets/img/lieu.png" alt="" class="lieu">
            <a href="">Ajouter un lieu et une date</a>
            <input type="submit" value="Partager" class="btn_partager">
        </form>

        <h2>En ce moment sur nos lignes de métro parisiennes <hr></h2>
        <?php foreach ($data as $item): ?>
        <div class="actu_recente">
            <img src="assets/img/photo1.png" alt="" class="photo_profil">
            <div class="infos">
                <h3><?= $item->repnom ?></h3>
                <p class="auteur">Par <span><?= $item->nom ?></span></p>
                <p class="lieu">à <span><?= $item->station ?></span> - <span class="l5">Ligne <img src="assets/img/l5.png" alt=""></span></p>
                <p class="horaire">actuellement, <span>de 8h à 10h</span></p>
                <input class="info-submit" type="submit" value="Suivre">
            </div>
            <p class="description"><?= $item->description ?></p>

            <img src="assets/img/photo2.png" alt="" class="photo2">

            <div class="legende">
                <img src="assets/img/coeur.png" alt="" class="coeur">
                <p class="liker"><a href="">Aimer la publication</a>mentions (<?=$item->mescouilles?>)</p>
                <p class="commenter"><a href=""><span>Commenter</span></a> - (6) commentaires</p>
                <img src="assets/img/train_bleu.png" alt="" class="train">
                <p class="trouver"><a href="">Trouver un itinéraire</a></p>
            </div>


        </div>
        <?php endforeach; ?>

    </div>
    <!--FIN ACTUALITES-->


    <!--AMIS-->
    <div class="amis">
        <h2>Que font vos followers <hr></h2>
    </div>
    <!--FIN AMIS-->


</div>
<script>
    $('.arrowr').click(function() {
        event.preventDefault();
        $('.profil_open').css('display','block');
        $('.profil_close').css('display','none');
    });

    $('.arrowl').click(function() {
        event.preventDefault();
        $('.profil_open').css('display','none');
        $('.profil_close').css('display','block');
    });
</script>

</body>

</html>