<?php

    require_once('../modulo.php');
    require_once('../bd/conexao.php');
    session_start();
    
    $conexao = conexaoMysql();

    $imagem = null;
    $conteudo = null;
    $status = null;
    $endereco =  null;
    $numero =  null;
    $bairro =  null;
    $cidade =  null;
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
            
            $sql = "DELETE FROM tbl_lojas WHERE codigo =".$id;
            mysqli_query($conexao, $sql);
            
            
            header('location:cms-lojas.php');
            
        /***************************** CONSULTAR **********************/
        }elseif($modo == 'consultar'){
            
            $sql = "SELECT * FROM tbl_lojas WHERE codigo =".$id;
            $select = mysqli_query($conexao, $sql);
            
            if($rs = mysqli_fetch_array($select)){
                
                $conteudo = $rs['conteudo'];
                $endereco = $rs['endereco'];
                $numero = $rs['numero'];
                $cidade = $rs['cidade'];
                $bairro = $rs['bairro'];
                
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
        
        $conteudo = filter_var($_POST["text-conteudo"], FILTER_SANITIZE_STRING);
        $endereco = filter_var($_POST["text-endereco"], FILTER_SANITIZE_STRING);
        $numero = filter_var($_POST["text-numero"], FILTER_SANITIZE_STRING);
        $bairro = filter_var($_POST["text-bairro"], FILTER_SANITIZE_STRING);
        $cidade = filter_var($_POST["text-cidade"], FILTER_SANITIZE_STRING);
        $status = $_POST['radio'];
        
        /***************************** SALVAR ************************/
        if($_POST['btnsalvar']=='salvar'){
            
            $sql = "INSERT INTO tbl_lojas(conteudo, status, endereco, numero, cidade, bairro) VALUES ('".$conteudo."','".$status."','".$endereco."',".$numero.",'".$cidade."','".$bairro."')";
            
            mysqli_query($conexao, $sql);
            
        /***************************** EDITAR ************************/
        }elseif($_POST['btnsalvar']=='editar'){
                
            $sql = "UPDATE tbl_lojas SET conteudo = '".$conteudo."',
                                        status = '".$status."',
                                        endereco = '".$endereco."',
                                        numero = ".$numero.",
                                        cidade = '".$cidade."',
                                        bairro = '".$bairro."'
                                        WHERE codigo =".$_SESSION['id'];

//            echo($sql);
            mysqli_query($conexao, $sql);
        }
        header("location:cms-lojas.php");
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
    </head>
    <body>
        <div id="box-main" class="center">
            
            <?php
    
                require_once('cms-menu.php');
    
            ?>
            <div class="titulos-cms">
                <h3>Página nossa lojas</h3>
                
            </div>
            <div id="conteudo">
                <div class="conteudo-lojas">
                    <form name="frmcms-promocoes" method="POST" action="cms-lojas.php" enctype="multipart/form-data">
                        <div id="visualizar_foto">  
                            <?php
                                if(isset($_GET['modo'])){
                            ?>
                            
                            <div id="img-card" style="border:1px solid #003311;border-radius:2px 2px;">
                                
                                <div class="mapouter">
                                    <div class="gmap_canvas">

                                        <div style="width: 200px;text-align:center;">
                                            <iframe width="298px" height="259px" src="https://maps.google.com/maps?width=100%&amp;height=300%&amp;hl=en&amp;q=<?php echo($numero)?>%20<?php echo($endereco)?>%20<?php echo($bairro)?>/2C%20<?php echo($cidade)?>%2C%20sp+(My%20Business%20Name)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                                                <a href="https://www.maps.ie/map-my-route/">Map a route</a>
                                            </iframe>
                                        </div>
                                        <br />
                                    </div>
                                </div>

                            </div>
                                
                            <?php
                                }else{
                            ?>
                            
                            <img src="../img/ico/nomap.png" id="img-card">
                            
                            <?php
                                }
                            ?>
                        </div>
                        <div class="input-text-endereco">
                            <div class="box-input-endereco">
                                <input onkeypress="return validar(event,'number','nome')"
                                       type="text"
                                       name="text-endereco"
                                       id="endereco"
                                       style="width:250px;"
                                       class="input-cms-promo"
                                       value="<?php echo($endereco)?>"
                                       placeholder="Digite o endereço"
                                       >
                            </div>
                            <div class="box-input-numero">
                                <input onkeypress="return validar(event,'number','nome')"
                                       type="number"
                                       name="text-numero"
                                       id="numero"
                                       class="input-cms-promo"
                                       style="width:40px;"
                                       value="<?php echo($numero)?>"
                                       maxlength="4"
                                       placeholder="N°"
                                       >

                            </div>
                        </div>
                        <div class="input-text-cms">
                            <div class="box-input-promo">
                                <input onkeypress="return validar(event,'number','nome')"
                                       type="text"
                                       name="text-bairro"
                                       id="bairro"
                                       class="input-cms-promo"
                                       value="<?php echo($bairro)?>"
                                       maxlength="25"
                                       placeholder="Digite o nome do bairro"
                                       >

                            </div>
                        </div>
                        <div class="input-text-cms">
                            <div class="box-input-promo">
                                <input onkeypress="return validar(event,'number','nome')"
                                       type="text"
                                       name="text-cidade"
                                       id="cidade"
                                       class="input-cms-promo"
                                       value="<?php echo($cidade)?>"
                                       maxlength="25"
                                       placeholder="Digite o nome da cidade"
                                       >

                            </div>
                        </div>
                        <div>
                            <textarea name="text-conteudo" placeholder="Telefone, horários do espediente nos dias ulteis e feriados " maxlength="200"><?php echo($conteudo);?></textarea>

                        </div>
                        <div class="input-text-cms">
                            <div class="box-rdo" style="width:90px;">
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
                <div class="conteudo-tbl-lojas">
                    <div id="tbl-promocoes">
                        <div class="cabecalho">
                            <div class="titulos-promo" style="width:35px;">
                                <p>
                                    N°
                                </p>
                                
                            </div>
                            <div class="titulos-promo" style="width:285px;">
                                <p>
                                    Endereço
                                </p>
                                
                            </div><div class="titulos-promo" style="width:196px;">
                                <p>
                                    Bairro
                                </p>
                                
                            </div>
                            <div class="titulos-promo" style="width:170px;">
                                <p>
                                    Cidade
                                </p>
                                
                            </div>
                            <div class="titulos-promo" style="width:150px;">
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
                            $sql = "SELECT * FROM tbl_lojas ORDER BY codigo DESC";           
                            
                            $select = mysqli_query($conexao, $sql);

                            while($rscontatos=mysqli_fetch_array($select)){
                                
                        ?>
                        <div class="tbl-dados-db">
                            <div class="campos-tbl-promo" style="width:35px;">
                                <?php echo($rscontatos['numero'])?>
                                
                            </div>
                            <div class="campos-tbl-promo" style="width:285px;">
                                <?php echo($rscontatos['endereco'])?>
                                
                            </div>
                            <div class="campos-tbl-promo" style="width:196px;">
                                <?php echo($rscontatos['bairro'])?>
                                
                            </div>
                            <div class="campos-tbl-promo" style="width:170px;">
                                <?php 
                                    echo($rscontatos['cidade']);
                                ?>
                                
                            </div>
                            <div class="campos-tbl-promo" style="width:150px;">
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
                                    <a href= "cms-lojas.php?modo=excluir&id=<?php echo($rscontatos['codigo']);?>" onclick="return confirm('Deseja realmente excluir?');">

                                        <input type="image"
                                               src="../img/excluir.png"
                                               width="24px"
                                               height="24px"
                                               class="img center"
                                               style="margin-top:2px;">
                                        
                                    </a>
                                </div>
                                <div class="opcoes-promo">
                                    <a href="cms-lojas.php?modo=consultar&id=<?php echo($rscontatos['codigo']);?>">
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