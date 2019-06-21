<?php
    
    require_once('../bd/conexao.php');

    $conexao = conexaoMysql();
    
    if(!isset($_SESSION)){
        
        session_start();
        
        $codnivel = $_SESSION['nivel'];

        $sql = "SELECT * FROM tbl_nivel WHERE codigo =".$codnivel;

        $select = mysqli_query($conexao, $sql);

        if($rs=mysqli_fetch_array($select)){
            
            $admproduto = $rs['admproduto'];

        }
        
        if(!$admproduto == '1'){
            header('location:cms.php');
            
        }
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <head>
        <title>
            CMS Adm. Produto
        </title>
        <link rel="icon" href="../img/ico/i405_TDM_icon_bike93.gif">
    </head>
    <body>
        <div id="box-main" class="center">
            
            <!--********************* MENU ********************-->
            <?php
                require_once('cms-menu.php');
    
            ?>
            
            <!--********************* CONTEÚDO ****************-->
            <div class="titulos-cms">
                <h3>Administrar Produtos</h3>
            </div>
            
            <div id="conteudo">
                
                <div class="option-conteudo">
                    <a href="cms-categoria-subcategoria.php">
                        <div class="conteudo-img">
                            <figure>
                                <img src="../img/ico/icon-cms/.png"
                                     id="img-cat-sub"
                                     class="img-cms">

                            </figure>
                        </div>
                        <div class="text-conteudo">
                            <label>
                                <p>Cadastrar Categoria e Subcategoria</p>
                            </label>
                        </div>
                    </a>
                </div>
                
                <div class="option-conteudo">
                    <a href="cms-produto.php">
                        <div class="conteudo-img">
                            <figure>
                                <img src="../img/ico/icon-cms/.png"
                                     id="img-cat-sub"
                                     class="img-cms">

                            </figure>
                        </div>
                        <div class="text-conteudo">
                            <label>
                                <p>Cadastrar Produto</p>
                            </label>
                        </div>
                    </a>
                </div>
                
                <div class="option-conteudo">
                    <a href="cms-referencias.php">
                        <div class="conteudo-img">
                            <figure>
                                <img src="../img/ico/icon-cms/.png"
                                     id="img-referencias"
                                     class="img-cms">

                            </figure>
                        </div>
                        <div class="text-conteudo">
                            <label>
                                <p>Cadastrar Referencias</p>
                            </label>
                        </div>
                    </a>
                </div>
                
            </div>
            
            <!--********************* FOOTER ********************-->
            <div id="footer">
                <h3>
                    Desenvolvido por: Rubens Victor
                </h3>
            
            </div>
        </div>
    </body>
</html>
