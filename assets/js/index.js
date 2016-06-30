$(document).ready(function ()
{
    $('.actu').css("background-color", "rgba(0,0,0,0.2)")
    var cont = 1;
    $('.actu').click(function (e)
    {
        e.preventDefault ();
        $('.actu').css("background-color", "rgba(0,0,0,0.2)")
        $('.acti').css("background-color", "rgba(0,0,0,0)")
        $('.part').css("background-color", "rgba(0,0,0,0)")
        $('.recente').css("display", "block")
        $('.amis').css("display", "none")
        $('.partager').css("display", "none")
    });
    $('.acti').click(function (e)
    {
        e.preventDefault ();
        $('.acti').css("background-color", "rgba(0,0,0,0.2)")
        $('.actu').css("background-color", "rgba(0,0,0,0)")
        $('.part').css("background-color", "rgba(0,0,0,0)")
        $('.recente').css("display", "none")
        $('.amis').css("display", "block")
        $('.partager').css("display", "none")
    });
    $('.part').click(function (e)
    {
        e.preventDefault ();
        $('.part').css("background-color", "rgba(0,0,0,0.2)")
        $('.actu').css("background-color", "rgba(0,0,0,0)")
        $('.acti').css("background-color", "rgba(0,0,0,0)")
        $('.recente').css("display", "none")
        $('.amis').css("display", "none")
        $('.partager').css("display", "block")
    });
    $('.com').click(function (e)
    {
        e.preventDefault ();
        if(cont == 1){
            $('.ajout_com').css("display", "block")
            cont = 0;
        }
        else{
            $('.ajout_com').css("display", "none")
            cont = 1;
        }

    });

})