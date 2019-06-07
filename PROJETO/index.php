<?php

require_once('bd/conexao.php');
$conexao = conexaoMysql();
session_start();

if(isset($_POST['btn-login'])){
    // Atribuindo os valores das input da página index.php p/ essas variáveis
    $login = $_POST['txt-usuario'];
    $senha = $_POST['txt-senha'];

    // Criptografando a senha
    $senha_cryt = md5($senha);

    $sql = "SELECT * FROM tbl_usuario WHERE nome = '$login' AND senha = '$senha_cryt' AND status = 'A'";

    $select = mysqli_query($conexao, $sql);

//    var_dump($conexao);

    /*  Se existe um cadastro no banco com esse nome e senha 
        mysqli_num_rows retorna 1 do contrario ele vai retornar 0;*/

    if(mysqli_num_rows($select) > 0){

        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha_cryt;
        header('location:cms/cms.php');

    }else{

        unset ($_SESSION['login']);
        unset ($_SESSION['senha']);
        echo('<script>alert("Erro ao tentar logar, verifique seu login ou senha")</script>');
    }
    
//    header('location:index.php');
    
}
?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1.0">
        <title>
            Road Runner Cross Bikes
        </title>
        <link rel="icon" href="img/ico/i405_TDM_icon_bike93.gif">
        <script src="js/jquery.js"></script>
        <script src="js/menu-mobile.js"></script>
    </head>
    <body>
        <header class="center">
            <div id="box-main-header" class="center">
                <div id="logo">
                    <a href="index.php" title="Página inicial" >
                        <img src="img/ico/logo.png" style=" " alt="Logotipo da empresa" id="imag-logo">

                    </a>
                </div>
                <nav id="menu" class="center">
                    <ul class="center">
                        <li>
                            <a href="noticias.php">
                                Destaques
                            </a>
                        </li>
                        <li>
                            <a href="promocoes.php">
                                Promoções
                            </a>
                        </li>
                        <li>
                            <a href="eventos.php">
                                Eventos
                            </a>
                        </li>
                        <li>
                            <a href="fale-conosco.php">
                                Fale Conosco
                            </a>
                        </li>
                        <li>
                            <a href="Sobre.php">
                                Sobre
                            </a>
                        </li>
                        <li>
                            <a href="lojas.php">
                                Nossas Lojas
                            </a>
                        </li>
                    </ul>
                </nav>
                <div id="login">
                    <form name="frmlogin" id="frmlogin" method="post" action="index.php">
                        <div class="box-login center">
                            <label>
                                Usuário
                            </label><br>

                            <input type="text"
                                   name="txt-usuario"
                                   id="txt-usuario">

                        </div>
                        <div class="box-login center">
                            <label>
                                Senha
                            </label><br>

                            <input type="password" 
                                   name="txt-senha"
                                   id="txt-senha">

                            <input type="submit"
                                   value="Ok"
                                   name="btn-login"
                                   id="btn-login">

                        </div>
                    </form>
                </div>
            </div>
            
            <!-- MENU MOBILE -->
            <div id="icone_menu">
                <div class="barra-menu"></div>
                <div class="barra-menu"></div>
                <div class="barra-menu"></div>
            </div>
            <nav id="menu_mobile" class="menu_mobile_close">
                <ul class="center">
                    <li class="itens-menu-mobile">
                        <a href="noticias.php" class="link">
                            Destaques
                        </a>
                    </li>
                    <li class="itens-menu-mobile">
                        <a href="promocoes.php" class="link">
                            Promoções
                        </a>
                    </li>
                    <li class="itens-menu-mobile">
                        <a href="eventos.php" class="link">
                            Eventos
                        </a>
                    </li>
                    <li class="itens-menu-mobile">
                        <a href="fale-conosco.php" class="link">
                            Fale Conosco
                        </a>
                    </li>
                    <li class="itens-menu-mobile">
                        <a href="Sobre.php" class="link">
                            Sobre
                        </a>
                    </li>
                    <li class="itens-menu-mobile">
                        <a href="lojas.php" class="link">
                            Nossas Lojas
                        </a>
                    </li>
                </ul>
            </nav>
        </header>
        <div id="conteudo" class="center">
            <div id="box-slider" class="center">
                
