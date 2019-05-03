<?php
    
    require_once('../modulo.php');
    require_once('../bd/conexao.php');
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
    $botao = 'salvar';
    
    if(isset($_GET['modo'])){
        
        $modo = $_GET['modo'];
        $id = $_GET['id'];
        
        /***************************** EXCLUIR ************************/
        if($modo == 'excluir'){
            $nomefoto = $_GET['nomefoto'];
            
            
            $sql = "DELETE FROM tbl_produto WHERE codigo =".$id;
            mysqli_query($conexao, $sql);
            
            unlink($nomefoto);
            
            header('location:cms-noticias.php');
            
        /***************************** CONSULTAR ************************/
        }elseif($modo == 'consultar'){
            
            $sql = "SELECT * FROM tbl_produto WHERE codigo =".$id;
            $select = mysqli_query($conexao, $sql);
            
            if($rs = mysqli_fetch_array($select)){
                
                $nome = $rs['nome'];
                $nomefoto = $rs['imagem'];
                $descricao = $rs['descricao'];
                $preco = $rs['preco'];
                $valor_desconto = $rs['valor_desconto'];
                
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
        
        $nome = $_POST["textnomep"];
        $descricao = $_POST['textdescricao'];
        $preco = $_POST['textpreco'];
        $valor_desconto = $_POST['textvdesconto'];
        $status = $_POST['radio'];
        $foto = "";
        
        if(isset($_SESSION['path_foto'])){
            $foto = $_SESSION['path_foto'];
        }
        
        /***************************** SALVAR ************************/
        if($_POST['btnsalvar']=='salvar'){
            
            if(isset($_SESSION['path_foto']) && $_SESSION['path_foto']!=null){
            
                $sql = "INSERT INTO tbl_produto(nome, imagem,descricao, preco, valor_desconto, status) VALUES ('".$nome."','".$foto."','".$descricao."','".$preco."','".$valor_desconto."','".$status."')";
                
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
                
                $sql = "UPDATE tbl_produto SET nome = '".$nome."',
                                            imagem ='".$foto."',
                                            descricao = '".$descricao."',
                                            preco = '".$preco."',
                                            valor_desconto = '".$valor_desconto."',
                                            status = '".$status."'
                                            WHERE codigo =".$_SESSION['id'];
                
                if(mysqli_query($conexao, $sql)){
                    unlink($_SESSION['nomefoto']);
                    $_SESSION['path_foto'] = null;
                    $_SESSION['nomefoto'] = null;

                }
            }else{
                
                $sql = "UPDATE tbl_produto SET nome = '".$nome."',
                                            foto ='".$foto."',
                                            descricao = '".$descricao."',
                                            preco = '".$preco."',
                                            valor_desconto = '".$valor_desconto."',
                                            status = '".$status."'
                                            WHERE codigo =".$_SESSION['id'];
                
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
            <div id="conteudo">
                <form name="frm-cms-noticia" method="POST" action="cms-noticia.php">
                    <div class="titulos-cms">
                        <h3>Página Notícia</h3>
                        
                    </div>
                    <div class="container-conteudo-cms">
                        <div class="container-input">
                            <h4 style="margin-right:20px;">Noticia em destaque:</h4>
                            
                            <div class="input-text-cms">
                                <input type="text"
                                       class="input-cms-promo"
                                       placeholder="Digite o titulo da noticia">
                                
                            </div>
                            <div style="clear:both;">
                                <div src="" class="img-cms-noticias" style="border:1px solid #003311;border-radius:2px 2px;">
                                </div>
                            </div>
                            <div class="input-text-cms">
                                <input type="file">
                            </div>
                             <div class="input-text-cms">
                                <div class="box-rdo">
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
                            </div>
                        </div>
                        <div class="container-noticias-corpo">
                            <h4>Noticia em destaque:</h4>
                            <div class="input-text-cms">
                                <input type="text"
                                       class="input-cms-promo"
                                       placeholder="Digite o titulo da noticia">
                                
                            </div>
                            <div>
                                <div style="float:left;">
                                    <figure>
                                        <img src="" width="128px" height="128px" >
                                    </figure>
                                    
                                </div>
                                <div >
                                    <input type="file">
                                </div>
                                
                            </div>
                            <div style="clear:both;">
                                <textarea class="cms-textarea">
                                
                                
                                </textarea>
                            </div>
                             <div class="input-text-cms">
                                <div class="box-rdo">
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
                            </div>
                        </div>
                    </div>
                    <div class="conteudo-cms">
                        <div id="tbl-promocoes">
                            <div class="cabecalho">
                                <div class="titulos-promo">
<!--                                    Nome produto-->
                                </div>
                                <div class="titulos-promo">
<!--                                    Imagem-->
                                </div>
                                <div class="titulos-promo">
<!--                                    Preço-->
                                </div>
                                <div class="titulos-promo">
<!--                                    Desconto-->
                                </div>
                                <div class="titulo-campo-opcoes">
<!--                                    Opções-->
                                </div>
                            </div>
                            <?php

                                //TABELA VINDO DIRETO DO BANCO
                                $sql = "SELECT * FROM  tbl_noticias ORDER BY codigo DESC";

                                $select = mysqli_query($conexao, $sql);

                                while($rscontatos=mysqli_fetch_array($select))
                                {
                            ?>
                            <div class="tbl-dados-db">
                                <div class="campos-tbl-promo">
                                    <?php //echo($rscontatos['nome'])?>	
                                </div>
                                <div class="campos-tbl-promo">
                                    <?php //echo($rscontatos['imagem'])?>	
                                </div>
                                <div class="campos-tbl-promo">
                                    <?php ////echo($rscontatos['preco'])?>
                                </div>
                                <div class="campos-tbl-promo">
                                    <?php //echo($rscontatos['valor_desconto'])?>	
                                </div>
                                <div class="campo-opcoes">
                                    <div class="opcoes-promo">

                                        <a href= "cms-promocoes.php?modo=excluir&id=<?php echo($rscontatos['codigo']);?>&nomefoto=<?php echo($rscontatos['imagem']);?>" onclick="return confirm('Deseja realmente excluir?');">

                                            <input type="image"
                                                   src="../img/excluir.png"
                                                   width="24px"
                                                   height="24px"
                                                   class="img center"
                                                   style="margin-top:2px;">
                                            
                                        </a>
                                    </div>
                                    <div class="opcoes-promo">

                                        <a href="cms-promocoes.php?modo=editar&id=<?php echo($rscontatos['codigo']);?>">

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
                </form>
            </div>
            <div id="footer">
                <h3>
                    Desenvolvido por: Rubens Victor
                </h3>
            
            </div>
        </div>
    </body>
</html>