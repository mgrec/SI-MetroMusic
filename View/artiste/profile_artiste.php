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
        <a href="" class="modif_infos">Modifier mes infos</a>
        <img src="assets/img/arrow_left.png" alt="" class="arrow_left arrowl">
        <div class="circular profil2" style="background: url(uploads/<?= $item1->image ?>) no-repeat center; width: 80px; height: 80px;"></div>
        <h2><?= $item1->nom?></h2>
        <?php endforeach; ?>
        <div class="menu">
            <ul>
                <li><a href="">Artiste</a></li>
                <hr>
                <li><a href="">Abonnés</a></li>
                <?php foreach ($infos2 as $item2): ?>
                    <span class="nb"><?=$item2->numb?></span>
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
                <form action="index.php?a=search" method="post">
                    <input class="search" type="search" placeholder="Tapez votre recherche ">
                    <button type="submit" class="loupe" >
                        <img src="assets/img/loupe.png" alt="">
                    </button>
                </form>
            </div>
        </div>
        <!--FIN RECHERCHE-->

        <!--ACTUALITES-->
        <div class="actualites">
            <form action="index.php?a=ajouter" method="post" enctype="multipart/form-data" class="partager">
                <div class="part2">
                <?php foreach ($infos as $item1): ?>
                <div class="circular2 photo_profil" style="background: url(uploads/<?=$item1->image?>) center;"></div>
                <?php endforeach; ?>
                <input name="nom" type="text" class="titre" placeholder="Ajouter un titre à votre publication">
                <textarea name="description" class="description" placeholder="Faites parlez de vous !" name="" id="" cols="30" rows="10"></textarea>
                <input name="image" id="file2" class="ajout_photo" type="file">
                <label class="pictureLabel2" for="file2">                <img src="assets/img/photo.png" alt="" class="photo"> &nbsp; Photo / Video</label>
                <img src="assets/img/lieu.png" alt="" class="lieu">
                <select class="ajout_lieu" name="station" id="" placeholder="Ajouter une photo/vidéo" required="required">
                    <option>Ajouter un lieu (station)</option>
                    <option>République</option>
                    <option>Bastille</option>
                    <option>Strasbourg-Saint-Dens</option>
                    <option>Trocadero</option>
                </select> /
                <select class="ajout_date" name="plage_de" id="" placeholder="Ajouter une photo/vidéo">
                    <option>8h</option>
                    <option>9h</option>
                    <option>10h</option>
                    <option>11h</option>
                    <option>12h</option>
                    <option>13h</option>
                    <option>14h</option>
                    <option>15h</option>
                    <option>16h</option>
                    <option>17h</option>
                    <option>18h</option>
                    <option>19h</option>
                    <option>20h</option>
                    <option>21h</option>
                    <option>22h</option>
                    <option>23h</option>
                </select>
                <select class="ajout_date" name="plage_a" id="" placeholder="Ajouter une photo/vidéo">
                    <option>8h</option>
                    <option>9h</option>
                    <option>10h</option>
                    <option>11h</option>
                    <option>12h</option>
                    <option>13h</option>
                    <option>14h</option>
                    <option>15h</option>
                    <option>16h</option>
                    <option>17h</option>
                    <option>18h</option>
                    <option>19h</option>
                    <option>20h</option>
                    <option>21h</option>
                    <option>22h</option>
                    <option>23h</option>
                </select>
                <input type="submit" value="Partager" class="btn_partager">
                </div>
            </form>

            <div class="recente">
                <h2 class="moment">En ce moment sur nos lignes de métro parisiennes <hr class="trait"></h2>
                <?php foreach ($data as $item): ?>
                    <div class="actu_recente">
                        <div class="circular2 photo_profil" style="background: url(uploads/<?=$item->image?>) center;"></div>
                        <div class="infos">
                            <h3><?=$item->repnom?></h3>
                            <p class="auteur">Par <span><?=$item->nom?></span></p>                </div>
                        <div class="infosplus"><p class="lieu">à <span><?=$item->station?>,</span></p>
                            <p class="horaire">Horaires : <span>de <?=$item->plage_de?> à <?=$item->plage_a?></span></p></div>


                        <p class="description"><?=$item->description?></p>

                        <img src="uploads/<?=$item->repimg?>" alt="" class="photo2">

                        <div class="legende">
                            <img src="assets/img/coeur.png" alt="" class="coeur">
                            <div class="aime"></div> <span>(<?=$item->countlike?>)</span><div class="aime"> mentions</div>

                            <p class="commenter">(6) commentaires</p>
                            <img src="assets/img/train_bleu.png" alt="" class="train">
                            <div class="find"><a href="">Trouver un itinéraire</a></div>
                        </div>


                    </div>
                <?php endforeach; ?>
            </div>

        </div>
        <!--FIN ACTUALITES-->


        <!--AMIS-->
        <div class="amis">
            <h2 class="moment2">Vos followers : <hr class="trait"></h2>
            <?php foreach ($who as $item2): ?>
                <div class="commentaire">
                    <div class="circular2 photo_ami" style="background: url(uploads/<?=$item2->image?>) center;"></div>
                    <div class="infos_ami">
                        <h2><?=$item2->nom?></h2>
                        <p class="time">Vous suit depuis le <?=$item2->date?></p>
                    <div class="interaction">
                    </div>

                </div>

        </div>
            <?php endforeach; ?>
        <!--FIN AMIS-->

    </div>
</div>
<footer>
    <script src="assets/js/jquery-2.2.3.js"></script>
    <script src="assets/js/index.js"></script>
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
    <a class="menu" href=""><div class="acti"><span>Activités</span></div></a><a class="menu" href=""><div class="actu"><span>Actualités</span></div><a class="menu" href=""><div class="part"><span>Partager</span></div></a>
</footer>
</body>

</html>