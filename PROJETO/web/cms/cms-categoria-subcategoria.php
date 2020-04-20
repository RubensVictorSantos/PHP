<?php

    require_once('../db/conexao.php');
    
    $conexao = conexaoMysql();

    $categoria = null;
    $status_cat = null;
    $rdoativado_cat = null;
    $rdodesativado_cat = null;
    $botao_cat = 'salvar';
    $subcategoria = null;
    $status_sub = null;
    $rdoativado_sub = null;
    $rdodesativado_sub = null;
    $botao_sub = 'salvar';
    
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

    /*+++++++++++++++++++++++++++++ CATEGORIA +++++++++++++++++++++++++++++*/

    if(isset($_GET['modocat'])){

        $modo_cat = $_GET['modocat'];
        $id_cat = $_GET['idcat'];

        /***************************** EXCLUIR CATEGORIA ************************/
        if($modo_cat == 'excluir'){

            $sql = "DELETE FROM tbl_categoria WHERE codigo =".$id_cat;
            mysqli_query($conexao, $sql);

            header('location:cms-categoria-subcategoria.php');

        /************************ CONSULTAR CATEGORIA **********************/
        }elseif($modo_cat == 'consultar'){

            $sql = "SELECT * FROM tbl_categoria WHERE codigo =".$id_cat;
            $select = mysqli_query($conexao, $sql);

            if($rscategoria = mysqli_fetch_array($select)){

                $categoria = $rscategoria['categoria'];

                if($rscategoria['status'] == 'A'){
                    $rdoativado_cat = 'checked';

                }else{
                    $rdodesativado_cat = 'checked';

                }
                $botao_cat = 'editar';

                $_SESSION['idcat'] = $id_cat;

            }
        }
    }

    if(isset($_POST['btnsalvarcat'])){

        $categoria = filter_var($_POST["textcategoria"], FILTER_SANITIZE_STRING);
        $status_cat = $_POST['radio'];

        /***************************** SALVAR CATEGORIA ************************/
        if($_POST['btnsalvarcat']=='salvar'){

            $sql = "INSERT INTO tbl_categoria(categoria, status) VALUES ('".$categoria."','".$status_cat."')";

            mysqli_query($conexao, $sql);

            header("location:cms-categoria-subcategoria.php");

        /***************************** EDITAR CATEGORIA ************************/
        }elseif($_POST['btnsalvarcat']=='editar'){

            $sql = "UPDATE tbl_categoria SET categoria = '".$categoria."',
                                        status = '".$status_cat."'
                                        WHERE codigo =".$_SESSION['idcat'];

            mysqli_query($conexao, $sql);

            header("location:cms-categoria-subcategoria.php");
        }
    }

    /*+++++++++++++++++++++++++++++ SUBCATEGORIA +++++++++++++++++++++++++++++*/

    if(isset($_GET['modosub'])){

        $modo_sub = $_GET['modosub'];
        $id_sub = $_GET['idsub'];

        /***************************** EXCLUIR ************************/
        if($modo_sub == 'excluir'){

            $sql = "DELETE FROM tbl_subcategoria WHERE codigo =".$id_sub;
            mysqli_query($conexao, $sql);

            header('location:cms-categoria-subcategoria.php');

        /************************ CONSULTAR **********************/
        }elseif($modo_sub == 'consultar'){

            $sql = "SELECT * FROM tbl_subcategoria WHERE codigo =".$id_sub;
            $select = mysqli_query($conexao, $sql);

            if($rs = mysqli_fetch_array($select)){

                $subcategoria = $rs['subcategoria'];

                if($rs['status'] == 'A'){
                    $rdoativado_sub = 'checked';

                }else{
                    $rdodesativado_sub = 'checked';

                }
                $botao_sub = 'editar';

                $_SESSION['idsub'] = $id_sub;

            }
        }
    }

    if(isset($_POST['btnsalvar'])){

        $subcategoria = filter_var($_POST["textsubcategoria"], FILTER_SANITIZE_STRING);
        $status_sub = $_POST['radio'];

        /***************************** SALVAR ************************/
        if($_POST['btnsalvar'] == "salvar"){

            $sql = "INSERT INTO tbl_subcategoria(subcategoria, status) VALUES ('".$subcategoria."','".$status_sub."')";

            mysqli_query($conexao, $sql);

            header("location:cms-categoria-subcategoria.php");

        /***************************** EDITAR ************************/
        }elseif($_POST['btnsalvar'] =='editar'){

            $sql = "UPDATE tbl_subcategoria SET subcategoria = '".$subcategoria."',
                                        status = '".$status_sub."'
                                        WHERE codigo =".$_SESSION['idsub'];

            mysqli_query($conexao, $sql);

            header("location:cms-categoria-subcategoria.php");
        }
    }
    
