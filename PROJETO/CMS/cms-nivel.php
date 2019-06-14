<?php
    
    require_once('../modulo.php');
    require_once('../bd/conexao.php');
    session_start();
    
    $conexao = conexaoMysql();
    
    $chkconteudo = null;
    $chkfaleconosco = null;
    $chkproduto = null;
    $chkusuario = null;
    $txtnivel = null;
    $status = null;
    $rdoativado = null;
    $rdodesativado = null;
    $botao = 'salvar';
    $text = null;

    if(isset($_GET['modo'])){
        
        $modo = $_GET['modo'];
        $id = $_GET['id'];
        
        /***************************** EXCLUIR ************************/
        if($modo == 'excluir'){

            $sql = "DELETE FROM tbl_nivel WHERE codigo =".$id;
            mysqli_query($conexao, $sql);
            
            header('location:cms-nivel.php');
            
        /************************ CONSULTAR **********************/
        }elseif($modo == 'consultar'){
            
            $sql = "SELECT * FROM tbl_nivel WHERE codigo =".$id;
            $select = mysqli_query($conexao, $sql);
            
            if($rs = mysqli_fetch_array($select)){
                
                $txtnivel = $rs["nivel"];
                $chkconteudo = $rs["admconteudo"];
                $chkfaleconosco = $rs["admfaleconosco"];
                $chkproduto = $rs["admproduto"];
                $chkusuario = $rs["admusuario"];
                
                if($rs['status'] == 'A'){
                    $rdoativado = 'checked';
                
                }else{
                    $rdodesativado = 'checked';
                
                }
                
                if($rs['admfaleconosco'] == '1'){
                    $chkfaleconosco = 'checked';
                
                }
                
                if($rs['admconteudo'] == '1'){
                    $chkconteudo = 'checked';
                
                }
                
                if($rs['admproduto'] == '1'){
                    $chkproduto = 'checked';
                
                }
                
                if($rs['admusuario'] == '1'){
                    $chkusuario = 'checked';
                
                }
                
                $botao = 'editar';
                
                $_SESSION['id'] = $id;
                
            }
        }
    }

    if(isset($_POST['btnsalvar'])){
        
        
        $txtnivel = filter_var($_POST["txtnivel"], FILTER_SANITIZE_STRING);
        $chkconteudo = $_POST["chkconteudo"];
        $chkfaleconosco = $_POST["chkfaleconosco"];
        $chkproduto = $_POST["chkproduto"];
        $chkusuario = $_POST["chkusuario"];
        $status = $_POST['radio'];
        
        if($_POST['btnsalvar']=='salvar'){
            
                $sql = "INSERT INTO tbl_nivel(nivel, admconteudo,admfaleconosco, admproduto, admusuario, status) VALUES ('".$txtnivel."','".$chkconteudo."','".$chkfaleconosco."',".$chkproduto.",".$chkusuario.",'".$status."')";

                mysqli_query($conexao, $sql);
                header("location:cms-nivel.php");
        }elseif($_POST['btnsalvar']=='editar'){
         
            $sql = "UPDATE tbl_nivel SET nivel = '".$txtnivel."',
                                        admconteudo ='".$chkconteudo."',
                                        admfaleconosco = '".$chkfaleconosco."',
                                        admproduto = ".$chkproduto.",
                                        admusuario = ".$chkusuario.",
                                        status = '".$status."'
                                        WHERE codigo =".$_SESSION['id'];

            mysqli_query($conexao, $sql);
            
            header("location:cms-nivel.php");
            
        }
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <head>
        <title>
            CMS Adm. Nível
        </title>        
        <link rel="icon" href="../img/ico/i405_TDM_icon_bike93.gif">
        <link rel="stylesheet" type="text/css" href="css/style.css">

    </head>
    <body>
        <div id="box-main" class="center">
            
            <!--********************* MENU ********************-->
            <?php
                include 'cms-menu.php';
    
            ?>
            
            <!--********************* CONTEÚDO ****************-->
            <div class="titulos-cms">
                <h3>Administrar Nível</h3>
            </div>
            
            <div id="conteudo">
                
                <div class="conteudo-cms-promo">
                    <form name="frm-nivel" method="post" action="cms-nivel.php" enctype="multipart/form-data">
                        <div class="input-text-cms">
                            <h3>Cadastrar novo nível</h3>
                        </div>
                        <div class="input-text-cms">
                            <div class="box-input-promo">
                                <input type="text"
                                       name="txtnivel"
                                       id="nivel"
                                       class="input-cms-promo"
                                       value="<?php echo($txtnivel);?>"
                                       maxlength="20"
                                       placeholder=" Digite o novo nível"
                                       required>

                            </div>
                        </div>
                        <div class="input-text-cms">
                            <h3>Tipo de permissões</h3>
                        </div>
                        <div class="input-text-cms">
                            <div class="box-input-promo">
                                
                                <input type="hidden"
                                       name="chkconteudo"
                                       value="0">
                                
                                <input type="checkbox"
                                       name="chkconteudo"
                                       value="1"
                                       <?php echo($chkconteudo)?>
                                       > Administrar Conteudos
                            </div>
                        </div>
                        <div class="input-text-cms">
                            <div class="box-input-promo">
                                
                                <input type="hidden"
                                       name="chkfaleconosco"
                                       value="0">
                                
                                <input type="checkbox"
                                       name="chkfaleconosco"
                                       value="1"
                                       <?php echo($chkfaleconosco)?>
                                       > Administrar Fale-Conosco
                            </div>
                        </div>
                        <div class="input-text-cms">
                            <div class="box-input-promo">
                                
                                <input type="hidden"
                                       name="chkproduto"
                                       value="0">
                                
                                <input type="checkbox"
                                       name="chkproduto"
                                       value="1"
                                       <?php echo($chkproduto)?>
                                       > Administrar Produtos
                            </div>
                        </div>
                        <div class="input-text-cms">
                            <div class="box-input-promo">
                                
                                <input type="hidden"
                                       name="chkusuario"
                                       value="0">
                                
                                <input type="checkbox"
                                       name="chkusuario"
                                       value="1"
                                       <?php echo($chkusuario)?>
                                       > Administrar Usuários
                            </div>
                        </div>
                        <div class="input-text-cms">
                            <div class="box-rdo" style="width:85px;">
                                <input type="radio"
                                       name="radio"
                                       value="A"
                                       id="rdo-ativado" <?php echo($rdoativado)?>
                                       required>

                                <label for="rdo-ativado"> Ativar</label>
                            </div>
                            <div class="box-rdo">
                                <input type="radio"
                                       name="radio"
                                       value="D"
                                       id="rdo-desativado" <?php echo($rdodesativado)?>
                                       required>

                                <label for="rdo-desativado"> Desativar</label>
                            </div>
                            <div class="box-rdo">
                                <input type="submit"
                                       class="btn-salvar"
                                       name="btnsalvar"
                                       id="btnsalvar"
                                       value="<?php echo($botao)?>">
                            </div>
                        </div>
                    </form>
                </div>
                
                <!--********************* CONTEÚDO TABELA ****************-->
                <div calss="conteudo-cms-tbl">
                    <div class="cabecalho">
                        <div class="titulos-promo" style="width:150px;">
                            <p>
                                Nível
                            </p>

                        </div>
                        <div class="titulos-promo" style="width:138px;">
                            <p>
                                Conteúdo
                            </p>

                        </div>
                        <div class="titulos-promo" style="width:138px;">
                            <p>
                                Fale conosco
                            </p>

                        </div>
                        <div class="titulos-promo" style="width:138px;">
                            <p>
                                Produto 
                            </p>

                        </div>
                        <div class="titulos-promo" style="width:138px;">
                            <p>
                                Usuário
                            </p>

                        </div>
                        <div class="titulos-promo" style="width:138px;">
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
                        $sql = "SELECT * FROM tbl_nivel ORDER BY codigo DESC";
                        $select = mysqli_query($conexao, $sql);

                        while($rs=mysqli_fetch_array($select)){

                    ?>
                    <div class="tbl-dados-db">
                        <div class="campos-tbl-promo" style="width:150px;">
                            <?php echo($rs['nivel'])?>

                        </div>
                        <div class="campos-tbl-promo" style="width:138px;">
                            <?php
                                if($rs['admconteudo'] == '1'){
                                    echo('Sim');

                                }else{
                                    echo('Não');

                                }
                            ?>
                        </div>
                        <div class="campos-tbl-promo" style="width:138px;">

                            <?php
                                if($rs['admfaleconosco'] == '1'){
                                    echo('Sim');

                                }else{
                                    echo('Não');

                                }
                            ?>
                            
                        </div>
                        <div class="campos-tbl-promo" style="width:138px;">

                            <?php
                                if($rs['admproduto'] == '1'){
                                    echo('Sim');

                                }else{
                                    echo('Não');

                                }
                            ?>
                            
                        </div>
                        <div class="campos-tbl-promo" style="width:138px;">

                            <?php
                                if($rs['admusuario'] == '1'){
                                    echo('Sim');

                                }else{
                                    echo('Não');

                                }
                            ?>
                            
                        </div>
                        <div class="campos-tbl-promo" style="width:138px;">
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
                                <a href= "cms-nivel.php?modo=excluir&id=<?php echo($rs['codigo']);?>" onclick="return confirm('Deseja realmente excluir?');">

                                    <input type="image"
                                           src="../img/excluir.png"
                                           width="24px"
                                           height="24px"
                                           class="img center"
                                           style="margin-top:2px;">
                                    
                                    

                                </a>
                            </div>
                            <div class="opcoes-promo">
                                <a href="cms-nivel.php?modo=consultar&id=<?php echo($rs['codigo']);?>">
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
            
            <!--********************* FOOTER ********************-->
            <div id="footer">
                <h3>
                    Desenvolvido por: Rubens Victor
                </h3>
            
            </div>
        </div>
    </body>
</html>