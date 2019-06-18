<?php

    require_once('../modulo.php');
    require_once('../bd/conexao.php');
    session_start();
    
    $conexao = conexaoMysql();

    $imagem = null;
    $conteudo = null;
    $status = null;
    $sql = null;
    $id = null;
    $rdoativado = null;
    $rdodesativado = null;
    $botao = 'salvar';
    
    if(isset($_GET['modo'])){
        
        $modo = $_GET['modo'];
        $id = $_GET['id'];
        
        /***************************** EXCLUIR ************************/
        if($modo == 'excluir'){
            $nomefoto = $_GET['nomefoto'];
            
            $sql = "DELETE FROM tbl_sobre WHERE codigo =".$id;
            mysqli_query($conexao, $sql);
            
            unlink($nomefoto);
            
            header('location:cms-sobre.php');
            
        /***************************** CONSULTAR **********************/
        }elseif($modo == 'consultar'){
            
            $sql = "SELECT * FROM tbl_sobre WHERE codigo =".$id;
            $select = mysqli_query($conexao, $sql);
            
            if($rs = mysqli_fetch_array($select)){
                
                $nomefoto = $rs['imagem'];
                $conteudo = $rs['conteudo'];
                
                if($rs['status'] == 'A'){
                    $rdoativado = 'checked';
                
                }else{
                    $rdodesativado = 'checked';
                
                }
                $botao = 'editar';
                
                $_SESSION['id'] = $id;
                $_SESSION['nomefoto'] = $nomefoto;
                $_SESSION['path_foto'] = null;
                
            }
        }
    }

    if(isset($_POST['btnsalvar'])){
        
        $conteudo = filter_var($_POST["text-conteudo"], FILTER_SANITIZE_STRING);
        $status = $_POST['radio'];
        $foto = "";
        
        if(isset($_SESSION['path_foto'])){
            $foto = $_SESSION['path_foto'];

        }
        
        /***************************** SALVAR ************************/
        if($_POST['btnsalvar']=='salvar'){
            
            if(isset($_SESSION['path_foto']) && $_SESSION['path_foto']!=null){
            
                $sql = "INSERT INTO tbl_sobre(imagem, conteudo, status) VALUES ('".$foto."','".$conteudo."','".$status."')";
                
                if(mysqli_query($conexao, $sql)){
                    $_SESSION['path_foto'] = null;
                    $_SESSION['nomefoto'] = null;
                    
                }
                
            }else{
                echo("<script>alert('Erro ao salvar')</script>");
                
            }
            
        /***************************** EDITAR ************************/
        }elseif($_POST['btnsalvar']=='editar'){
            
            if(isset($_SESSION['path_foto']) && $_SESSION['path_foto']!=null){
                
                $sql = "UPDATE tbl_sobre SET imagem ='".$foto."',
                                            conteudo = '".$conteudo."',
                                            status = '".$status."'
                                            WHERE codigo =".$_SESSION['id'];
                
                if(mysqli_query($conexao, $sql)){
                    unlink($_SESSION['nomefoto']);
                    $_SESSION['path_foto'] = null;
                    $_SESSION['nomefoto'] = null;
                    
                }
            }else{
                
                var_dump($_SESSION['path_foto'].'<br><br>');
                
                $sql = "UPDATE tbl_sobre SET conteudo = '".$conteudo."',
                                            status = '".$status."'
                                            WHERE codigo =".$_SESSION['id'];
            
                mysqli_query($conexao, $sql);
            }
        }
        header("location:cms-sobre.php");
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>CMS Sobre</title>
        <link rel="icon" href="../img/ico/i405_TDM_icon_bike93.gif">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="../js/mascara.js" type="text/javascript"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.form.js"></script>
        <script>
            $(document).ready(function(){
                
                $('#filefoto').live('change', function(){
                    
                    $('#fotos').ajaxForm({
                        
                        target: '#visualizar_foto'
                        
                    }).submit();
                    
                });
            });
        </script>
    </head>
    <body>
        <div id="box-main" class="center">
            
            <?php
    
                require_once('cms-menu.php');
    
            ?>
            <div class="titulos-cms">
                <h3>Página Sobre</h3>
                
            </div>
            <div id="conteudo">
                <div class="conteudo-sobre">
                    <form id="fotos" name="frmFotos" method="POST" action="upload.php" enctype="multipart/form-data">
                        <div class="input-text-cms">
                            <div id="box-file">
                                <input type="file"
                                       id="filefoto"
                                       name="flefoto"
                                       required>
                                
                            </div>
                        </div>
                    </form>
                    <form name="frmcms-promocoes" method="POST" action="cms-sobre.php" enctype="multipart/form-data">
                        <div id="visualizar_foto">  
                            <?php
                                if(isset($nomefoto)){

                            ?>

                            <img src="<?php echo($nomefoto);?>" alt="" id="img-card" >


                            <?php
                                }else{
                            ?>
                            <img src="../img/ico/imgnotfound.png" id="img-card">

                            <?php 
                                }

                            ?>
                        </div>
                        <div>
                            <textarea name="text-conteudo" maxlength="380" placeholder="Informações sobre a empresa"><?php echo($conteudo);?></textarea>

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
                                       checked
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
                <div class="conteudo-tbl-sobre">
                    <div id="tbl-promocoes">
                        <div class="cabecalho">
                            <div class="titulos-promo" style="width:200px;">
                                <p>
                                    Imagem
                                </p>
                                
                            </div>
                            <div class="titulos-promo" style="width:500px;">
                                <p>
                                    Conteúdo
                                </p>
                                
                            </div>
                            <div class="titulos-promo" style="width:120px;">
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
                            $sql = "SELECT * FROM tbl_sobre ORDER BY codigo DESC";           
                            
                            $select = mysqli_query($conexao, $sql);

                            while($rscontatos=mysqli_fetch_array($select)){
                                
                        ?>
                        <div class="tbl-dados-db">
                            <div class="campos-tbl-promo" style="width:200px;">
                                <?php echo($rscontatos['imagem'])?>
                                
                            </div>
                            <div class="campos-tbl-promo" style="width:500px;">
                                <?php echo($rscontatos['conteudo'])?>
                                
                            </div>
                            <div class="campos-tbl-promo" style="width:120px;">
                                <?php
                                    if($rscontatos['status'] == 'A'){
                                        echo('Ativado');
                                        
                                    }else{
                                        echo('Desativado');
                                        
                                    }
                                ?>	
                            </div>
                            
                            <div class="campo-opcoes">
                                <div class="opcoes-promo">
                                    <a href= "cms-sobre.php?modo=excluir&id=<?php echo($rscontatos['codigo']);?>&nomefoto=<?php echo($rscontatos['imagem']);?>" onclick="return confirm('Deseja realmente excluir?');">

                                        <input type="image"
                                               src="../img/excluir.png"
                                               width="24px"
                                               height="24px"
                                               class="img center"
                                               style="margin-top:2px;">
                                        
                                    </a>
                                </div>
                                <div class="opcoes-promo">
                                    <a href="cms-sobre.php?modo=consultar&id=<?php echo($rscontatos['codigo']);?>">
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
            <div id="footer">
                <h3>
                    Desenvolvido por: Rubens Victor
                </h3>
            </div>
        </div>
    </body>
</html>