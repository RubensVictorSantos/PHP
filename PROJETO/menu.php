<?php
    
    echo(
    '
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <header class="center">
        <div id="box-main-header" class="center">
            <div id="logo">
                <!--Road Runner-->
                <a href="index.php" title="Página inicial" >
                    <img src="img/ico/logo.png" style=" " alt="bicicleta logo da empresa" id="imag-logo">
                </a>
            </div>
            <nav id="menu" class="center">
                <ul class="center">
                    <li><a href="Destaques.php">Destaques</a></li>
                    <li><a href="promocoes.php">Promoções</a></li>
                    <li><a href="eventos.php">Eventos</a></li>
                    <li><a href="fale-conosco.php">Fale Conosco</a></li>
                    <li><a href="Sobre.php">Sobre</a></li>
                    <li><a href="lojas.php">Nossas Lojas</a></li>
                </ul>
            </nav>
            <div id="login">
                <form name="frmRoadRunnerCrossBikes" method="post" action="index.php">
                    <div class="box-login center">
                        <label>
                            Usuário
                        </label><br>
                        <input type="text" name="txt-usuario" id="txtUser">
                    </div>
                    <div class="box-login center">
                        <label >
                            Senha
                        </label><br>
                        <input type="password" name="txt-senha" id="txtPass">
                        <input type="button" value="Ok" name="btn-ok" id="btnOk">
                    </div>
                </form>
            </div>
        </div>
    </header>
    '
    );

?>
