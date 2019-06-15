<?php

    require_once('bd/conexao.php');
    session_start();
    
    $conexao = conexaoMysql();
    
    $conteudo = null;
    $endereco = null;
    $numero = null;
    $bairro = null;
    $cidade = null;
    
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>
            Nossas Lojas
        </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="icon" href="img/ico/i405_TDM_icon_bike93.gif">
    </head>
    <body>
        <?php
        
            require_once('menu.php');
        
        ?>
        <div id="conteudo" class="center" >
            <h1 class="titulo-promo"> Nossos endereços </h1>
            
            <?php
                
                $sql = "SELECT * FROM tbl_lojas WHERE status LIKE 'A%'";
            
                $select = mysqli_query($conexao, $sql);
                
                while($rs = mysqli_fetch_array($select)){
                    
                    $conteudo =$rs['conteudo'];
                    $endereco = $rs['endereco'];
                    $numero = $rs['numero'];
                    $bairro = $rs['bairro'];
                    $cidade = $rs['cidade'];
                    
            ?>
            
            <div class="container-lojas">
                <div class="conteudo-container-loja">
                    <div class="text-noticia-loja">
                        <h1 class="titulo-lojas">
                            <?php
                                echo($cidade.', '.$bairro);
                            ?>
                        </h1>
                        <p class="formatacao-texto-destaque">
                            <?php
                                echo($endereco.', '.$numero.'<br>'.$conteudo);
                    
                            ?>
                        </p>
                        <p>
                            
                        </p>
                    </div>
                    <div class="mapouter">
                        <div class="gmap_canvas">

                            <div style="width: 100%">
                                <iframe width="100%" height="300px" src="https://maps.google.com/maps?width=100%&amp;height=300%&amp;hl=en&amp;q=<?php echo($numero)?>%20<?php echo($endereco)?>%20<?php echo($bairro)?>/2C%20<?php echo($cidade)?>%2C%20sp+(My%20Business%20Name)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                                    <a href="https://www.maps.ie/map-my-route/">Map a route</a>
                                </iframe>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }

                require_once('redes.php')

            ?>
        </div>
        
        <?php
        
            require_once('footer.php');
        
        ?>
    </body>
</html>