<?php
    
    require_once('bd/conexao.php');
    session_start();
    
    $conexao = conexaoMysql();

    $titulo = null;
    $imagem = null;
    $conteudo = null;
    $status = null;
    $statusnoticia = null;
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
            Destaques
        </title>
        <link rel="icon" href="img/ico/i405_TDM_icon_bike93.gif">
    </head>
    <body>
        <?php 

            require_once('menu.php');

        ?>
        <div id="conteudo" class="center" >
        
            <div id="principais-noticias">
                <?php
                
                    $sql = "SELECT * FROM tbl_noticia WHERE statusnoticia LIKE 'P%' AND status LIKE 'A%' LIMIT 3 ";
                    $select = mysqli_query($conexao, $sql);
                    
                    while($rscontatos=mysqli_fetch_array($select))
                        {
                        
                            
                                $titulo = $rscontatos['titulo'];
                                $nomefoto = $rscontatos['imagem'];
                        
//                            if($cont<=3){
                        
                ?>
                <div class="box-noticia">
                    <img src="cms/<?php echo($nomefoto);?>" alt="" class="img-main-noticia" title="" >
                    
                    <a href="#" style="text-decoration: none;color:white;">
                        <div class="box-noticia-titulo" style="">
                            <h1>
                                <?php 
                                    echo($titulo);
                                    
                                ?>
                                
                            </h1>
                        </div>
                    </a>
                </div>
                <?php 

                    }
                ?>
                
            </div>
            <div id="conteudo-catalogo" class="center">
                
                <?php
                
                    $sql = "SELECT * FROM tbl_noticia WHERE statusnoticia LIKE 'S%' AND status LIKE 'A%'";
                
                    $select = mysqli_query($conexao, $sql);
                    
                    while($rscontatos=mysqli_fetch_array($select))
                        {
                        
                            
                                $titulo = $rscontatos['titulo'];
                                $nomefoto = $rscontatos['imagem'];
                                $conteudo = $rscontatos['conteudo'];
                
                ?>
                <div class="noticias">
                    <a href="#" class="links-noticia">
                        <div class="conteudo-noticia">
                            <div class="box-img-noticia">
                                <img src="cms/<?php echo($nomefoto);?>" alt="" class="img-noticia-conteudo" title="" >
                            </div>
                            <div class="text-noticia">
                                <h1 class="formatacao-titulo-noticia">
                                    <?php echo($titulo);?>
<!--                                    veja a última tendência para bicicletas presidenciais-->
                                </h1>
                                <p class="formatacao-texto-destaque">
                                    <?php echo($conteudo);?>
                                </p>
                                <p>
<!--                                    20/04/2019-->
                                </p>
                            </div>

                        </div>
                    </a>
                </div>
                <?php
                    }
                ?>
            </div>
            <?php 

                require_once('redes.php');

            ?>
        </div>        
        <?php 

            require_once('footer.php');

        ?>
    </body>
</html>
