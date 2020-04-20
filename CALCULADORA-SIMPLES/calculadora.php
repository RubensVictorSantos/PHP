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

    $valor1 = null;
    $valor2 =   null;
    $resultado = (float) 0;
    $opcao = (string) null;
    $rdosomar = null;
    $rdosubtrair = null;
    $rdodividir = null;
    $rdomultiplicar = null;
    $erro = null;

    define("ERRO","Erro no calculo!");
    define("VAZIO","Erro de caixa vazia!");
   /* define("LIMPAR"){
        
    }*/
    
    /*verifica se o botão foi clicado*/
    if(isset($_POST['btcalcular']))
    {
        
        $valor1= $_POST['txtval1'];
        $valor2= $_POST['txtval2'];
        $rdosomar = $_POST['radio'];
        $rdosubtrair = $_POST['radio'];
        $rdodividir = $_POST['radio'];
        $rdomultiplicar = $_POST['radio'];
        

        /*Radio retorna um valor booleano por isso q não precisamos especificar if($v1 == true)*/
        if($valor1 == null || $valor2 == null || !isset($_POST['radio'])){
            
           echo VAZIO ;
        
        }else{
            
            $opcao= $_POST['radio'];

            if($opcao == 'som'){

                $resultado = $valor1 + $valor2;
                $rdosomar = "checked";
                
            }elseif($opcao == 'sub'){
                
                $resultado = $valor1 - $valor2;
                $rdosubtrair = "checked";
                    
            }elseif($opcao == 'div'){
                if($valor2==0){
                    
                    echo(ERRO);
                    $rdodividir = "checked";
                        
                }else{
                    $resultado = $valor1 / $valor2;
                }
            }elseif($opcao == 'mul'){

                $resultado = $valor1 * $valor2;
                $rdomultiplicar = "checked";
            }
        }
    }
?>
<html>
	<head>
        <meta charset="utf-8">
		<title>Calculadora</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
        <div class="box-main">
		    <div id="box-calc">

                <div class="titulo">
                    <h2>Calculadora Simples</h2>
                </div>
                <div class="resto">
                    <div id="caixa-valores">
                        <form name="frmmedia" method="POST" action="calculadora.php">
                            <div id="caixa-texto">
                                Varlor 1: <input type="text" name="txtval1" value="<?php echo($valor1)?>" class="input" ><br>
                                Varlor 2: <input type="text" name="txtval2" value="<?php echo($valor2)?>" class="input" >
                            </div>
                            <div id="caixa-radio">
                                <input type="radio" name="radio" value="som" <?php echo($rdosomar)?>> Somar<br>
                                
                                <input type="radio" name="radio" value="sub" <?php echo($rdosubtrair)?>> Subtrair<br>
                                
                                <input type="radio" name="radio" value="mul" <?php echo($rdomultiplicar)?>> Multiplicar<br>
                                
                                <input type="radio" name="radio" value="div" <?php echo($rdodividir)?>> Dividir
                            </div>
                            <div id="caixa-alert" name="caixa-alert" >
                                <?php 
                                    #echo VAZIO;
                                ?>
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
                                <?php echo($resultado); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</body>
</html>
