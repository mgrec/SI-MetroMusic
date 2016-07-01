<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style2.css">
    <title>SubSound</title>
</head>
<body>
<img src="assets/img/croix.png" class="croix" alt="">
<div class="content">

    <div class="left">
        <h2 class="title_left title">Je suis un artiste</h2>
        <p class="text">Faire connaitre mes musique</p>


    <form action="index.php?a=artiste" method="post" enctype="multipart/form-data" id="form_left">
        <h3>Rejoignez SubSound !</h3>
        <input class="inscrit" type="text" name="nom" placeholder="Nom">
        <input class="inscrit" type="email" name="email" placeholder="Email">
        <input class="inscrit" type="password" name="password" placeholder="Mot de passe">
        <input class="inscrit" type="password" name="password2" placeholder="Confirmer le Mot de passe">
        <input class="inscrit" id="file" type="file" name="image" >
        <label class="pictureLabel" for="file">Ajouter une image</label>
        <input type="submit" class="inscrit-submit" value="Je m'inscris">
    </form>
    </div>


    <div class="logo2"><div class="logo"></div><a href="index.php?"><img src="assets/img/logo.png" alt="" class="ssound" ></a></div>

    <div class="right">
        <h2 class="title_right title">Je suis un suber</h2>
        <p class="text2">Decouvrir et suivre les musiques des artistes</p>


    <form action="index.php?a=user" method="post" enctype="multipart/form-data" id="form_right">
        <h3>Rejoignez SubSound !</h3>
        <input class="inscrit" type="text" name="nom" placeholder="Nom">
        <input class="inscrit" type="email" name="email" placeholder="Email">
        <input class="inscrit" type="password" name="password" placeholder="Mot de passe">
        <input class="inscrit" type="password" name="password2" placeholder="Confirmer le Mot de passe">
        <input class="inscrit" id="file2" type="file" name="image" >
        <label class="pictureLabel" for="file2">Ajouter une image</label>
        <input type="submit" class="inscrit-submit" value="Je m'inscris">
    </form>
    </div>

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


        $(document).ready(function () {
            updateContainer();
            $(window).resize(function() {
                updateContainer();
            });
        });
        function updateContainer() {
            var $containerHeight = $(window).width();
            var load ;
            if ($containerHeight > 860) {




                $('.left').click(function () {
                    var left_limit  = $(window).width() / 5;
                    var left = $('.left').width();
                    if(left > left_limit){
                        $(this).css("width", "80%");
                        $('.right').css("width", "20%");
                        $('.logo').css("left", "80%");
                        $('.ssound').css("left", "80%");
                        $('#form_left').fadeIn();
                        $('#form_right').fadeOut();
                        $('.title_right').fadeOut();
                        $('.title_left').fadeIn();
                        $('.text').fadeOut();
                        $('.text2').fadeOut();
                    }

                    var left_open_limit  = $(window).width() / 5;
                    if(left <= left_open_limit){
                        $(this).css("width","50%");
                        $('.right').css("width","50%");
                        $('.logo').css("left", "50%");
                        $('.ssound').css("left", "50%");
                        $('#form_left').fadeOut();
                        $('#form_right').fadeOut();
                        $('.title_right').fadeIn();
                        $('.title_left').fadeIn();
                        $('.text').fadeIn();
                        $('.text2').fadeIn();
                    }

                });

                $('.right').click(function () {
                    var right_limit  = $(window).width() / 5;
                    var right = $('.right').width();
                    if(right > right_limit){
                        $(this).css("width", "80%");
                        $('.left').css("width", "20%");
                        $('.logo').css("left", "20%");
                        $('.ssound').css("left", "20%");
                        $('#form_left').fadeOut();
                        $('#form_right').fadeIn();
                        $('.title_right').fadeIn();
                        $('.title_left').fadeOut();
                        $('.text').fadeOut();
                        $('.text2').fadeOut();
                    }

                    var right_open_limit  = $(window).width() / 5;
                    if(right <= right_open_limit){
                        $(this).css("width", "50%");
                        $('.left').css("width", "50%");
                        $('.logo').css("left", "50%");
                        $('.ssound').css("left", "50%");
                        $('#form_left').fadeOut();
                        $('#form_right').fadeOut();
                        $('.title_right').fadeIn();
                        $('.title_left').fadeIn();
                        $('.text').fadeIn();
                        $('.text2').fadeIn();
                    }


                });

            }
            if ($containerHeight <= 860) {
                $('.left').click(function () {

                    $(this).css("height", "80vh");
                    $('.right').css("height", "20vh");
                    $('.logo').css("top", "80%");
                    $('.ssound').css("top", "80%");
                    $('#form_left').fadeIn();
                    $('#form_right').fadeOut();
                    $('.title_right').fadeOut();
                    $('.title_left').fadeOut();
                    $('.text').fadeOut();
                    $('.text2').fadeOut();
                });


                $('.croix').click(function () {
                    $('.left').css("height","50vh");
                    $('.right').css("height","50vh");
                    $('.logo').css("top", "50%");
                    $('.ssound').css("top", "50%");
                    $('#form_left').fadeOut();
                    $('#form_right').fadeOut();
                    $('.title_right').fadeIn();
                    $('.title_left').fadeIn();
                    $('.text').fadeIn();
                    $('.text2').fadeIn();
                });

                $('.right').click(function () {

                    $(this).css("height", "80vh");
                    $('.left').css("height", "20vh");
                    $('.logo').css("top", "20%");
                    $('.ssound').css("top", "20%");
                    $('#form_left').fadeOut();
                    $('#form_right').fadeIn();
                    $('.title_right').fadeOut();
                    $('.title_left').fadeOut();
                    $('.text').fadeOut();
                    $('.text2').fadeOut();
                });
            }
        }

    })
</script>

</body>

</html>