?>
<!DOCTYPE html>
<html lang="pt-br">
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <head>
        <title>
            CMS Categoria e Subcategoria
        </title>

        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.form.js"></script>
    </head>
    <body>
        <div id="box-main" class="center">
            
            <!--********************* MENU ********************-->
            <?php
                include'cms-menu.php';
    
            ?>
            
            <!--********************* CONTEÚDO ****************-->
            <div class="titulos-cms">
                <h3>Cadastrar Categoria e Subcategoria</h3>
            </div>
            
            <div id="conteudo">
                <div class="conteudo-categoria">
                    
                    <form name="frm-categoria" method="post" action="cms-categoria-subcategoria.php" enctype="multipart/form-data">
                        <div class="input-text-cms">
                            <h3>Cadastrar Categoria:</h3>
                        </div>
                        <div class="input-text-cms">
                            <div class="box-input-promo">
                                <input
                                    type="text"
                                    name="textcategoria"
                                    id="nome"
                                    class="input-cms-promo"
                                    value="<?php echo($categoria)?>"
                                    maxlength="50"
                                    placeholder=" Digite a categoria"
                                    required>
                            </div>
                        </div>
                        <div class="input-text-cms">
                            <div class="box-rdo" style="width:85px;">
                                <input type="radio"
                                       name="radio"
                                       value="A"
                                       id="rdo-ativado-cat" <?php echo($rdoativado_cat)?>
                                       required>

                                <label for="rdo-ativado-cat"> Ativar</label>
                            </div>
                            <div class="box-rdo">
                                <input type="radio"
                                       name="radio"
                                       value="D"
                                       id="rdo-desativado-cat" <?php echo($rdodesativado_cat)?>
                                       required>

                                <label for="rdo-desativado-cat"> Desativar</label>
                            </div>
                            <div class="box-rdo">
                                <input type="submit"
                                       class="btn-salvar"
                                       name="btnsalvarcat"
                                       id="btnsalvar"
                                       value="<?php echo($botao_cat)?>">
                            </div>
                        </div>
                    </form>
                    
