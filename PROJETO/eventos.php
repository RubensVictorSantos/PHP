<?php
    
    require_once('bd/conexao.php');
    session_start();
    
    $conexao = conexaoMysql();

    $imagem = null;
    $conteudo = null;
    $sql = null;

?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>
            Eventos
        </title>
        <link rel="icon" href="img/ico/i405_TDM_icon_bike93.gif">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="js/menu-mobile.js"></script>
    </head>
    <body>
        <?php
        
            include('menu.php');
        
        ?>
        <div id="conteudo" class="center" >
            <?php
                
                $sql = "SELECT * FROM tbl_eventos WHERE status LIKE 'A%'";

                $select = mysqli_query($conexao, $sql);


                while($rsevento=mysqli_fetch_array($select))
                {

                    $imagem = $rsevento['imagem'];
                    $conteudo = $rsevento['conteudo'];
            
            ?>
            <div class="box-evento">
                <div class="box-img-evento center">
                    <img src="cms/<?php echo($imagem);?>" alt="Imagem do Evento" class="img-evento">
                </div>
                <div class="texto-evento center">
                    <?php
                        echo($conteudo);
                    ?>
                </div>

            </div>
            <?php
                }
            ?>
            
        </div>
        <?php
        
            require_once('footer.php');
        
        ?>
    </body>
</html>
