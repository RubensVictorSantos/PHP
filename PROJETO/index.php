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
        <div id="conteudo" class="center">
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
                            
                            
                        </div>
                        <div>
                            <img data-u="image" src="img/Almaty-Cycling-1300x500.jpg" />
                           
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
                            
                            <div class="msg-slider" style="position:absolute;top:15px;left:50px;width:800px;-webkit-text-stroke-width: 2px;height:130px;font-family:'Roboto Condensed',sans-serif;font-size:70px;text-shadow: 5px 0px #3d7;color:white;line-height:1.0;padding:5px 5px 5px 5px;box-sizing:border-box;background-clip:padding-box;text-align:center;">Bike-sharing nova proposta ecologica!
                            </div>
                            
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

                                <a href="#">Detalhes</a>

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

                                <a href="#">Detalhes</a>

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
                                <a href="#">Detalhes</a>
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

                                <a href="#">Detalhes</a>

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

                                <a href="#">Detalhes</a>

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
                                <a href="#">Detalhes</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                47
                    require_once('redes.php');
                
                ?>
            </div>
        </div>
        <?php
            
            require_once('footer.php');
            
        ?>
    </body>
</html>8/