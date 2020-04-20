<?php
    
    require_once('../modulo.php');
    require_once('../db/conexao.php');
    session_start();
    
    $conexao = conexaoMysql();

    $titulo = null;
    $imagem = null;
    $conteudo = null;
    $status = null;
    $statusnoticia = null;
    $sql = null;
    $rs = null;
    $id = null;
    $rdoativado = null;
    $rdodesativado = null;
    $rdonoticiap = null;
    $rdonoticias = null;
    $botao = 'salvar';
    
    if(isset($_GET['modo'])){
        
        $modo = $_GET['modo'];
        $id = $_GET['id'];
        
        /***************************** EXCLUIR **************************/
        if($modo == 'excluir'){
            $nomefoto = $_GET['nomefoto'];
            
            $sql = "DELETE FROM tbl_noticia WHERE codigo =".$id;
            mysqli_query($conexao, $sql);
            
            unlink($nomefoto);
            
            header('location:cms-noticias.php');
            
        /***************************** CONSULTAR ************************/
        }elseif($modo == 'consultar'){
            
            $sql = "SELECT * FROM tbl_noticia WHERE codigo =".$id;
            $select = mysqli_query($conexao, $sql);
            
            if($rs = mysqli_fetch_array($select)){
                
                $titulo = $rs['titulo'];
                $nomefoto = $rs['imagem'];
                $conteudo = $rs['conteudo'];
                
                if($rs['status'] == 'A'){
                    $rdoativado = 'checked';
                
                }else{
                    $rdodesativado = 'checked';
                
                }
                
                /*********** VERFICAR NOTICIA PRINCIPAL *****************/
                
                if($rs['statusnoticia'] == 'P'){
                    $rdonoticiap = 'checked';
                
                }else{
                    $rdonoticias = 'checked';
                
                }
                
                $botao = 'editar';
                
                $_SESSION['id'] = $id;
                $_SESSION['nomefoto'] = $nomefoto;
                $_SESSION['path_foto'] = null;
                
            }
        }
    }

    if(isset($_POST['btnsalvar'])){
        
        $titulo = $_POST['text-titulo'];
        $conteudo = $_POST['text-conteudo'];
        $status = $_POST['radio'];
        $statusnoticia = $_POST['rdoprincipal'];
        $foto = "";
        
        echo($titulo.'<br><br>');
        
        if(isset($_SESSION['path_foto'])){
            $foto = $_SESSION['path_foto'];
        }
        
        /***************************** SALVAR ************************/
        if($_POST['btnsalvar']=='salvar'){
            
            if(isset($_SESSION['path_foto']) && $_SESSION['path_foto']!=null){
            
                $sql = "INSERT INTO tbl_noticia(titulo, imagem, conteudo, status, statusnoticia) VALUES ('".$titulo."','".$foto."','".$conteudo."','".$status."','".$statusnoticia."')";
                
//                echo($sql);
                
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
                
                $sql = "UPDATE tbl_noticia SET titulo='".$titulo."',
                                            imagem ='".$foto."',
                                            conteudo = '".$conteudo."',
                                            status = '".$status."',
                                            statusnoticia = '".$statusnoticia."'
                                            WHERE codigo =".$_SESSION['id'];
                
                if(mysqli_query($conexao, $sql)){
                    unlink($_SESSION['nomefoto']);
                    $_SESSION['path_foto'] = null;
                    $_SESSION['nomefoto'] = null;

                }
                
            }else{
                
                $sql = "UPDATE tbl_noticia SET titulo = '".$titulo."',
                                            conteudo = '".$conteudo."',
                                            status = '".$status."',
                                            statusnoticia = '".$statusnoticia."'
                                            WHERE codigo =".$_SESSION['id'];
                
                echo($sql);
                
                mysqli_query($conexao, $sql);
            }
        }   
        header("location:cms-noticias.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            CMS Notícias
        </title>
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
    
                include('cms-menu.php');
    
            ?>
            <div id="conteudo">
                    <div class="titulos-cms">
                        <h3>Página Notícia</h3>
                        
                    </div>
                    <div class="container-noticia">
                        <form id="fotos" name="frmFotos" method="POST" action="upload.php" enctype="multipart/form-data">
                            <div class="input-text-cms">
                                <input type="file"
                                        id="filefoto"
                                        name="flefoto"
                                        required>
                            </div>
                        </form>
                        <form name="frm-cms-noticia-foto" method="POST" action="cms-noticias.php">
                                <div id="visualizar_foto" >
                                <?php
                                    
                                    if(isset($nomefoto)){
                                ?>

                                <img src="<?php echo($nomefoto);?>" id="img-card">
                                <?php

                                    }else{
                                ?>

                                <img src="../img/ico/imgnotfound.png" id="img-card">

                                <?php
                                    }
                                ?>
                            </div>
                            <div class="input-text-cms">
                                <input type="text"
                                        name="text-titulo"
                                        class="input-cms-promo"
                                        placeholder="Digite o titulo da noticia"
                                        value="<?php echo($titulo)?>"
                                        maxlength="255"
                                        >

                            </div>
                            <div class="input-text-cms">
                                <div class="box-rdo">
                                    <input type="radio"
                                            name="rdoprincipal"
                                            value="P"
                                            id="rdo-noticia-p" <?php echo($rdonoticiap)?>
                                            required>

                                    <label for="rdo-noticia-p"> Principal</label>
                                </div>
                                <div class="box-rdo">
                                    <input type="radio"
                                            name="rdoprincipal"
                                            value="S"
                                            id="rdo-noticia-s" <?php echo($rdonoticias)?>
                                            required>

                                    <label for="rdo-noticia-s"> Secundário</label>
                                </div>
                            </div>
                        
                            <div class="box-textarea">
                                <textarea name="text-conteudo" maxlength="200" placeholder="Conteudo da notícia"><?php echo($conteudo);?></textarea>

                            </div>
                            <div class="input-text-cms">
                                <div class="box-rdo" style="width:100px;">
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
                                    <div class="box-rdo" style="text-align:left;">
                                    <input type="submit"
                                            class="btn-salvar"
                                            name="btnsalvar"
                                            id="btnsalvar"
                                            value="<?php echo($botao)?>">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="conteudo-cms">
                        <div id="tbl-promocoes" class="tbl-cms">
                            <div class="cabecalho">
                                <div class="titulos-promo" style="width:250px;">
                                    Titulo
                                </div>
                                <div class="titulos-promo" style="width:380px;">
                                    Conteúdo
                                </div>
                                <div class="titulos-promo" style="width:100px;">
                                    Status
                                </div>
                                <div class="titulos-promo" style="width:100px;">
                                    Tipo Noticia
                                </div>
                                <div class="titulo-campo-opcoes" style="width:80px;">
                                    Opções
                                </div>
                            </div>
                            <?php
                            
                            /********************* VISUALIZAR DADOS DO BANCO ************************/
                            $sql = "SELECT * FROM tbl_noticia ORDER BY statusnoticia LIKE 'S%'";
                            $select = mysqli_query($conexao, $sql);

                            while($rscontatos=mysqli_fetch_array($select)){
                                
                        ?>
                        <div class="tbl-dados-db">
                            <div class="campos-tbl-promo" style="width:250px;">
                                <?php echo($rscontatos['titulo'])?>
                                
                            </div>
                            <div class="campos-tbl-promo" style="width:385px;">
                                <?php echo($rscontatos['conteudo'])?>
                                
                            </div>
                            <div class="campos-tbl-promo" style="width:100px;">
                                <?php
                                    if($rscontatos['statusnoticia'] == 'P'){
                                        echo('Principal');
                                        
                                    }else{
                                        echo('Secundaria');
                                        
                                    }
                                ?>	
                            </div>
                            <div class="campos-tbl-promo" style="width:100px;">
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
                                    <a href= "cms-noticias.php?modo=excluir&id=<?php echo($rscontatos['codigo']);?>&nomefoto=<?php echo($rscontatos['imagem']);?>" onclick="return confirm('Deseja realmente excluir?');">

                                        <input type="image"
                                               src="../img/excluir.png"
                                               width="24px"
                                               height="24px"
                                               class="img center"
                                               style="margin-top:2px;">
                                        
                                    </a>
                                </div>
                                <div class="opcoes-promo">
                                    <a href="cms-noticias.php?modo=consultar&id=<?php echo($rscontatos['codigo']);?>">
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