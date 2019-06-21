<?php
   
    require_once('../bd/conexao.php');
    
    $conexao = conexaoMysql();
    
    $status = null;
    $codproduto = 0;
    $codsubcategoria = 0;
    $codcategoria = 0;
    $produto = null;
    $subcategoria = null;
    $categoria = null;
    $rdoativado = null;
    $rdodesativado = null;
    $botao = 'salvar';
    

    /***************************** VERIFICAR PERMISSÃO *****************************/
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

    if(isset($_GET['modo'])){

        $modo = $_GET['modo'];
        $id = $_GET['id'];

        /************************ EXCLUIR ************************/
        if($modo == 'consultar'){

            $sql = "SELECT psc.codigo, psc.cod_produto, 
                            p.produto, psc.cod_subcategoria, 
                            s.subcategoria, psc.cod_categoria, 
                            c.categoria, psc.status 
                            FROM tbl_produto_subcategoria_categoria AS psc 
                            INNER JOIN tbl_produto AS p 
                            ON psc.cod_produto = p.codigo 
                            INNER JOIN tbl_subcategoria AS s 
                            ON psc.cod_subcategoria = s.codigo 
                            INNER JOIN tbl_categoria AS c 
                            ON psc.cod_categoria = c.codigo WHERE psc.codigo =".$id;


            $select = mysqli_query($conexao, $sql);

            if($rs = mysqli_fetch_array($select)){

                $codproduto = $rs['cod_produto'];
                $codsubcategoria = $rs['cod_subcategoria'];
                $codcategoria = $rs['cod_categoria'];
                $produto = $rs['produto'];
                $subcategoria = $rs['subcategoria'];
                $categoria = $rs['categoria'];

                if($rs['status'] == 'A'){
                    $rdoativado = 'checked';

                }else{
                    $rdodesativado = 'checked';

                }
                $botao = 'editar';

                $_SESSION['id'] = $id;
            }
        }
    }

      if(isset($_POST['btnsalvar'])){

        $codproduto = filter_var($_POST["cbo_produto"], FILTER_SANITIZE_STRING);
        $codsubcategoria = filter_var($_POST["cbo_subcategoria"], FILTER_SANITIZE_STRING);
        $codcategoria = filter_var($_POST["cbo_categoria"], FILTER_SANITIZE_STRING);
        $status = $_POST['radio'];

        /*************** SALVAR **************/
        if($_POST['btnsalvar'] == 'salvar'){

            $sql = "INSERT INTO tbl_produto_subcategoria_categoria(cod_produto, cod_subcategoria, cod_categoria, status) VALUES (".$codproduto.",".$codsubcategoria.",".$codcategoria.",'".$status."')";


            mysqli_query($conexao, $sql);

            header("location:cms-referencias.php");

        /*************** EDITAR **************/
        }elseif($_POST['btnsalvar'] == 'editar'){

            $sql = "UPDATE tbl_produto_subcategoria_categoria SET cod_produto = ".$codproduto.",
                                            cod_subcategoria = ".$codsubcategoria.",
                                            cod_categoria = ".$codcategoria.",
                                            status = '".$status."' 
                                            WHERE codigo =".$_SESSION['id'];

            mysqli_query($conexao, $sql);

        header("location:cms-referencias.php");
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
                <div class="conteudo-cms-promo">
                    <form name="frm-referencias" method="POST" action="cms-referencias.php" enctype="multipart/form-data">
                        <div class="input-text-cms">
                            <h3>Selecione a Categoria:</h3>
                        </div>
                        <div class="input-text-cms">
                            <div class="box-input-promo">

                                <!--********************* COMBOBOX CATEGORIA ********************-->
                                <select name="cbo_categoria" class="input-cms-promo" id="cbocategoria" required>
                                    
                                    <?php
                                        
                                        if($modo == "consultar"){
                                            
                                    ?>
                                    
                                    <option value="<?php echo($codcategoria)?>">
                                        
                                        <?php echo($categoria)?>
                                    
                                    </option>

                                    <?php
                                        }else{
                                    ?>
                                    
                                    <option>
                                        Selecione a categoria
                                    </option>
                                    
                                    <?php
                                            
                                        }
                                    
                                    
                                        $sql = "SELECT * FROM tbl_categoria WHERE status LIKE 'A%' AND codigo <>".$codcategoria." ORDER BY codigo";
                                    
                                        $select = mysqli_query($conexao, $sql);

                                        while($rscategoria=mysqli_fetch_array($select)){

                                    ?>

                                    <option value="<?php echo($rscategoria['codigo'])?>">

                                        <?php echo($rscategoria['categoria'])?>

                                    </option>

                                    <?php
                                        }
                                    ?>
                                </select>

                            </div>
                        </div>
                        <div class="input-text-cms">
                            <h3>Selecione a Subcategoria:</h3>
                        </div>
                        <div class="input-text-cms">
                            <div class="box-input-promo">

                                <!--********************* COMBOBOX SUBCATEGORIA ********************-->
                                <select name="cbo_subcategoria" class="input-cms-promo" id="cbosubcategoria" required>
                                    <?php
                                        
                                        if($modo == "consultar"){
                                            
                                    ?>
                                    
                                    <option value="<?php echo($codsubcategoria)?>">
                                        
                                        <?php echo($subcategoria)?>
                                    
                                    </option>

                                    <?php
                                        }else{
                                    ?>
                                    
                                    <option>
                                        Selecione a subcategoria
                                    </option>
                                    
                                    <?php
                                            
                                        }

                                        $sql = "SELECT * FROM tbl_subcategoria WHERE status LIKE 'A%' AND codigo <>".$codsubcategoria." ORDER BY codigo";

                                        $select = mysqli_query($conexao, $sql);

                                        while($rssubcategoria=mysqli_fetch_array($select)){

                                    ?>

                                    <option value="<?php echo($rssubcategoria['codigo'])?>">

                                        <?php echo($rssubcategoria['subcategoria'])?>

                                    </option>

                                    <?php
                                        }
                                    ?>
                                </select>

                            </div>
                        </div>
                        <div class="input-text-cms">
                            <h3>Selecione o Produto:</h3>
                        </div>
                        <div class="input-text-cms">
                            <div class="box-input-promo">

                                <!--********************* COMBOBOX PRODUTO ********************-->
                                <select name="cbo_produto" class="input-cms-promo" id="cboproduto" required>
                                    <?php
                                        
                                        if($modo == "consultar"){
                                            
                                    ?>
                                    
                                    <option value="<?php echo($codproduto)?>">
                                        
                                        <?php echo($produto)?>
                                    
                                    </option>

                                    <?php
                                        }else{
                                    ?>
                                    
                                    <option>
                                        Selecione o produto
                                    </option>
                                    
                                    <?php
                                            
                                        }
                                        
                                        $sql = "SELECT * FROM tbl_produto WHERE status LIKE 'A%' AND codigo <>".$codproduto." ORDER BY codigo";
                                    
                                        $select = mysqli_query($conexao, $sql);

                                        while($rscontatos=mysqli_fetch_array($select)){

                                    ?>

                                    <option value="<?php echo($rscontatos['codigo'])?>">

                                        <?php echo($rscontatos['produto'])?>

                                    </option>

                                    <?php
                                        }
                                    ?>
                                </select>

                            </div>
                        </div>

                        <div class="input-text-cms">
                            <div class="box-rdo" style="width:85px;">
                                <input type="radio"
                                       name="radio"
                                       value="A"
                                       id="rdo-ativado"
                                       <?php echo($rdoativado)?>
                                       required>

                                <label for="rdo-ativado"> Ativar</label>

                            </div>
                            <div class="box-rdo">
                                <input type="radio"
                                       name="radio"
                                       value="D"
                                       id="rdo-desativado"
                                       <?php echo($rdodesativado)?>
                                       required>

                                <label for="rdo-desativado"> Desativar</label>

                            </div>
                            <div class="box-rdo">
                                <input type="submit"
                                       class="btn-salvar"
                                       name="btnsalvar"
                                       id="btnsalvar"
                                       value="<?php echo($botao);?>">
                            </div>
                        </div>
                        
                    </form>
                </div>
                <div class="conteudo-cms-tbl">
                        <div id="tbl-promocoes">
                            <div class="cabecalho">
                                <div class="titulos-promo" style="width:250px;">
                                    <p>
                                        Categoria
                                    </p>

                                </div>
                                <div class="titulos-promo" style="width:180px;">
                                    <p>
                                        Subcategoria
                                    </p>

                                </div>
                                <div class="titulos-promo" style="width:280px;">
                                    <p>
                                        Produto
                                    </p>

                                </div>
                                <div class="titulos-promo" style="width:130px;">
                                    <p>
                                        Status
                                    </p>

                                </div>
                                <div class="titulo-campo-opcoes">
                                    <p>
                                        Opções
                                    </p>

                                </div>
                            </div>
                            <?php

                                /********************* VISUALIZAR DADOS DO BANCO ************************/
                            $sql = "SELECT psc.codigo, psc.cod_produto, 
                                            p.produto, psc.cod_subcategoria, 
                                            s.subcategoria, psc.cod_categoria, 
                                            c.categoria, psc.status 
                                            FROM tbl_produto_subcategoria_categoria AS psc 
                                            INNER JOIN tbl_produto AS p 
                                            ON psc.cod_produto = p.codigo 
                                            INNER JOIN tbl_subcategoria AS s 
                                            ON psc.cod_subcategoria = s.codigo 
                                            INNER JOIN tbl_categoria AS c 
                                            ON psc.cod_categoria = c.codigo ORDER BY psc.codigo DESC";

                                $select = mysqli_query($conexao, $sql);

                                while($rs = mysqli_fetch_array($select)){

                            ?>
                            <div class="tbl-dados-db">
                                <div class="campos-tbl-promo" style="width:250px;">
                                    <?php echo($rs['categoria'])?>

                                </div>
                                <div class="campos-tbl-promo" style="width:180px;">
                                    <?php
                                       echo($rs['subcategoria']);
                                    ?>
                                </div>
                                <div class="campos-tbl-promo" style="width:280px;">
                                    <?php
                                       echo($rs['produto']);
                                    ?>
                                </div>
                                <div class="campos-tbl-promo" style="width:130px;">
                                    <?php
                                        if($rs['status'] == 'A'){
                                            echo('Ativado');

                                        }else{
                                            echo('Desativado');

                                        }
                                    ?>	
                                </div>

                                <div class="campo-opcoes">
                                    <div class="opcoes-promo">
                                        <a href="cms-referencias.php?modo=consultar&id=<?php echo($rs['codigo']);?>">

                                            <img src="../img/editar24.png"
                                                 style="width:20px; height:23px; margin-top:2px;"
                                                 class="img center">

                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            ?>

                        </div>
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