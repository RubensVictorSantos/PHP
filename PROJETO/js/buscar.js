$(document).ready(function(){
    
    /*Abre o menu vertical no click do icone*/
    $('#container-buscar').click(function(){
        $('#container-buscar').removeClass('container-buscar-close');
        $('#container-buscar').addClass('container-buscar-open');
        $('#btnbuscar').removeClass('btnbuscar-close');
        $('#btnbuscar').addClass('btnbuscar-open');
        $('#txtbuscar').removeClass('txtbuscar-close');
        $('#txtbuscar').addClass('txtbuscar-open');
        
    });
    
    /*Fecha o menu vertical no click do item*/
    $('#icone-login').click(function(){
        $('#container-buscar').removeClass('container-buscar-open');
        $('#container-buscar').addClass('container-buscar-close');
        $('#btnbuscar').removeClass('btnbuscar-open');
        $('#btnbuscar').addClass('btnbuscar-close');
        $('#txtbuscar').removeClass('txtbuscar-open');
        $('#txtbuscar').addClass('txtbuscar-close');     
    });
});