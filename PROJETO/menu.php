<?php>
    
    echo(
    '
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <header class="center">
        <div id="logo">

        </div>
        <nav id="menu" class="center">
            <ul class="center">
                <li><a href="index.html">Promoções</a></li>
                <li><a href="index.html">Eventos</a></li>
                <li><a href="index.html">Sobre</a></li>
                <li><a href="index.html">Fale Conosco</a></li>
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
    </header>
    '
    );

?>