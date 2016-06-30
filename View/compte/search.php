<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/accueil_profil.css">
    <title>SubSound</title>
</head>

<body>

<!--PROFIL-->
<header></header>

<div class="profil">
    <div class="profil_close">
        <a class="arrowr" href=""><img src="assets/img/arrow_right.png" alt=""></a>
    </div>

    <div class="profil_open">
        <a href="" class="modif_infos">Modifier mes infos</a>
        <img src="assets/img/arrow_left.png" alt="" class="arrowl arrow_left">
        <img src="assets/img/photo_profil2.png" alt="" class="profil2">
        <h2>Julien Lavigne</h2>
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
                <li><a href="">Déconnexion</a></li>
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
                <form action="index.php?a=search" method="post">
                    <input name="search" class="search" type="search" placeholder="Tapez votre recherche ">
                    <button type="submit" class="loupe" >
                        <img src="assets/img/loupe.png" alt="">
                    </button>
                </form>
            </div>
        <!--FIN RECHERCHE-->

        <!--ACTUALITES-->
        <div class="actualites">
            <div class="recente">
                <h2 class="moment">En ce moment sur nos lignes de métro parisiennes <hr class="trait"></h2>
                <?php foreach ($data as $item): ?>
                    <div class="actu_recente">
                        <a class="suivre"href="index.php?a=follow&id=<?=$item->id_artiste?>">Suivre</a>
                        <div class="circular2 photo_profil" style="background: url(uploads/<?=$item->image?>) center;"></div>
                        <div class="infos">
                            <h3><?=$item->repnom?></h3>
                            <p class="auteur">Par <span><?=$item->nom?></span></p>                </div>
                        <div class="infosplus"><p class="lieu">à <span><?=$item->station?>,</span></p>
                            <p class="horaire">Horaires : <span>de 8h à 10h</span></p></div>


                        <p class="description"><?=$item->description?></p>

                        <img src="uploads/<?=$item->repimg?>" alt="" class="photo2">

                        <div class="legende">
                            <img src="assets/img/coeur.png" alt="" class="coeur">
                            <div class="aime"><a href="index.php?a=like&id=<?=$item->repid?>">Aimer la publication</a> - </div> <span>(<?=$item->countlike?>)</span><div class="aime"> mentions</div>

                            <p class="commenter"><a href=""><span>Commenter</span></a> - (6) commentaires</p>
                            <img src="assets/img/train_bleu.png" alt="" class="train">
                            <div class="find"><a href="">Trouver un itinéraire</a></div>
                        </div>


                    </div>
                <?php endforeach; ?>
            </div>
            <div style="margin-top: 20px; font-family: 'proxima_nova';" class="retour">
                <a  href="index.php?a=connexion">RETOUR</a>
            </div>

        </div>
        <!--FIN ACTUALITES-->


        <!--AMIS-->
        <div class="amis">
            <h2 class="moment2">Que font vos artistes préférés <hr class="trait"></h2>
            <?php foreach ($follow as $item2): ?>
                <div class="commentaire">
                    <p class="ago">Il y a 5 minutes</p>
                    <div class="circular2 photo_ami" style="background: url(uploads/<?=$item2->image?>) center;"></div>
                    <div class="infos_ami">
                        <h2><?=$item2->nom?></h2>
                        <p class="place">à <span><?=$item2->station?></span></p></div>
                    <p class="avis"><?=$item2->description?></p>
                    <div class="interaction">
                        <img src="assets/img/train_bleu.png" alt="" class="train_bleu">
                        <div class="onsaitpassionlemet"><img src="assets/img/coeur2.png" alt="" class="coeur2"><span class="nb_likes">(67)</span></div>
                        <p class="commenter"><a href="">Commenter</a> - (6) commentaires</p>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
            

        <!--FIN AMIS-->

    </div>
</div>
<footer>
    <script src="js/jquery.js"></script>
    <script src="js/index.js"></script>
    <script src="assets/js/jquery-2.2.3.js"></script>
    <script src="assets/js/index.js"></script>
    <script>
        $('.arrowr').click(function (event) {
            event.preventDefault();
            $('.profil_open').css('display', 'block');
            $('.profil_close').css('display', 'none');
        });
        $('.arrowl').click(function () {
            event.preventDefault();
            $('.profil_open').css('display', 'none');
            $('.profil_close').css('display', 'block');
        });

    </script>
    <a class="menu" href=""><div class="acti"><span>Activités</span></div></a><a class="menu" href=""><div class="actu"><span>Actualités</span></div><a class="menu" href=""><div class="part"><span>Partager</span></div></a>
</footer>
</body>

</html>