$(document).ready(function(){
    
    /*Abre o menu vertical no click do icone*/
    $('#icone_menu').click(function(){
        $('#menu').slideToggle(1000);
        
    });
    
    /*Fecha o menu vertical no click do item*/
    $('.link').notclick(function(){
        $('#menu').slideToggle(500);
        
    })
});