<!--
                <script src="js/jquery-1.11.3.min.js" ></script>
                <script src="js/jssor.slider-27.5.0.min.js"></script>
                <script src="js/slider.js"></script>
                
                <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300italic,regular,italic,700,700italic&subset=latin-ext,greek-ext,cyrillic-ext,greek,vietnamese,latin,cyrillic" rel="stylesheet" type="text/css" />
-->

<!--                <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;visibility:hidden;">-->
                    <!-- Loading Screen -->

<!--
                    <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                        
                        <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" alt="Imgem que representa o carregamento do slid" />
                        
                    </div> 
-->

                    
<!--
                    <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;">
                        
                        <div>
                            <img data-u="image" src="img/20140727-PELOTON-PHOTOS-HOMEPAGE.jpg" alt="Imagem do slid, corrida de bicicleta" />
                            
                            
                        </div>
                        <div>
                            <img data-u="image" src="img/Almaty-Cycling-1300x500.jpg" alt="Ciclista no topo de um cume olhando para uma montanha"/>
                           
                            
                        </div>
                        <div>
                            <img data-u="image" src="img/granfondo-2-1500-1300x500.jpg" alt="Corrida de ciclitas"/>
                            
                        </div>
                        <div>
                            <img data-u="image" src="img/imgslide_pegBikeRe-Ciclo.jpg" alt="Bicicleta reciclavel" />
                            
                        </div>
                        
                    </div>
-->
<!--                     Bullet Navigator -->
<!--
                    <div data-u="navigator" class="jssorb032" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                        <div data-u="prototype" class="i" style="width:16px;height:16px;">
                            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                                
                            </svg>
                            
                        </div>
                        
                    </div>
-->
<!--                     Arrow Navigator -->
<!--
                    <div data-u="arrowleft" class="jssora051" style="width:65px;height:65px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                            <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
                        </svg>
                    </div>
                    <div data-u="arrowright" class="jssora051" style="width:65px;height:65px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                            <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
                        </svg>
                    </div>
-->
<!--                </div>-->
            </div>
            <!--conteudo catalogo-->
            
            <div id="conteudo-catalogo" class="center">
                <div id="menu-catalogo">
                    <ul >
                        <li class="itens-catalogo">
                            <strong>
                                CAPACETES
                            </strong>
                        </li>
                        <li class="itens-catalogo">
                            <strong>
                                DISCO DE FREIO
                            </strong>
                        </li>
                        <li class="itens-catalogo">
                            <strong>
                                PINHÃO CASSETE
                            </strong>
                        </li>
                        <li class="itens-catalogo">
                            <strong>
                                CADEADOS
                            </strong>
                        </li>
                        <li class="itens-catalogo">
                            <strong>
                                FITA DE ARO
                            </strong>
                        </li>
                        
                        <li class="itens-catalogo">
                            <strong>
                                AROS VZAN
                            </strong>
                        </li>
                        <li class="itens-catalogo">
                            <strong>
                                PLACAS SINALIZADORAS
                            </strong>
                        </li>
                        <li class="itens-catalogo">
                            <strong>
                                PARALAMAS
                            </strong>
                        </li>
                        <li class="itens-catalogo">
                            <strong>
                                BOMBA DE AR
                            </strong>
                        </li>
                        <li class="itens-catalogo">
                            <strong>
                                SUPORTE CARAMANHOLA
                            </strong>
                        </li>
                        <li class="itens-catalogo">
                            <strong>
                                CALIBRADOR
                            </strong>
                        </li>
                        
                        
                        
                    </ul>
                </div>
                <!--BOX CATALOGO-->
                <div id="box-catalogo">
                    <div class="card-box">
                        <div class="card">
                            <div class="img-card center">
                                <img src="img/img-produto/imgbikes_MountainBikeCaloiLotus.jpg" alt="    Bicicleta MountainBike Caloi Lotus" class="img-card">
                            </div>
                            <div class="nome-card">
                                <p>
                                   Mountain Bike Caloi Lotus
                                </p>
                            </div>
                            <div class="desc-card">
                                <p>
                                    Descrição: Aro 29 Freio a Disco 21 Marchas Feminina
                                </p>
                            </div>
                            <div class="preco-card">
                                <p>
                                    R$854,05
                                    10x de R$85,41
                                </p>
                            </div>
                            <div class="detalhes">

                                <a href="#">Detalhes</a>

                            </div>
                        </div>

                        <!--<div class="card">
                            <div class="img-card center">
                                <img src="img/img-produto/imgbikes_MountainBikeTrackBikesTKS.jpg" alt="Bicicleta  MountainBike Track Bikes TKS" class="img-card">
                            </div>
                            <div class="nome-card">
                                <p>
                                    Mountain Bike Track Bikes TKS
                                </p>
                            </div>
                            <div class="desc-card">
                                <p>
                                    Aro 29 Freio a Disco Câmbio Shimano 21 Marchas
                                </p>
                            </div>
                            <div class="preco-card">
                                <p>
                                    R$854,05
                                    10x de R$85,41
                                </p>
                            </div>
                            <div class="detalhes">

                                <a href="#">Detalhes</a>

                            </div>
                        </div>

                        <div class="card">
                            <div class="img-card center">
                                <img src="img/img-produto/imgbikes_MountainBikeCaloiSport.jpg" alt="Bicicleta MountainBike Caloi Sport" class="img-card">
                            </div>
                            <div class="nome-card">
                                <p>
                                    Mountain Bike Caloi Aluminum Sport
                                </p>
                            </div>
                            <div class="desc-card">
                                <p>
                                    Aro 26 Freio V-Brake 21 Marchas
                                </p>
                            </div>
                            <div class="preco-card">
                                <p>
                                    R$854,05
                                    10x de R$85,41
                                </p>
                            </div>
                            <div class="detalhes">
                                <a href="#">Detalhes</a>
                            </div>
                        </div>-->
                    </div>
                    
