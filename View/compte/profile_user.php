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
        <a href=""><img class="arrowr" src="assets/img/arrow_right.png" alt=""></a>
    </div>
    <?php foreach ($infos as $item1): ?>
    <div class="profil_open">
        <a href="" class="modif_infos menu-link">Modifier mes infos</a>
        <img src="assets/img/arrow_left.png" alt="" class="arrow_left arrowl">
        <div class="circular profil2" style="background: url(uploads/<?= $item1->image ?>) no-repeat center; width: 80px; height: 80px;"></div>
        <h2><?= htmlentities($item1->nom) ?></h2>
        <?php endforeach; ?>
        <div class="menu">
            <ul>
                <li><a href="">Suber</a></li>
                <hr>
                <li><a href="">Abonnements</a></li>
                <?php foreach ($infos2 as $item2): ?>
                    <span class="nb"><?= htmlentities($item2->numb) ?></span>
                <?php endforeach; ?>
                <li><a href="">Plan métro</a></li>
                <li><a href="">Lignes de métro</a></li>
                <li><a href="index.php?a=itineraire&i= ">Trouver un itinéraire</a></li>
                <li><a href="index.php?a=deconnexion">Déconnexion</a></li>
            </ul>
        </div>
        <div style="display: none;" class="menu menu-edit">
            <form action="index.php?a=edituser&id=<?=$_SESSION['user_id']?>" method="post">
            <ul>
                <li ><input name="email" style="margin-top: 28px" class="input-edit" placeholder="Votre email" type="email"></li>
                <li><input name="nom" class="input-edit" placeholder="Votre nom" type="text"></li>
                <li style="margin-bottom: 28px"><input name="password" class="input-edit" placeholder="mot de passe" type="password"></li>
                <li style="margin: inherit"><input name="password2" class="input-edit" placeholder="Resaisir mot de passe" type="password"></li>
            </ul>
                <button style="color: black;border: 1px solid black;padding-right: -2px;height: 30px;width: 90px;position: static;margin: 20px 100px;" class="suivre" type="submit">Modifier</button>
            </form>
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
                <form action="index.php?a=search" method="POST">
                    <input name="search" class="search" type="search" placeholder="Tapez votre recherche ">
                    <button type="submit" class="loupe">
                        <img src="assets/img/loupe.png" alt="">
                    </button>
                </form>
            </div>
        </div>
        <!--FIN RECHERCHE-->

        <!--ACTUALITES-->
        <div class="actualites">
            <div class="recente">
                <h2 class="moment">En ce moment sur nos lignes de métro parisiennes
                    <hr class="trait">
                </h2>
                <?php foreach ($data as $item): ?>
                    <div class="actu_recente">
                        <a class="suivre" href="index.php?a=follow&id=<?= $item->id_artiste ?>">Suivre</a>
                        <div class="circular2 photo_profil"
                             style="background: url(uploads/<?= $item->image ?>) center;"></div>
                        <div class="infos">
                            <h3><?= htmlentities($item->repnom) ?></h3>
                            <p class="auteur">Par <span><?= htmlentities($item->nom) ?></span></p></div>
                        <div class="infosplus"><p class="lieu">à <span><?= htmlentities($item->station) ?>,</span></p>
                            <p class="horaire">Horaires : <span>de <?=htmlentities($item->plage_de)?> à <?=htmlentities($item->plage_a)?></span></p></div>


                        <p class="description"><?= htmlentities($item->description) ?></p>

                        <img src="uploads/<?=htmlentities($item->repimg)?>" alt="" class="photo2">

                        <div class="legende">
                            <img src="assets/img/coeur.png" alt="" class="coeur">
                            <div class="aime"><a href="index.php?a=like&id=<?= htmlentities($item->repid) ?>">Aimer la publication</a>
                                -
                            </div>
                            <span>(<?= htmlentities($item->countlike) ?>)</span>
                            <div class="aime"> mentions</div>

                            <p class="commenter"><a class="com" href=""><span>Commenter</span></a> - (6) commentaires</p>
                            <img src="assets/img/train_bleu.png" alt="" class="train">
                            <div class="find"><a href="index.php?a=itineraire&i=<?=htmlentities($item->station)?>">Trouver un itinéraire</a></div>
                            <div class="ajout_com">
                                <p class="auteur">Par <span>TheMoon</span></p>
                                <div class="autre_com">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Delectus fugiat aliquid, blanditiis? Consequatur, similique. Deserunt sed beatae et
                                    aperiam. Temporibus numquam laboriosam perferendis nesciunt provident deserunt ipsa
                                    commodi veniam soluta! Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Distinctio suscipit nihil ullam, quam doloribus, .
                                </div>
                                <div class="ton_com">
                                    <textarea class="description3" class="description2"
                                              placeholder="Commenter le partage" name="" id="" cols="30"
                                              rows="10"></textarea>
                                    <a href="" class="ajout_desc">Commenter</a>
                                </div>
                            </div>
                        </div>


                    </div>
                <?php endforeach; ?>
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
                    <p class="ago">Poster à <?=htmlentities($item2->date)?></p>
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
        $('.menu-link').click(function () {
            event.preventDefault();
            $('.menu').css('display', 'none');
            $('.menu-edit').css('display', 'block');
        });
        
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