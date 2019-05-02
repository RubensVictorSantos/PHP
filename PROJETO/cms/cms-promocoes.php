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
            
            header('location:cms-promocoes.php');
            
        }elseif($modo == 'consultar'){
            
            $sql = "SELECT * FROM tbl_produto WHERE codigo =".$id;
            $select = mysqli_query($conexao, $sql);
            
            if($rs = mysqli_fetch_array($select)){
                
                $nome = $rs['nome'];
                $nomefoto = $rs['imagem'];
                $descricao = $rs['descricao'];
                $preco = $rs['preco'];
                $valor_desconto = $rs['valor_desconto'];
                
                if($rs['status'] == 'a'){
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
        
        $nome = filter_var($_POST["textnomep"], FILTER_SANITIZE_STRING);
        $descricao = filter_var($_POST['textdescricao'], FILTER_SANITIZE_STRING);
        $preco = filter_var($_POST['textpreco'], FILTER_SANITIZE_STRING);
        $valor_desconto = filter_var($_POST['textvdesconto'], FILTER_SANITIZE_STRING);
        $status = $_POST['radio'];
        $foto = "";
        
        if(isset($_SESSION['path_foto'])){
            $foto = $_SESSION['path_foto'];
        }
        
        /***************************** SALVAR ************************/
        if($_POST['btnsalvar']=='salvar'){
            
            if(isset($_SESSION['path_foto']) && $_SESSION['path_foto']!=null){
            
                $sql = "INSERT INTO tbl_produto(nome, imagem,descricao, preco, valor_desconto, status) VALUES ('".$nome."','".$foto."','".$descricao."',".$preco.",".$valor_desconto.",'".$status."')";
                
                if(mysqli_query($conexao, $sql)){

                    $_SESSION['path_foto'] = null;
                    $_SESSION['nomefoto'] = null;
                }
                
                echo($sql);
                
            }else{
                
                echo("<script>alert('Erro ao salvar')</script>");
                
            }
            
        /***************************** EDITAR ************************/
        }elseif($_POST['btnsalvar']=='editar'){
            
            if(isset($_SESSION['path_foto']) && $_SESSION['path_foto']!=null){
                
                $sql = "UPDATE tbl_produto SET nome = '".$nome."',
                                            imagem ='".$foto."',
                                            descricao = '".$descricao."',
                                            preco = ".$preco.",
                                            valor_desconto = ".$valor_desconto.",
                                            status = '".$status."'
                                            WHERE codigo =".$_SESSION['id'];
                
                echo($sql);
                
                if(mysqli_query($conexao, $sql)){
                    unlink($_SESSION['nomefoto']);
                    $_SESSION['path_foto'] = null;
                    $_SESSION['nomefoto'] = null;

                }
            }else{
                
                $sql = "UPDATE tbl_produto SET nome = '".$nome."',
                                            descricao = '".$descricao."',
                                            preco = ".$preco.",
                                            valor_desconto = ".$valor_desconto.",
                                            status = '".$status."'
                                            WHERE codigo =".$_SESSION['id'];
                
                echo($sql);
                
                mysqli_query($conexao, $sql);
            }
        }
        header("location:cms-promocoes.php");
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            cms-promoções
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
            <div class="titulos-cms">
                <h3>Página Promoções</h3>
            </div>
            <div id="conteudo">
                <div class="conteudo-cms-promo">
                    <form id="fotos" name="frmFotos" method="POST" action="upload.php" enctype="multipart/form-data">
                        <div class="nome-produto">
                            <div id="box-file">
                                <input type="file" id="filefoto" name="flefoto" required>
                                
                            </div>
                        </div>
                    </form>
                    
                    <form name="frmcms-promocoes" method="POST" action="cms-promocoes.php" enctype="multipart/form-data">
                    <div id="visualizar_foto">  
                        <?php
                            if(isset($nomefoto)){
                                
                        ?>

                        <img src="<?php echo($nomefoto);?>" alt="" id="img-card" >


                        <?php
                            }else{
                        ?>
                        <div id="img-card" style="border:1px solid #003311;border-radius:2px 2px;">
                            
                        </div>
                        <?php 
                        }

                        ?>
                    </div>
                    <div class="nome-produto">
                        <div class="box-input-promo">
                            <input onkeypress="return validar(event,'number','nome')"
                                   type="text"
                                   name="textnomep"
                                   id="nome"
                                   class="input-cms-promo"
                                   value="<?php echo($nome)?>"
                                   maxlength="65"
                                   placeholder="Digite o nome do produto"
                                   required>
                        </div>
                    </div>
                    <div class="nome-produto">
                        <div class="box-input-promo">
                            <input type="text"
                                   name="textdescricao"
                                   class="input-cms-promo"
                                   value="<?php echo($descricao)?>"
                                   maxlength="65"
                                   placeholder="Digite a descrição do produto"
                                   required>
                        </div>
                    </div>
                    <div class="nome-produto">
                        <div class="box-input-promo">
                            <input onkeypress="return validar(event,'decimal','preco')"
                                   type="text"
                                   name="textpreco"
                                   id="preco"
                                   class="input-cms-promo"
                                   value="<?php echo($preco)?>"
                                   maxlength="65"
                                   placeholder=" Digite o preço atual do produto"
                                   required>
                        </div>
                    </div>
                    <div class="nome-produto">
                        <div class="box-input-promo">
                            <input type="text"
                                   name="textvdesconto"
                                   class="input-cms-promo"
                                   value="<?php echo($valor_desconto)?>"
                                   maxlength="65"
                                   placeholder=" Digite o preço promocional"
                                   required>
                        </div>
                    </div>

                    <div class="nome-produto">
                        <div class="box-rdo">
                            <input type="radio"
                                   name="radio"
                                   value="a"
                                   id="rdo-ativado" <?php echo($rdoativado)?>
                                   required >
                            <label for="rdo-ativado"> Ativado</label>
                        </div>
                        <div class="box-rdo">
                            <input type="radio"
                                   name="radio"
                                   value="d"
                                   id="rdo-desativado" <?php echo($rdodesativado)?>
                                   required >
                            <label for="rdo-desativado"> Desativado</label>
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
                <div class="conteudo-cms-tbl">
                    <div></div>
                    <div id="tbl-promocoes">
                        <div class="cabecalho">
                            <div class="titulos-promo" style="width:300px;">
                                Produto
                            </div>
                            <div class="titulos-promo" style="width:200px;">
                                Imagem
                            </div>
                            <div class="titulos-promo" style="width:120px;">
                                Preço
                            </div>
                            <div class="titulos-promo" style="width:120px;">
                                Desconto
                            </div>
                            <div class="titulos-promo" style="width:120px;">
                                status
                            </div>
                            <div class="titulo-campo-opcoes">
                                Opções
                            </div>
                        </div>
                        <?php
                            
                            //VISUALIZAR DADOS DO BANCO
                            $sql = "SELECT * FROM tbl_produto ORDER BY codigo DESC";

                            $select = mysqli_query($conexao, $sql);

                            while($rscontatos=mysqli_fetch_array($select))
                            {
                        ?>
                        <div class="tbl-dados-db">
                            <div class="campos-tbl-promo" style="width:300px;">
                                <?php echo($rscontatos['nome'])?>	
                            </div>
                            <div class="campos-tbl-promo" style="width:200px;">
                                <?php echo($rscontatos['imagem'])?>	
                            </div>
                            <div class="campos-tbl-promo" style="width:120px;">
                                <?php echo($rscontatos['preco'])?>
                            </div>
                            <div class="campos-tbl-promo" style="width:120px;">
                                <?php echo($rscontatos['valor_desconto'])?>	
                            </div>
                            <div class="campos-tbl-promo" style="width:120px;">
                                <?php
                                    if($rscontatos['status'] == 'a'){
                                        echo('ativado');
                                    }else{
                                        echo('desativado');
                                    }
                                ?>	
                            </div>
                            <div class="campo-opcoes">
                                <div class="opcoes-promo">
                                    
                                    <a href= "cms-promocoes.php?modo=excluir&id=<?php echo($rscontatos['codigo']);?>&nomefoto=<?php echo($rscontatos['imagem']);?>" onclick="return confirm('Deseja realmente excluir?');">

                                        <input type="image" src="../img/excluir.png" width="24px" height="24px" class="img center"
                                        style="margin-top:2px;">
                                    </a>
                                </div>
                                <div class="opcoes-promo">
                                    
                                    <a href="cms-promocoes.php?modo=consultar&id=<?php echo($rscontatos['codigo']);?>">
                                        
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