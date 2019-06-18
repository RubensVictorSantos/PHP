<?php

    include_once('modulo.php');
    
    $txttab = (float)null;
    $txtcont = (float)null;
    $resultado = null;
    $invalido_err = false;
    $vazio_err = false;
    $calc_err = false;
    
    define("VAZIO","Erro de caixa vazia!");
    define("INVALIDO","Caracter invalido!");
    define("ZERO","Não existe tabuada do '0' zero!");

    if(isset($_POST['btn_calc'])){
        
        $txttab = $_POST['txt_tab'];
        $txtcont = $_POST['txt_cont'];
        
        if(empty($txttab)|| empty($txtcont)){
            
           $vazio_err = true;
            
        }elseif($txttab == 0){
            
            $calc_err = true;
            
        }else{
            if((is_numeric($txttab) && is_numeric($txtcont))){

                $resultado = tabuada($txttab, $txtcont);

            }else{
                
                $invalido_err = true;
                
            }
        }
    }
?>


<html>
    <head>
        <meta charset="utf-8">
        <title>
            Tabuada
        </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script>            
            function Validar(caracter)
            {
                //verifica em qual padrão de navegador o caracter está sendo enviado, se for pelo padrão event então utilizamos charCode do contrario utilizamos whitc
                if(window.event)
                {   
                    //Transforma em ascii 
                    var letra = caracter.charCode;   
                }else{
                    //Transforma em ascii
                    var letra = caracter.which;   
                }
                
                //verifica se o caracter digitado está entre 48 e 57, e corresponde aos numeros de 0 até 9
                if(letra < 48 || letra >57){
                    
                    if(letra != 46){
                        
                        //cancelando o evento Keypress
                        return false;
                    }
                }
            }
            
        </script>
    
    </head>
    <body>
        <div id=caixa-principal>
            <?php
                require_once('menu.php');
            
            ?>
            <form name="frmrepeticao" method="post" action="tabuada.php">

                <div>
                    <div id="caixa_alert">
                        <?php
                        if($vazio_err){
                            echo(VAZIO);
                            
                        }
                        if($invalido_err){
                            echo(INVALIDO);
                            
                        }
                        
                        if($calc_err){
                            echo(ZERO);
                            
                        }
                        ?>
                    </div>
                    <div id="caixa-valores">
                        <div id="caixa-labels">
                            <div class="label ">
                                TABUADA:
                            </div>
                            <div class="label ">
                                CONTADOR:
                            </div>
                        </div>
                        <div id="caixa-text">
                            <input type="text" name="txt_tab" onkeypress="return Validar(event);" value="<?php echo($txttab)?>" ><br>
                            <input type="text" name="txt_cont" onkeypress="return Validar(event);" value="<?php echo($txtcont)?>" >
                            
                        </div>
                        <div id="caixa-botao">
                            <input type="submit" id="btnCalc" name="btn_calc" value="CALCULAR">
                            
                        </div>
                    </div>
                    <div id="saida">
                        
                        
                        <div id="caixa-resultado" class="center">
                            <p>
                                
                                <?php echo($resultado); ?>
                            
                            </p>
                        </div>
                        
                    </div>
                </div>
                
            </form>
        </div>
    </body>
</html>