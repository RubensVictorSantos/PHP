<?php
    
    require_once('bd/conexao.php');
    session_start();
    
    $conexao = conexaoMysql();

    $nome = null;
    $imagem = null;
    $descricao = null;
    $preco = null;
    $valor_desconto = null;
    $status = null;
    $sql = null;
    $rs = null;
    $id = null;
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
//                        global $cont = null;
                        $nome = null;
                        $nomefoto = null;
                        $descricao = null;
                        $preco = null;
                        $valor_desconto = null;
                        $status = null;

                        $sql = "SELECT * FROM tbl_produto WHERE status LIKE 'a%'";

                        $select = mysqli_query($conexao, $sql);
                        
                        
                        while($rscontatos=mysqli_fetch_array($select))
                        {

                            $nome = $rscontatos['nome'];
                            $nomefoto = $rscontatos['imagem'];
                            $descricao = $rscontatos['descricao'];
                            $preco = $rscontatos['preco'];
                            $valor_desconto = $rscontatos['valor_desconto'];

                    ?>  
                        <div class="card">
                            <div class="img-card center">
                                <img src="cms/<?php
                                            echo($nomefoto);
                                          ?>" alt="" class="img-card">

                                <div class="box-img-card">

                                    <?php
                                        
                                        $porcentagem = 0;        
                                
                                        $porcentagem = (100/$preco)*$valor_desconto;
                                        
                                        echo(round($porcentagem).'<span>%</span>');
                                
                                    ?>

                                </div>

                            </div>
                            <div class="nome-card">
                                <p >
                                    <?php 
                                        echo($nome);
                                    
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