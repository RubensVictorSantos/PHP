<?php
    /********************** MENU *******************/
?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="js/jquery.js"></script>
<script src="js/menu-mobile.js"></script>
<header class="center">
    <div id="box-main-header" class="center">
        
        <!-- LOGO -->

        <div id="logo">
            <a href="index.php" title="Página inicial" >
                <img src="img/ico/logo.png" alt="Logotipo da empresa" id="imag-logo">

            </a>
        </div>

        <nav id="menu" class="center">
            <ul class="center">
                <li><a href="noticias.php">Destaques</a></li>
                <li><a href="promocoes.php">Promoções</a></li>
                <li><a href="eventos.php">Eventos</a></li>
                <li><a href="fale-conosco.php">Fale Conosco</a></li>
                <li><a href="sobre.php">Sobre</a></li>
                <li><a href="lojas.php">Nossas Lojas</a></li>
            </ul>
        </nav>
        
        <!-- BUSCAR -->
        
        <div id="container-buscar" class="container-buscar-open">
            <form name="frmbuscar" id="frmbuscar" method="post" action="index.php">

                <div id="img-buscar" class='img-close'></div>

                <input type="text"
                       name="txtbuscar"
                       placeholder="Search..."
                       id="txtbuscar"
                       class="txtbuscar-open">

                <input type="submit"
                       name="btnbuscar" 
                       alt="submit" 
                       id="btnbuscar"
                       value=""
                       class="btnbuscar-open">

            </form>
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
                    <a href="sobre.php" class="link">
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
        
    </div>
</header>
<?php

?>