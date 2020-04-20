<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>
            Sobre a empresa
        </title>
        <link rel="icon" href="img/ico/i405_TDM_icon_bike93.gif">
    </head>
    <body>
        <?php

            require_once("menu.php");

        ?>
        <div id="conteudo" class="center">
            <div id="conteudo-catalogo" class="center">
                <?php

                    require_once('db/conexao.php');
                    session_start();
                    $conexao = conexaoMysql();

                    if(isset($_SESSION['path_foto'])){
                        $foto = $_SESSION['path_foto'];
                    }

                    $sql = null;
                    $nomefoto = null;
                    $conteudo = null;
                    $status = null;

                    $sql = "SELECT * FROM tbl_sobre WHERE status LIKE 'A%' ORDER BY codigo ASC";
                    $select = mysqli_query($conexao, $sql);    
                    $x = null;

                    while($rscontatos=mysqli_fetch_array($select)){

                        $nomefoto = $rscontatos['imagem'];
                        $conteudo = $rscontatos['conteudo'];
                        
                ?>
            <div style="width:inherit;">
                <div class="main-sobre" style="">
                    <p style="padding: 55px 20px 20px 20px;">
                        <?php
                            echo($conteudo);
                            
                        ?>

                    </p>
                </div>
                <div class="main-sobre" style="">
                    <p>
                        <img src="cms/<?php echo($nomefoto);?>" alt="" class="img-sobre"/>

                    </p>
                    <div class="main-sobre box-img-sobre" style="">
                    
                    </div>
                </div>
            </div>
            <?php
                    }
                require_once("redes.php");
            ?>
            </div>
        </div>
        <?php

            require_once("footer.php");

        ?>
    </body>
</html>