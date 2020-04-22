<?php

    include_once('modulo.php');
    
    $txt_num_ini = null;
    $txt_num_fin = null;
    $vazio_err = false;
    $invalido_err = false;
    $impar_par = null;

    define("CAIXA_VAZIA","Preencha todos os campos!");
    define("VALOR_INVALIDO","Valor inicial não pode ser maior ou igual ao valor final!");
    
    if(isset($_POST['btn_calc'])){
        
        $txt_num_ini = $_POST['select_ini'];
        $txt_num_fin = $_POST['select_fin'];
        
        if($txt_num_ini == null || empty($txt_num_fin)){
            
            $vazio_err = true;
            
        }elseif($txt_num_ini > $txt_num_fin || $txt_num_ini == $txt_num_fin){
            $invalido_err = true;
        
        }else{
            
            $impar_par = verifica_ImPar($txt_num_ini, $txt_num_fin);
        }
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>
            Pares e Impares
        </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script></script>
    </head>
    <body>
        <div class="main">  
            <div id="caixa-principal">
                <div class="box-menu">
                    <?php
                        include('menu.php');
                    ?>
                </div>
                <div class="box-painel">
                    <div id="caixa-alert">
                        <?php 
                        
                            if($vazio_err){
                                
                                echo(CAIXA_VAZIA);
                                
                            }elseif($invalido_err){
                                
                                echo(VALOR_INVALIDO);
                            }
                        
                        ?>
                    </div>
                    <div>
                        <form name="frmImPar" method="post" action="ImPar.php">
                            <div id="caixa-valores">

                                <div id="caixa-labels">
                                    <div class="label">
                                        <p>
                                            N° Inicial
                                        </p>
                                    </div>
                                    <div class="label">
                                        <p>
                                            N° Final
                                        </p>
                                    </div>
                                </div>
                                <div id="caixa-text">
                                    <select name="select_ini">
                                        <option value="">Por favor selecione um número</option>
                                        <?php echo(preen_select(0, 500));?>
                                    </select><br>
                                    <select name="select_fin">
                                        <option value="">Por favor selecione um número</option>
                                        <?php echo(preen_select(100, 1000));?>
                                    </select>
                                </div>
                                <div id="caixa-botao">
                                    <input type="submit" id="btnCalc" name="btn_calc" value="CALCULAR">

                                </div>
                            </div>
                            <div id="saida">
                                <div id="titulo_Par">
                                    
                                    </div>
                                <div class="caixa_resultado_parImpar">
                                    <p>
                                        <?php 
                                            if($vazio_err == false || $invalido_err == false){ 
                                                
                                                echo($impar_par[0]);
                                                
                                            }
                                        ?>
                                    </p>
                                </div>
                                <div id="titulo_impar">
                                    
                                </div>
                                <div class="caixa_resultado_parImpar">
                                    <p>
                                        <?php 
                                            if($vazio_err == false || $invalido_err == false){
                                                echo($impar_par[1]);
                                                
                                            }
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <div id="quantidade">
                                <div id="qtd_par">
                                    Qtd Par <?php 

                                    if($vazio_err == false || $invalido_err == false){
                                        echo($impar_par[2]);
                                    }
                                    ?>
                                </div>
                                <div id="qtd_impar">
                                    Qtd Impar <?php 

                                    if($vazio_err == false || $invalido_err == false){
                                        echo($impar_par[3]);

                                    }

                                    ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>