<?php
    
    require_once('bd/conexao.php');
    session_start();
    
    $conexao = conexaoMysql();

    $nomeProduto = null;
    $imagem = null;
    $descricao = null;
    $preco = null;
    $valor_desconto = null;
    $status = null;
    $sql = null;
    $rdoativado = null;
    $rdodesativado = null;
    
    if(isset($_SESSION['path_foto'])){
        $foto = $_SESSION['path_foto'];
    }
    

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>
            Promoções
        </title>
        <link rel="icon" href="img/ico/i405_TDM_icon_bike93.gif">
    </head>
    <body>
        <?php

            require_once('menu.php');

        ?>
        <div id="conteudo" class="center">
            <div id="conteudo-catalogo" class="center">
                <h1 class="titulo-promo">

                    PROMOÇÕES

                </h1>
                <div id="box-catalogo-promo">
                    <?php

                        $nomeProduto = null;
                        $nomefoto = null;
                        $descricao = null;
                        $preco = null;
                        $valor_desconto = null;
                        $status = null;

                        $sql = "SELECT * FROM tbl_produto WHERE status LIKE 'A%'";

                        $select = mysqli_query($conexao, $sql);
                        
                        
                        while($rscontatos=mysqli_fetch_array($select))
                        {

                            $nomeProduto = $rscontatos['produto'];
                            $nomefoto = $rscontatos['imagem'];
                            $descricao = $rscontatos['descricao'];
                            $preco = $rscontatos['preco'];
                            $valor_desconto = $rscontatos['valor_desconto'];

                    ?>  
                        <div class="card">
                            <div class="img-card center">
                                
                                    <img src="cms/<?php echo($nomefoto);?>" alt="" class="img-card">
                                
                                
                                <div class="box-img-card">

                                    <?php
                                        
                                        $porcentagem = (100*$valor_desconto)/$preco;
//                                        $porcentagem = (100$preco)/$valor_desconto;
                                        
                                        echo(round($porcentagem).'<span>%</span>');
                                
                                    ?>

                                </div>

                            </div>
                            <div class="nome-card">
                                <p >
                                    <?php 
                                        echo($nomeProduto);
                                    
                                    ?>
                                </p>
                            </div>
                            <div class="desc-card">
                                <p>
                                    <?php 
                                        echo($descricao);
                                    
                                    ?>
                                </p>
                            </div>
                            <div class="preco-card-promo">
                                <p>
                                    <span class="text-promo">R$<?php 
                                        echo($preco);
                                    
                                    ?>
                                    </span> Por R$<?php 
                                        echo($valor_desconto);
                                    
                                    ?>
                                </p>
                            </div>
                            <div class="detalhes">

                                <a href="#">Detalhes</a>

                            </div>
                        </div>
                        <?php
                                
                            }
                        ?>
                </div>
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