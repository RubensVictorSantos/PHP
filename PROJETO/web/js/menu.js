$(document).ready(function(){
    
    /*********************** BUSCAR ***********************/
    
    /*Abre a área de busca do site ao clicar no lupa*/
    $('#img-buscar').click(function(){
        $('#img-buscar').removeClass('img-open');
        $('#img-buscar').addClass('img-close');
        $('#container-buscar').removeClass('container-buscar-close');
        $('#container-buscar').addClass('container-buscar-open');
        $('#btnbuscar').removeClass('btnbuscar-close');
        $('#btnbuscar').addClass('btnbuscar-open');
        $('#txtbuscar').removeClass('txtbuscar-close');
        $('#txtbuscar').addClass('txtbuscar-open');
        $('#img-login').addClass('img-login-close');
        $('#login').addClass('login-close');
        
    });
    
    /*Fecha a área de busca do site ao clicar no icone login*/
    $('#login').click(function(){
        $('#container-buscar').removeClass('container-buscar-open');
        $('#container-buscar').addClass('container-buscar-close');
        $('#img-buscar').removeClass('img-close');
        $('#img-buscar').addClass('img-open');
        $('#btnbuscar').removeClass('btnbuscar-open');
        $('#btnbuscar').addClass('btnbuscar-close');
        $('#txtbuscar').removeClass('txtbuscar-open');
        $('#txtbuscar').addClass('txtbuscar-close');      
    });
    
    /*Fecha a área de busca do site ao clicar no button de pesquisa*/
    $('#btnbuscar').click(function(){
        $('#container-buscar').removeClass('container-buscar-open');
        $('#container-buscar').addClass('container-buscar-close');
        $('#img-buscar').removeClass('img-close');
        $('#img-buscar').addClass('img-open');
        $('#btnbuscar').removeClass('btnbuscar-open');
        $('#btnbuscar').addClass('btnbuscar-close');
        $('#txtbuscar').removeClass('txtbuscar-open');
        $('#txtbuscar').addClass('txtbuscar-close');     
    });
    
    /*********************** LOGIN ***********************/
    
    $('#img-login').click(function(){
        $('#img-login').removeClass('img-login-open');
        $('#img-login').addClass('img-login-close');
        $('#login').removeClass('login-close');
        $('#login').addClass('login-open');
        $('#box-user').removeClass('box-login-close');
        $('#box-user').addClass('box-login-open'); 
        $('#box-senha').removeClass('box-login-close');
        $('#box-senha').addClass('box-login-open');
        $('#img-buscar').addClass('img-open');
        $('#container-buscar').addClass('container-buscar-close');
        
    });
    
    
    
    $('#btn-login').click(function(){
        $('#login').removeClass('login-open');
        $('#login').addClass('login-close'); 
        $('#img-login').removeClass('img-login-close');
        $('#img-login').addClass('img-login-open'); 
        $('#box-user').removeClass('box-login-open');
        $('#box-user').addClass('box-login-close'); 
        $('#box-senha').removeClass('box-login-open');
        $('#box-senha').addClass('box-login-close');   
    });
    
    
    
    $('#img-buscar').click(function(){
        $('#login').removeClass('login-open');
        $('#login').addClass('login-close'); 
        $('#img-login').removeClass('img-login-close');
        $('#img-login').addClass('img-login-open'); 
        $('#box-user').removeClass('box-login-open');
        $('#box-user').addClass('box-login-close');  
        $('#box-senha').removeClass('box-login-open');
        $('#box-senha').addClass('box-login-close');   
    });
    
    /*********************** MENU MOBILE ***********************/
    
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