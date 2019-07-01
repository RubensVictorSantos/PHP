$(document).ready(function(){
    
    /*Abre o menu vertical no click do icone*/
    $('#icone-login').click(function(){
        $('#login').removeClass('menu_mobile_close');
        $('#login').addClass('menu_mobile_open');
    });
    
    /*Fecha o menu vertical no click do item*/
    $('#icone-login').click(function(){
        $('#login').removeClass('menu_mobile_open');
        $('#login').addClass('menu_mobile_close');     
    });
});