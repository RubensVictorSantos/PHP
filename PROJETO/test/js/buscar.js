$(document).ready(function(){
    
    /*Abre o menu vertical no click do icone*/
    $('#container-buscar').click(function(){
        $('#container-buscar').removeClass('close');
        $('#container-buscar').addClass('open');
        $('#btnbuscar').removeClass('btnbuscar-close');
        $('#btnbuscar').addClass('btnbuscar-open');
        $('#txtbuscar').removeClass('txtbuscar-close');
        $('#txtbuscar').addClass('txtbuscar-open');
        var $test = $(this);
        $test.addClass('selected');
        
    });
    
    /*Fecha o menu vertical no click do item*/
    $('#icone_menu').click(function(){
        $('#container-buscar').removeClass('open');
        $('#container-buscar').addClass('close');
        $('#btnbuscar').removeClass('btnbuscar-open');
        $('#btnbuscar').addClass('btnbuscar-close');
        $('#txtbuscar').removeClass('txtbuscar-open');
        $('#txtbuscar').addClass('txtbuscar-close');     
    });
});