<!--
                    <div class="card-box">
                        <div class="card">
                            <div class="img-card center">
                                <img src="img/img-produto/imgbikes_MountainBikeCaloiLotus.jpg" alt="Bicicleta MountainBike Caloi Lotus" class="img-card">
                            </div>
                            <div class="nome-card">
                                <p>
                                   Mountain Bike Caloi Lotus
                                </p>
                            </div>
                            <div class="desc-card">
                                <p>
                                    Aro 29 Freio a Disco 21 Marchas Feminina
                                </p>
                            </div>
                            <div class="preco-card">
                                <p>
                                    R$854,05
                                    10x de R$85,41
                                </p>
                            </div>
                            <div class="detalhes">

                                <a href="#">Detalhes</a>

                            </div>
                        </div>

                        <div class="card">
                            <div class="img-card center">
                                <img src="img/img-produto/imgbikes_MountainBikeTrackBikesTKS.jpg" alt="Bicicleta MountainBike Track Bikes TKS" class="img-card">
                            </div>
                            <div class="nome-card">
                                <p>
                                    Mountain Bike Track Bikes TKS
                                </p>
                            </div>
                            <div class="desc-card">
                                <p>
                                    Aro 29 Freio a Disco Câmbio Shimano 21 Marchas
                                </p>
                            </div>
                            <div class="preco-card">
                                <p>
                                    R$854,05
                                    10x de R$85,41
                                </p>
                            </div>
                            <div class="detalhes">

                                <a href="#">Detalhes</a>

                            </div>
                        </div>

                        <div class="card">
                            <div class="img-card center">
                                <img src="img/img-produto/imgbikes_MountainBikeCaloiSport.jpg" alt="Bicicleta MountainBike Caloi Sport" class="img-card">
                            </div>
                            <div class="nome-card">
                                <p>
                                    Mountain Bike Caloi Aluminum Sport
                                </p>
                            </div>
                            <div class="desc-card">
                                <p>
                                    Aro 26 Freio V-Brake 21 Marchas
                                </p>
                            </div>
                            <div class="preco-card">
                                <p>
                                    R$854,05
                                    10x de R$85,41
                                </p>
                            </div>
                            <div class="detalhes">
                                <a href="#">Detalhes</a>
                            </div>
                        </div>
                    </div>
-->
                </div>
                <?php
                
//                    require_once('redes.php');
                
                ?>
            </div>
        </div>
        <?php
            
            require_once('footer.php');
            
        ?>
    </body>
</html>