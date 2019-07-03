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
    
    /*Abre a área de busca do site ao clicar no lupa*/
    $('#img-buscar').click(function(){
        $('#container-buscar').removeClass('close');
        $('#container-buscar').addClass('open');
        $('#img-buscar').removeClass('imgopen');
        $('#img-buscar').addClass('imgclose');
        $('#btnbuscar').removeClass('btnbuscar-close');
        $('#btnbuscar').addClass('btnbuscar-open');
        $('#txtbuscar').removeClass('txtbuscar-close');
        $('#txtbuscar').addClass('txtbuscar-open');
        
    });
    
    /*Fecha a área de busca do site ao clicar no button*/
    $('#btnbuscar').click(function(){
        $('#container-buscar').removeClass('open');
        $('#container-buscar').addClass('close');
        $('#img-buscar').removeClass('imgclose');
        $('#img-buscar').addClass('imgopen');
        $('#btnbuscar').removeClass('btnbuscar-open');
        $('#btnbuscar').addClass('btnbuscar-close');
        $('#txtbuscar').removeClass('txtbuscar-open');
        $('#txtbuscar').addClass('txtbuscar-close');     
    });
    
    /*Fecha a área de busca do site ao clicar no icone login*/
    $('#icone_menu').click(function(){
        $('#container-buscar').removeClass('open');
        $('#container-buscar').addClass('close');
        $('#img-buscar').removeClass('imgclose');
        $('#img-buscar').addClass('imgopen');
        $('#btnbuscar').removeClass('btnbuscar-open');
        $('#btnbuscar').addClass('btnbuscar-close');
        $('#txtbuscar').removeClass('txtbuscar-open');
        $('#txtbuscar').addClass('txtbuscar-close');     
    });
    
});