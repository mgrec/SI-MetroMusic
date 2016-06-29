<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>SubSound</title>
</head>
<body>
<div class="content">

    <div class="left">
        <h2 class="title_left title">Je suis un artiste</h2>
    </div>

    <form action="index.php?a=artiste" method="post" enctype="multipart/form-data" id="form_left">
        <h3>Rejoignez SubSound !</h3>
        <input class="inscrit" type="text" name="nom" placeholder="nom">
        <input class="inscrit" type="text" name="email" placeholder="email">
        <input class="inscrit" type="file" name="image">
        <input class="inscrit" type="text" name="password" placeholder="password">
        <input class="inscrit" type="text" name="password2" placeholder="password2">
        <input type="submit" value="Je m'inscris">
    </form>

    <div class="top"></div>
    <a href=""><img src="assets/img/logo.png" alt="" class="logo"></a>
    <div class="bottom"></div>

    <div class="right">
        <h2 class="title_right title">Je suis un suber</h2>
    </div>

    <a href=""></a>

    <form action="index.php?a=user" method="post" enctype="multipart/form-data" id="form_right">
        <h3>Rejoignez SubSound !</h3>
        <input class="inscrit" type="text" name="nom" placeholder="nom">
        <input class="inscrit" type="text" name="email" placeholder="email">
        <input class="inscrit" type="file" name="image" placeholder="email">
        <input class="inscrit" type="text" name="password" placeholder="password">
        <input class="inscrit" type="text" name="password2" placeholder="password2">
        <input type="submit" value="Je m'inscris">
    </form>

</div>

<footer>
    <nav>
        <ul>
            <li><a href="">À propos</a></li>
            <li><a href="">Conditions d'utilisation</a></li>
            <li><a href="">Droits d'auteur</a></li>
            <li><a href="">Confidentialité</a></li>
            <li>
                <a href="">Contact</a></li>
        </ul>
    </nav>
</footer>

<script src="assets/js/jquery-2.2.3.js"></script>
<script>
    $(document).ready(function () {
        $('.left').click(function () {
            $(this).toggleClass("left_open");
            $('.right').toggleClass("right_close");
            $('.logo').toggleClass("img_left");
            $('.top').toggleClass("top_left");
            $('.bottom').toggleClass("bottom_left");
            $('#form_left').fadeToggle(500);
            $('.title_right').fadeToggle();
        });


        $('.left_open').click(function () {
            $(this).toggleClass("left");
            $('.right_close').toggleClass('right');
        });


        $('.right').click(function () {
            $(this).toggleClass("right_open");
            $('.left').toggleClass("left_close");
            $('.logo').toggleClass("img_right");
            $('.top').toggleClass("top_right");
            $('.bottom').toggleClass("bottom_right");
            $('#form_right').fadeToggle(500);
            $('.title_left').fadeToggle();
        });


        $('.right_open').click(function () {
            $(this).toggleClass("right");
            $('.left_close').toggleClass('left');
        });


    })
</script>

</body>

</html>