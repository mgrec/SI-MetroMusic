<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/accueil_profil.css">
    <link rel="stylesheet" href="assets/js/index.js">
    <title>SubSound</title>
</head>

<body>

<!--PROFIL-->
<header></header>

<div class="profil">
    <div class="profil_close">
        <a class="arrowr" href=""><img src="assets/img/arrow_right.png" alt=""></a>
    </div>
    <?php foreach ($infos as $item1): ?>
    <div class="profil_open">
        <a href="" class="modif_infos">Modifier mes infos</a>
        <img src="assets/img/arrow_left.png" alt="" class="arrow_left arrowl">
        <div class="circular profil2" style="background: url(uploads/<?=$item1->image?>) center;"></div>
        <h2><?= $item1->nom?></h2>
        <?php endforeach; ?>
        <div class="menu">
            <ul>
                <li><a href="">Suber</a></li>
                <hr>
                <li><a href="">Abonnements</a></li>
                <?php foreach ($infos2 as $item2): ?>
                <span><?=$item2->numb?></span>
                <?php endforeach; ?>
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
<div class="all">
    <div class="content">
        <img src="assets/img/logo.png" alt="" class="logo">
        <!--RECHERCHE-->
        <div class="barre">
            <div class="recherche">
                <form action="index.php?a=search" method="POST">
                <input name="search" class="search" type="search" placeholder="Tapez votre recherche ">
                <button class="loupe" type="submit" >
                    <img src="assets/img/loupe.png" alt="">
                </button>
                </form>
            </div>
        </div>
        <!--FIN RECHERCHE-->

        <!--ACTUALITES-->
        <div class="actualites">
            

            <h2 class="moment">En ce moment sur nos lignes de métro parisiennes </h2><hr>
            <?php foreach ($data as $item): ?>
            <div class="actu_recente">
                <a class="suivre"href="index.php?a=follow&id=<?=$item->id_artiste?>">Suivre</a>
                <div class="circular2 photo_profil" style="background: url(uploads/<?=$item->image?>) center;"></div>
                <div class="infos">
                    <h3>Style Rock Music</h3>
                    <p class="auteur">Par <span><?=$item->nom?></span></p>                </div>
                <div class="infosplus"><p class="lieu">à <span><?=$item->station?></span> - <span class="l5">Ligne <img src="img/l5.png" alt=""></span></p>
                    <p class="horaire">actuellement, <span>de 8h à 10h</span></p></div>


                <p class="description"><?=$item->description?></p>

                <img src="assets/img/photo2.png" alt="" class="photo2">

                <div class="legende">
                    <img src="assets/img/coeur.png" alt="" class="coeur">
                    <div class="aime"><a href="index.php?a=like&id=<?=$item->repid?>">Aimer la publication</a> -  </div> <span> (<?=$item->countlike?>) </span><div class="aime"> mentions</div>

                    <p class="commenter"><a href=""><span>Commenter</span></a> - (6) commentaires</p>
                    <img src="assets/img/train_bleu.png" alt="" class="train">
                    <div class="find"><a href="">Trouver un itinéraire</a></div>
                </div>


            </div>
            <?php endforeach; ?>
        </div>
        <!--FIN ACTUALITES-->

        <!--AMIS-->
        <div class="amis">
            <h2>Que font vos artistes préférés <hr></h2>
            <?php foreach ($follow as $item2): ?>
            <div class="commentaire">
                <div class="circular2 photo_ami" style="background: url(uploads/<?=$item2->image?>) center;"></div>
                <p class="ago">Il y a 5 minutes</p>
                <h2><?=$item2->nom?></h2>
                <p class="place">à <span><?=$item2->station?></span></p>
                <p class="avis"><?=$item2->description?></p>
                <div class="interaction">
                    <img src="assets/img/train_bleu.png" alt="" class="train_bleu">
                    <p class="commenter"><a href="">Commenter</a> - (6) commentaires</p>
                </div>
                <?php endforeach; ?>
            </div>

        <!--FIN AMIS-->

    </div>
</div>
<footer>
    <a class="menu" href=""><div class="acti"><span>Activités</span></div></a><a class="menu" href=""><div class="actu"><span>Actualités</span></div><a class="menu" href=""><div class="part"><span>Partager</span></div></a>
</footer>
    <script src="assets/js/jquery-2.2.3.js"></script>
    <script>
        $('.arrowr').click(function(event) {
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