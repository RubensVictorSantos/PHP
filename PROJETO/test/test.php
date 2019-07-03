<?php

    require_once('../modulo.php');
    $msg = null;
?>
<html>
    <head>
        <title>
            Test
        </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="js/jquery.js"></script>
        <script src="js/menu.js"></script> 
    </head>
    <body>
        <header>
            
            <div id="icone_menu">
                <div class="barra-menu"></div>
                <div class="barra-menu"></div>
                <div class="barra-menu"></div>
            </div>
            
            <div id="container-buscar" class="close">
                <div id="img-buscar" class='imgopen'>
                
                </div>
                <input type="text"
                       name="txtbuscar"
                       placeholder="Search..."
                       id="txtbuscar" class="txtbuscar-close">

                <input type="submit"
                       name="btnbuscar" 
                       alt="submit" 
                       id="btnbuscar"
                       value="" class="btnbuscar-close">
            </div>
        </header>
        <div id="painel01">
            <div style="width:300px;height:300px;margin-left:auto;margin-right:auto;padding-top:50px;">
                <?php
                    $msg = 'Botão de informações';
                    info($msg);

                    proibido();
                ?>
            </div>
        </div>
        <div id="painel02">
            <div id="box1" class="center">
                <p class="letras">
                    R
                </p>
                <div id="box2">

                    <p class="letras">
                        R
                    </p>
                    <div id="box3">
            
                        <p class="letras">
                            C
                        </p>
                        <div id="box4">
            
                            <p class="letras">
                                B
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>