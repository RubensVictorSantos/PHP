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
        <script src="js/buscar.js"></script> 
    </head>
    <body>
        <header>
            
            <div id="icone_menu">
                <div class="barra-menu"></div>
                <div class="barra-menu"></div>
                <div class="barra-menu"></div>
            </div>
            <div id="container-buscar" class="close">

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
        
            <div style="width:300px;height:300px;margin-left:auto;margin-right:auto;padding-top:50px;">
                <?php
                    $msg = 'Botão de informações';
                    info($msg);
                    
                    proibido();
                ?>
            </div>
    </body>

</html>