<!--                    TABELA -->
                    <div class="conteudo-tbl-categoria">
                        <div id="tbl-promocoes">
                            <div class="cabecalho">
                                <div class="titulos-promo" style="width:200px;">
                                    <p>
                                        Categoria
                                    </p>

                                </div>
                                <div class="titulos-promo" style="width:110px;">
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
                                $sql = "SELECT * FROM tbl_categoria ORDER BY codigo DESC";
                                $select = mysqli_query($conexao, $sql);

                                while($rscategoria=mysqli_fetch_array($select)){

                            ?>
                            <div class="tbl-dados-db">
                                <div class="campos-tbl-promo" style="width:200px;">
                                    <?php echo($rscategoria['categoria'])?>

                                </div>
                                <div class="campos-tbl-promo" style="width:120px;">
                                    <?php
                                        if($rscategoria['status'] == 'A'){
                                            echo('Ativado');

                                        }else{
                                            echo('Desativado');

                                        }
                                    ?>	
                                </div>

                                <div class="campo-opcoes">
                                    <div class="opcoes-promo">
                                        <a href= "cms-categoria-subcategoria.php?modocat=excluir&idcat=<?php echo($rscategoria['codigo']);?>" onclick="return confirm('Deseja realmente excluir?');">

                                            <input type="image"
                                                   src="../img/excluir.png"
                                                   width="24px"
                                                   height="24px"
                                                   class="img center"
                                                   style="margin-top:2px;">

                                        </a>
                                    </div>
                                    <div class="opcoes-promo">
                                        <a href="cms-categoria-subcategoria.php?modocat=consultar&idcat=<?php echo($rscategoria['codigo']);?>">
                                            <img src="../img/editar24.png" width="20px" height="23px" class="img center" style="margin-top:2px;">

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
<!--                CONTEUDO SUBCATEGORIA-->
                <div class="conteudo-subcategoria">
                    
                    <form name="frm-subcategoria" method="post" action="cms-categoria-subcategoria.php" enctype="multipart/form-data">
                        <div class="input-text-cms">
                            <h3>Cadastrar Subcategoria:</h3>
                        </div>
                        <div class="input-text-cms">
                            <div class="box-input-promo">
                                <input
                                    type="text"
                                    name="textsubcategoria"
                                    id="nome"
                                    class="input-cms-promo"
                                    value="<?php echo($subcategoria)?>"
                                    maxlength="50"
                                    placeholder=" Digite a subcategoria"
                                    required>
                            </div>
                        </div>
                        <div class="input-text-cms">
                            <div class="box-rdo" style="width:85px;">
                                <input type="radio"
                                       name="radio"
                                       value="A"
                                       id="rdo-ativado-sub" <?php echo($rdoativado_sub)?>
                                       required>

                                <label for="rdo-ativado-sub"> Ativar</label>
                            </div>
                            <div class="box-rdo">
                                <input type="radio"
                                       name="radio"
                                       value="D"
                                       id="rdo-desativado-sub" <?php echo($rdodesativado_sub)?>
                                       required>

                                <label for="rdo-desativado-sub"> Desativar</label>
                            </div>
                            <div class="box-rdo">
                                <input type="submit"
                                       class="btn-salvar"
                                       name="btnsalvar"
                                       id="btnsalvar"
                                       value="<?php echo($botao_sub)?>">
                            </div>
                        </div>
                    </form>
                    
<!--                    TABELA -->
                    <div class="conteudo-tbl-categoria">
                        <div id="tbl-promocoes">
                            <div class="cabecalho">
                                <div class="titulos-promo" style="width:33%;">
                                    <p>
                                        Subcategoria
                                    </p>

                                </div>
                                <div class="titulos-promo" style="width:33%;">
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
                                $sql = "SELECT * FROM tbl_subcategoria ORDER BY codigo DESC";
                                $select = mysqli_query($conexao, $sql);

                                while($rssubcategoria=mysqli_fetch_array($select)){

                            ?>
                            <div class="tbl-dados-db">
                                <div class="campos-tbl-promo" style="width:33%;">
                                    <?php echo($rssubcategoria['subcategoria'])?>

                                </div>
                                <div class="campos-tbl-promo" style="width:33%;">
                                    <?php
                                        if($rssubcategoria['status'] == 'A'){
                                            echo('Ativado');

                                        }else{
                                            echo('Desativado');

                                        }
                                    ?>	
                                </div>

                                <div class="campo-opcoes">
                                    <div class="opcoes-promo">
                                        <a href= "cms-categoria-subcategoria.php?modosub=excluir&idsub=<?php echo($rssubcategoria['codigo']);?>" onclick="return confirm('Deseja realmente excluir?');">

                                            <input type="image"
                                                   src="../img/excluir.png"
                                                   width="24px"
                                                   height="24px"
                                                   class="img center"
                                                   style="margin-top:2px;">

                                        </a>
                                    </div>
                                    <div class="opcoes-promo">
                                        <a href="cms-categoria-subcategoria.php?modosub=consultar&idsub=<?php echo($rssubcategoria['codigo']);?>">
                                            <img src="../img/editar24.png" width="20px" height="23px" class="img center" style="margin-top:2px;">

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