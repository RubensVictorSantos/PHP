<?php
    
    require_once('bd/conexao.php');
    session_start();
    
    $conexao = conexaoMysql();

    $imagem = null;
    $conteudo = null;
    $sql = null;
    
    if(isset($_SESSION['path_foto'])){
        $foto = $_SESSION['path_foto'];
    }
    

?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>
            Eventos
        </title>
        <link rel="icon" href="img/ico/i405_TDM_icon_bike93.gif">
    </head>
    <body>
        <?php
        
            require_once('menu.php');
        
        ?>
        <div id="conteudo" class="center" >
            <?php
                
                $nomefoto = null;
                $conteudo = null;
                $status = null;

                $sql = "SELECT * FROM tbl_eventos WHERE status LIKE 'A%'";

                $select = mysqli_query($conexao, $sql);


                while($rscontatos=mysqli_fetch_array($select))
                {

                    $nomefoto = $rscontatos['imagem'];
                    $conteudo = $rscontatos['conteudo'];
            
            ?>
            <div class="box-evento">
                <div class="box-img-evento center">
                    <img src="cms/<?php echo($nomefoto);?>" alt="" class="img-evento">
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
