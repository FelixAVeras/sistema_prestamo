$(document).ready(function(){

    //menu desplegable lateral
    $('.menu li:has(ul)').click(function(e){
        e.preventDefault();

        if($(this).hasClass('activateLink')){
            $(this).removeClass('activado');
            $(this).children('ul').slideUp();
        } else {
            $('.menu li ul').slideUp();
            $('.menu li').removeClass('activateLink');
            $(this).addClass('activateLink');
            $(this).children('ul').slideDown();
        }
    });

    $('.btn-menu').click(function(){
        $('.contenedor-menu .menu').slideToggle();
    });

    $(window).resize(function(){
        if($(document).width() > 768) {
            $('.contenedor-menu .menu').css({'display' : 'block'});
        }
        if($(document).width() < 768){
            $('.contenedor-menu .menu').css({'display' : 'none'});
            $('.menu li ul').slideUp();
            $('.menu li').removeClass();
        }
    });

    $('.menu li ul li a').click(function(){
        window.location.href = $(this).attr("href");
    });

    //Buscador
    function showHint(str) {
        if(str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
        }
        else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "php_ajax.php?q=" + str, true);
            xmlhttp.send();
        }
    }
});