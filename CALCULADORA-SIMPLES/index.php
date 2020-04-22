<?php
    

    /*
    $valor1 = (int) "45";
    $valor2 = null;
    
    var_dump($valor1);
    
    + gettype - identifica o tipo de dados da variaval echo(gettype($valor1));
    + settype - converte o tipo de dados de uma variável settype($valor1, 'int'));
    + strtoupper - converte a string p/ maiuculo;
    + strtolower - minusculo;
    
    */

    $valor1 = (float) null;
    $valor2 = (float) null;
    $resultado = (float) 0;
    $opcao = (string) null;
    $rdosomar = null;
    $rdosubtrair = null;
    $rdodividir = null;
    $rdomultiplicar = null;
    $erro = null;

    define("ERRO","Erro no calculo!");
    define("VAZIO","Erro de caixa vazia!");
    define("INVALIDO","Caracter invalido!");

    /*verifica se o botão foi clicado*/
    if(isset($_POST['btcalcular']))
    {
        


        $valor1= $_POST['txtval1'];
        $valor2= $_POST['txtval2'];

        if(!isset($_POST['radio'])){
            $erro = VAZIO;
        }

        $rdosomar = $_POST['radio'];
        $rdosubtrair = $_POST['radio'];
        $rdodividir = $_POST['radio'];
        $rdomultiplicar = $_POST['radio'];

        if((is_numeric($valor1) && is_numeric($valor2))){

        $opcao= $_POST['radio'];

            switch ($opcao){
                case 'som':
                    $resultado = $valor1 + $valor2;
                    $rdosomar = "checked";
                    break;

                case 'sub':
                    $resultado = $valor1 - $valor2;
                    $rdosubtrair = "checked";
                    break;

                case 'div':
                    if($valor2 == 0){
                        $erro = ERRO;
                        $rdodividir = "checked";
                    }else{
                        $resultado = $valor1 / $valor2;
                        $rdodividir = "checked";
                    }
                    break;

                case 'mul':
                    $resultado = $valor1 * $valor2;
                    $rdomultiplicar = "checked";
                    break;
                
                default:
                    $erro = VAZIO;

            }
        }else{

            $erro = INVALIDO;

        }
    }
?>
<html>
	<head>
        <meta charset="utf-8">
		<title>Calculadora</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
        <script>
        
            function Validar(caracter)
            {
                //verifica em qual padrão de navegador o caracter está sendo enviado, se for pelo padrão event então utilizamos charCode do contrario utilizamos whitc
                if(window.event){   
                    //Transforma em ascii
                    var letra = caracter.charCode;

                }else{
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
        <div class="box-main">
		    <div id="box-calc">

                <div class="titulo">
                    <h2>Calculadora Simples</h2>
                </div>
                <div class="resto">
                    <div id="caixa-valores">
                        <form name="frmmedia" method="POST" action="index.php">
                            <div id="caixa-texto">
                                <label>Varlor 1: </label><input type="text" name="txtval1" value="<?php echo($valor1)?>" class="input" placeholder="Digite um número" required>
                                <label>Varlor 2: </label><input type="text" name="txtval2" value="<?php echo($valor2)?>" class="input" placeholder="Digite um número" required>
                            </div>
                            <div id="caixa-radio">
                                <div class="div-rdo"><input id="rdosomar" type="radio" name="radio" value="som" <?php echo($rdosomar)?> checked><label for="rdosomar"> Somar</label></div>
                                
                                <div class="div-rdo"><input id="rdosubtrair" type="radio" name="radio" value="sub" <?php echo($rdosubtrair)?>><label for="rdosubtrair"> Subtrair</label></div>
                                
                                <div class="div-rdo"><input id="rdomultiplicar" type="radio" name="radio" value="mul" <?php echo($rdomultiplicar)?>><label for="rdomultiplicar"> Multiplicar</label></div>
                                
                                <div class="div-rdo"><input id="rdodividir" type="radio" name="radio" value="div" <?php echo($rdodividir)?>><label for="rdodividir"> Dividir</label></div>
                            </div>
                            <div id="caixa-alert" name="caixa-alert" >
                                <p class="box-err"><?php echo $erro;?></p>
                            </div>
                            <div id="caixa-botao">
                                <input type="submit" id="btncal" name="btcalcular" value="Calcular" >
                            </div>
                        </form>
                    </div>
                    <div id="saida">
                        <div id="titulo-resultado">
                            <h3>Resultado</h3>
                        </div>
                        <div id="caixa-resultado"><!--Caixa Resultado-->
                            <p>
                                <?php echo $resultado; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</body>
</html>
