
//funcion para el movimiento de header
$(document).ready(function(){


    $(window).scroll(function(){
        // scroll hacia arriba
        if( $(this).scrollTop() > 0 ){
            $('header').addClass('contenido');
        } else {
            $('header').removeClass('contenido');
        }
    });
    
    });