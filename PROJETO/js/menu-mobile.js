$(document).ready(function(){
    
    /*Abre o menu vertical no click do icone*/
    $('#icone_menu').click(function(){
        $('#menu_mobile').removeClass('menu_mobile_close');
        $('#menu_mobile').addClass('menu_mobile_open');
    });
    
    /*Fecha o menu vertical no click do item*/
    $('.link').click(function(){
        $('#menu_mobile').removeClass('menu_mobile_open');
        $('#menu_mobile').addClass('menu_mobile_close');     
    });
});