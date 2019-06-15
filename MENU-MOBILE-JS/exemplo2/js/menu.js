$(document).ready(function(){
    
    /*Abre o menu vertical no click do icone*/
    $('#icone_menu').click(function(){
        $('#menu').removeClass('menu_mobile_close');
        $('#menu').addClass('menu_mobile_open');
    });
    
    /*Fecha o menu vertical no click do item*/
    $('.link').click(function(){
        $('#menu').removeClass('menu_mobile_open');
        $('#menu').addClass('menu_mobile_close');
    })
});