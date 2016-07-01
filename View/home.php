<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <title>Subway Sound</title>
    <!-- STYLES -->
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/fonts/font.css">
    <link rel="stylesheet" href="assets/css/remodal.css">
    <link rel="stylesheet" href="assets/css/remodal-default-theme.css">
</head>
<body>
<div class="left-part">
    <nav>
        <div class="sign-in"><a href="index.php?a=inscription">Inscription</a> - <a href="#modal">Connexion</a></div>
        <a class="welcome" href="#">Bienvenue sur Subsound</a>
        <div data-remodal-id="modal">
            <button data-remodal-action="close" class="remodal-close"></button>
            <form class="form form-left" method="POST" action="index.php?a=connexionartiste">
                <h2 class="form-title"> Connectez vous, <br> en tant qu'Artiste</h2>
                <input class="ipt-email" name="email" type="email" placeholder=" Email" required="required">
                <input class="ipt-password" name="password" type="password" placeholder=" Mot de passe" required="required">
                <input class="ipt-submit" type="submit" value="Connexion">
            </form>
            <form class="form form-right" method="POST" action="index.php?a=connexion">
                <h2 class="form-title"> Connectez vous, <br> en tant que Suber</h2>
                <input class="ipt-email" name="email" type="email" placeholder=" Email" required="required">
                <input class="ipt-password" name="password" type="password" placeholder=" Mot de passe" required="required">
                <input class="ipt-submit" type="submit" value="Connexion">
            </form>
        </div>
    </nav>
    <div class="logo-Container">
        <h1><img class="Logo" src="assets/img/Sub_Sound.png" alt="Sub Sound"></h1>
    </div>
    <ul class="mentions">
        <li><a href="">À propos</a></li>
        <li><a href="">Condition d’utilisation</a></li>
        <li><a href="">Droits d’auteur</a></li>
        <li><a href="">Confidentialité</a></li>
        <li><a href="">Contact</a></li>
    </ul>
</div>
<div class="right-part">
    <H2>Découvrez les artistes qui font une <br> répresentation en ce moment dans le métro</H2>
    <?php foreach ($row as $item): ?>
        <div class="artist">
            <div class="circular2 img-front" style="background: url(uploads/<?=$item->image?>) center;"></div>
            <div class="artist-content">
                <h3><?= htmlentities($item->repnom) ?></h3>
                <p>par <span class="artist-name"><?=htmlentities($item->nom)?></span></p>
                <p>à <span class="artist-location"><?=htmlentities($item->station)?></span> -  aujourd'hui, de <span class="artist-schedule"><?=htmlentities($item->plage_de) ?> à <?=htmlentities($item->plage_a) ?></span></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</body>
<script src="assets/js/jquery-2.2.3.js"></script>
<script src="assets/js/remodal.js"></script>
<script src="assets/js/main.js"></script>
</html>
