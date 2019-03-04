<?php

    require_once('menu.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Road Runner Cross Bikes
        </title>
        <link rel="icon" href="img/ico/logo.png">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
<<<<<<< HEAD:PROJETO/index.php
        <div id="conteudo" class="center">
=======
        <header class="center">
            <div id="box-main-header" class="center">
                <div id="logo">
                    Road Runner
                </div>
                <nav id="menu" class="center">
                    <ul class="center">
                        <li><a href="index.html">Destaques</a></li>
                        <li><a href="index.html">Promoções</a></li>
                        <li><a href="index.html">Eventos</a></li>
                        <li><a href="index.html">Fale Conosco</a></li>
                        <li><a href="Sobre.php">Sobre</a></li>
                        <li><a href="index.html">Nossas Lojas</a></li>
                    </ul>
                </nav>
                <div id="login">
                    <form name="frmRoadRunnerCrossBikes" method="post" action="index.php">
                        <div class="box-login center">
                            <label for="usuario">
                                Usuário
                            </label><br>
                            <input type="text" name="txt-usuario" id="txtUser">
                        </div>
                        <div class="box-login center">
                            <label for="senha">
                                Senha
                            </label><br>
                            <input type="password" name="txt-senha" id="txtPass">
                            <input type="button" value="Ok" name="btn-ok" id="btnOk">
                        </div>
                    </form>
                </div>
            </div>
        </header>
        <div id="test" class="center">
>>>>>>> 46ac53eab33da9b470325f045339d7ba525585e4:PROJETO/index.html
            <div id="box-slider" class="center">
                
                <!-- #region Jssor Slider Begin -->
                <!-- Generator: Jssor Slider Maker -->
                <!-- Source: https://www.jssor.com -->
                <script src="full-width-slider.slider.jquery/js/jquery-1.11.3.min.js" type="text/javascript"></script>
                <script src="full-width-slider.slider.jquery/js/jssor.slider-27.5.0.min.js" type="text/javascript"></script>
                <script type="text/javascript">
                    jQuery(document).ready(function ($) {

                        var jssor_1_SlideoTransitions = [
                          [{b:-1,d:1,o:-0.7}],
                          [{b:900,d:2000,x:-379,e:{x:7}}],
                          [{b:900,d:2000,x:-379,e:{x:7}}],
                          [{b:-1,d:1,o:-1,sX:2,sY:2},{b:0,d:900,x:-171,y:-341,o:1,sX:-2,sY:-2,e:{x:3,y:3,sX:3,sY:3}},{b:900,d:1600,x:-283,o:-1,e:{x:16}}]
                        ];

                        var jssor_1_options = {
                          $AutoPlay: 1,
                          $SlideDuration: 800,
                          $SlideEasing: $Jease$.$OutQuint,
                          $CaptionSliderOptions: {
                            $Class: $JssorCaptionSlideo$,
                            $Transitions: jssor_1_SlideoTransitions
                          },
                          $ArrowNavigatorOptions: {
                            $Class: $JssorArrowNavigator$
                          },
                          $BulletNavigatorOptions: {
                            $Class: $JssorBulletNavigator$
                          }
                        };

                        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

                        /*#region responsive code begin*/

                        var MAX_WIDTH = 3000;

                        function ScaleSlider() {
                            var containerElement = jssor_1_slider.$Elmt.parentNode;
                            var containerWidth = containerElement.clientWidth;

                            if (containerWidth) {

                                var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                                jssor_1_slider.$ScaleWidth(expectedWidth);
                            }
                            else {
                                window.setTimeout(ScaleSlider, 30);
                            }
                        }

                        ScaleSlider();

                        $(window).bind("load", ScaleSlider);
                        $(window).bind("resize", ScaleSlider);
                        $(window).bind("orientationchange", ScaleSlider);
                        /*#endregion responsive code end*/
                    });
                </script>
                
                <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300italic,regular,italic,700,700italic&subset=latin-ext,greek-ext,cyrillic-ext,greek,vietnamese,latin,cyrillic" rel="stylesheet" type="text/css" />

                <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;visibility:hidden;">
                    <!-- Loading Screen -->
                    <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                        
                        <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
                        
                    </div>
                    
                    <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;">
                        
                        <div>
                            <img data-u="image" src="img/20140727-PELOTON-PHOTOS-HOMEPAGE.jpg"/>
                            
                            <div data-t="0" data-ts="preserve-3d" style="position:absolute;top:120px;left:75px;width:470px;height:220px;">
                                
                                <!--<img style="position:absolute;top:0px;left:0px;width:470px;height:220px;max-width:470px;" src="full-width-slider.slider.jquery/img/c-phone-horizontal.png" />-->
                                
                                <div data-ts="preserve-3d" style="position:absolute;top:4px;left:45px;width:379px;height:213px;overflow:hidden;">
                                    
                                    <!--<img data-t="1" style="position:absolute;top:0px;left:0px;width:379px;height:213px;max-width:379px;" src="full-width-slider.slider.jquery/img/c-slide-1.jpg" />-->
                                    <!--<img data-t="2" style="position:absolute;top:0px;left:379px;width:379px;height:213px;max-width:379px;" src="full-width-slider.slider.jquery/img/c-slide-3.jpg" />-->
                                </div>
                                <img style="position:absolute;top:4px;left:45px;width:379px;height:213px;max-width:379px;" src="img/c-navigator-horizontal.png" />
                                <!--<img data-t="3" style="position:absolute;top:476px;left:454px;width:63px;height:77px;max-width:63px;" src="img/hand.png" />-->
                            
                            </div>
                        </div>
                        <div>
                            <img data-u="image" src="img/Almaty-Cycling-1300x500.jpg" />
                           
<<<<<<< HEAD:PROJETO/index.php
=======
                            <div class="msg-slider" style="">Participe da maior
                                <br/>
                                de bike sem São Paulo
                            
                            </div>
>>>>>>> 46ac53eab33da9b470325f045339d7ba525585e4:PROJETO/index.html
                            <!--
                            <div style="position:absolute;top:300px;left:30px;width:480px;height:130px;font-family:'Roboto Condensed',sans-serif;font-size:30px;color:#000000;line-height:1.27;padding:5px 5px 5px 5px;box-sizing:border-box;background-color:rgba(255,188,5,0.8);background-clip:padding-box;">
                                
                                Build your slider with anything, includes image, svg, text, html, photo, picture content
                            
                            </div>-->
                        </div>
                        <div>
                            <img data-u="image" src="img/granfondo-2-1500-1300x500.jpg"/>
                            
                            <div class="msg-slider" style="position:absolute;top:15px;left:100px;width:800px;-webkit-text-stroke-width: 2px;height:130px;font-family:'Roboto Condensed',sans-serif;font-size:70px;text-shadow: 5px 0px #3d7;color:white;line-height:1.0;padding:5px 5px 5px 5px;box-sizing:border-box;background-clip:padding-box;text-align:center;">"Participe da maior corrida
                                <br/>
                                de bikes do Brasil !!!"
                            
                            </div>
                            
                        </div>
                        <div>
                            <img data-u="image" src="img/imgslide_pegBikeRe-Ciclo.jpg" />
                            
                        </div>
                        
                    </div>
                    <!-- Bullet Navigator -->
                    <div data-u="navigator" class="jssorb032" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                        <div data-u="prototype" class="i" style="width:16px;height:16px;">
                            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                                
                            </svg>
                            
                        </div>
                        
                    </div>
                    <!-- Arrow Navigator -->
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
                </div>
            </div>
            <div id="conteudo-catalogo" class="center">
                <div id="menu-catalogo">
                    <lu >
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
                        
                        
                    </lu>
                </div>
                <div id="box-catalogo">
                    <div class="card-box">
                        <div class="card">
                            <div class="img-card center">
                                <img src="img/imgbikes_MountainBikeCaloiLotus.jpg" alt="" class="img-card">
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

                                <a href="index.html">Detalhes</a>

                            </div>
                        </div>

                        <div class="card">
                            <div class="img-card center">
                                <img src="img/imgbikes_MountainBikeTrackBikesTKS.jpg" alt="" class="img-card">
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

                                <a href="index.html">Detalhes</a>

                            </div>
                        </div>

                        <div class="card">
                            <div class="img-card center">
                                <img src="img/imgbikes_MountainBikeCaloiSport.jpg" alt="" class="img-card">
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
                                <a href="index.html">Detalhes</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-box">
                        <div class="card">
                            <div class="img-card center">
                                <img src="img/imgbikes_MountainBikeCaloiLotus.jpg" alt="" class="img-card">
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

                                <a href="index.html">Detalhes</a>

                            </div>
                        </div>

                        <div class="card">
                            <div class="img-card center">
                                <img src="img/imgbikes_MountainBikeTrackBikesTKS.jpg" alt="" class="img-card">
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

                                <a href="index.html">Detalhes</a>

                            </div>
                        </div>

                        <div class="card">
                            <div class="img-card center">
                                <img src="img/imgbikes_MountainBikeCaloiSport.jpg" alt="" class="img-card">
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
                                <a href="index.html">Detalhes</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="redes">
                    <div class="box-redes">
                        <a href="https://www.facebook.com/">
                            <img src="img/ico/facebook.png" alt="Facebook" height="64" width="64">
                        </a>
                    </div>

                    <div class="box-redes">
                        <a href="https://www.twitter.com/">
                            <img src="img/ico/twitter.png" alt="Twitter" height="64" width="64">
                        </a>
                    </div>

                    <div class="box-redes">
                        <a href="https://www.youtube.com/">
                            <img src="img/ico/youtube.png" alt="Youtube" height="64" width="64">
                        </a>
                    </div>
                </div>
            </div>
        </div>
<<<<<<< HEAD:PROJETO/index.php
        <?php
            
            require_once('footer.php');
            
        ?>
=======
        <div id="footer" class="center">
            <div id="main-footer" class="center">
                <div class="conteudo-footer">
                    <lu>
                        <li>Sobre nós </li>
                        <li>Pulitica de privacidade</li>
                        <li></li>
                        <li></li>
                        <li></li>

                    </lu>
                </div>
                <div class="conteudo-footer">
                    <lu>
                        <li></li>
                        <li>Trabalhe conosco</li>
                        <li></li>
                        <li></li>

                    </lu>
                </div>
                <div class="conteudo-footer">
                    <lu>
                        <li>Contatos</li>
                        <li>www.roadrunnercrossbikes@outlook.com</li>
                        <li>cel: (11)95880-8525</li>
                        
                    </lu>
                </div>
                <div class="conteudo-footer">
                    <lu>
                        <li>escrever qualquer  </li>
                        <li>coisa p/ ver </li>
                        <li>se fica bom o </li>
                        <li>rodapé</li>
                        <li></li>
                    </lu>
                </div>
            </div>
        </div>
>>>>>>> 46ac53eab33da9b470325f045339d7ba525585e4:PROJETO/index.html
    </body>
</html>