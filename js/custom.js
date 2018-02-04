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

    





});