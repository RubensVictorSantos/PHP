<?php

    include_once('../../modulo.php');

    $valor1 = (float) null;
    $valor2 = (float) null;
    $resultado = (float) 0;
    $opcao = (string) null;
    $rdosomar = null;
    $rdodividir = null;
    $rdomultiplicar = null;
    $rdosubtrair = null;
    $invalido_err = false;
    $vazio_err = false;
    $calc_err = false;
    
    define("ERRO","Erro no calculo!");
    define("VAZIO","Erro de caixa vazia!");
    define("INVALIDO","Caracter invalido!");

    if(isset($_POST['btcalcular']))
    {
        
        $valor1= $_POST['txtval1'];
        $valor2= $_POST['txtval2'];
        
        if(empty($valor1) || empty($valor2) || !isset($_POST['radio'])){
            
           $vazio_err = true;
             
        }else{
            
            $rdosomar = $_POST['radio'];
            $rdosubtrair = $_POST['radio'];
            $rdodividir = $_POST['radio'];
            $rdomultiplicar = $_POST['radio'];
            $opcao= $_POST['radio'];
            
            if((is_numeric($valor1) && is_numeric($valor2))){
                    
                    $resultado = Calcular($valor1, $valor2, $opcao);
                
            }else{
                
                $invalido_err = true;
                
            }
        }
    }
?>
<html>
	<head>
        <meta charset="utf-8">
		<title>Calculadora</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
        
        <script>
        
            function Validar(caracter)
            {
                if(window.event)
                {    
                    var letra = caracter.charCode;
                    
                }else{
                    var letra = caracter.which;
                    
                }
                
                if(letra < 48 || letra >57){
                    
                    if(letra != 46){
                        return false;
                        
                    }
                }
            }
            
        </script>
        
	</head>
	<body>
		<div id="caixa-principal">
            <div id="caixa_menu">
                    <div id="caixa_icone">
                        <div id="icone">

                        </div>
                        <div class="menu">
                            <div class="itens_menu">
                                <a href="../../MEDIA/media.php">Média</a>
                            </div>
                            <div id="sub_menu" class="itens_menu">
                                Calculadora
                                <div id="menu2">
                                    <div class="itens_menu">
                                        <a href="calculadora.php">Function</a>
                                    </div>
                                    <div class="itens_menu">
                                        <a href="IF/calculadora.php">If</a>
                                    </div>
                                    <div class="itens_menu">
                                        <a href="SWITCH/calculadora.php">Switch</a>
                                    </div>
                                </div>
                            </div>
                            <div class="itens_menu">
                                <a href="../../tabuada.php">Tabuada</a>
                            </div>
                            <div class="itens_menu">
                                <a href="../../ImPar.php">Pares e impares</a>
                            </div>
                        </div>
                    </div>
                    <div id="titulo">
                        <strong>
                            CALCULADORA SIMPLES
                        </strong>

                    </div>
                </div>
			<div id="caixa-valores">
                <form name="frmmedia" method="POST" action="calculadora.php">
                    <div>
                        <div id="caixa_alert" name="caixa-alert">
                            <?php 

                                if($vazio_err){
                                    echo VAZIO;

                                }elseif($invalido_err){
                                    echo INVALIDO;

                                }elseif($calc_err){
                                    echo ERRO;

                                }
                            ?>
                        </div>
                        <div id="caixa-valores">
                            <div id="caixa-texto">
                                Varlor 1: <input type="text" name="txtval1" onkeypress="return Validar(event);" value="<?php echo($valor1)?>" class="input" ><br>
                                Varlor 2: <input type="text" name="txtval2" onkeypress="return Validar(event);" value="<?php echo($valor2)?>" class="input" >
                            </div>
                            <div id="caixa-radio">
                                <input type="radio" name="radio" value="som" <?php echo($rdosomar)?>> Somar<br>

                                <input type="radio" name="radio" value="sub" <?php echo($rdosubtrair)?>> Subtrair<br>

                                <input type="radio" name="radio" value="mul" <?php echo($rdomultiplicar)?>> Multiplicar<br>

                                <input type="radio" name="radio" value="div" <?php echo($rdodividir)?>> Dividir
                            </div>
                            <div id="caixa-botao">
                                <input type="submit" id="btncal" name="btcalcular" value="Calcular" >
                            </div>
                        </div>
                    </div>
                    <div id="saida">
                        <div id="caixa-resultuado" class="center">
                            <p>
                                <?php echo($resultado); ?>
                                
                            </p>
                        </div>
                    </div>
                </form>
			</div>
		</div>
	</body>
</html>