<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/accueil_profil.css">
    <script src="assets/js/jquery-2.2.3.js"></script>
    <title>SubSound</title>
</head>

<body>

<!--PROFIL-->
<header></header>

<div class="profil">
    <div class="profil_close">
        <a href=""><img class="arrowr" src="assets/img/arrow_right.png" alt=""></a>
    </div>
    <?php foreach ($infos as $item1): ?>
    <div class="profil_open">
        <a href="" class="modif_infos">Modifier mes infos</a>
        <img src="assets/img/arrow_left.png" alt="" class="arrow_left arrowl">
        <div class="circular profil2" style="background: url(uploads/<?= $item1->image ?>) center;"></div>
        <h2><?= $item1->nom ?></h2>
        <?php endforeach; ?>
        <div class="menu">
            <ul>
                <li><a href="">Artiste</a></li>
                <hr>
                <li><a href="">Abonnements</a></li>
                <?php foreach ($infos2 as $item2): ?>
                    <span class="nb"><?= htmlentities($item2->numb) ?></span>
                <?php endforeach; ?>
                <li><a href="">Plan métro</a></li>
                <li><a href="">Lignes de métro</a></li>
                <li><a href="">Trouver un itinéraire</a></li>
                <li><a href="index.php?a=deconnexion">Déconnexion</a></li>
            </ul>
        </div>

    </div>
</div>
<!--FIN PROFIL-->
<div class="all">
    <div class="content">
        <img src="assets/img/logo.png" alt="" class="logo">
        <!--RECHERCHE-->
        <div class="barre">
            <div class="recherche">
                <form>
                    <input name="search" id="valeur" class="search" type="search" placeholder="Rechercher un itinéraire ">
                    <button type="button" class="loupe" onClick="srch();">
                        <img src="assets/img/loupe.png" alt="">
                    </button>
                </form>
            </div>
        </div>
        <!--FIN RECHERCHE-->

        <!--ACTUALITES-->
        <div class="actualites">
            <h2 class="moment">Voici les différente ligne qui déservent : <?=$_GET['i']." "?><hr class="trait"> </h2>
            <div class="actu_recente">
            <?php foreach ($ligne as $itemligne): ?>

                <p style="padding: 10px;"><img src="assets/img/ligne/ligne<?=htmlentities($itemligne->ligne)?>.png" alt=""> - Suivez toutes les infos de cette ligne sur Twitter :
                    <a style="color: #80BFFF;" target="_blank" href="https://twitter.com/Ligne<?=htmlentities($itemligne->ligne)?>_RATP"> Infos</a></p>

            <?php endforeach; ?>

            </div>
            <div style="margin-top: 20px; font-family: 'proxima_nova';" class="retour">
                <a  href="index.php?a=connexion">RETOUR</a>
            </div>

        </div>



        <!--FIN ACTUALITES-->


        <!--AMIS-->
        <div class="amis">
            <h2 class="moment2">Que font vos artistes préférés
                <hr class="trait">
            </h2>
            <?php foreach ($follow as $item2): ?>
                <div class="commentaire">
                    <p class="ago">Il y a 5 minutes</p>
                    <div class="circular2 photo_ami"
                         style="background: url(uploads/<?= $item2->image ?>) center;"></div>
                    <div class="infos_ami">
                        <h2><?= htmlentities($item2->nom) ?></h2>
                        <p class="place">à <span><?= htmlentities($item2->station) ?></span></p></div>
                    <p class="avis"><?= htmlentities($item2->description) ?></p>
                    <div class="interaction">
                        <img src="assets/img/train_bleu.png" alt="" class="train_bleu">
                        <div class="onsaitpassionlemet"><img src="assets/img/coeur2.png" alt="" class="coeur2"><span
                                class="nb_likes">(67)</span></div>
                        <p class="commenter"><a href="">Commenter</a> - (6) commentaires</p>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
        <!--FIN AMIS-->

    </div>
</div>
<footer>

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



        function srch(){
        location.href='index.php?a=itineraire&i='+$('#valeur').val();
        }

    </script>
    <a class="menu" href="">
        <div class="acti"><span>Activités</span></div>
    </a><a class="menu" href="">
        <div class="actu"><span>Actualités</span></div>
        <a class="menu" href="">
            <div class="part"><span>Partager</span></div>
        </a>
</footer>
</body>

</html>