<?php
    

    include_once('../modulo.php');

    $media = null;
    $erro = null;
    $nota1 = null;
    $nota2 = null;
    $nota3 = null;
    $nota4 = null;
    
	if(isset($_GET['btncalc']))
	{
        
        $nota1=$_GET['txtn1'];
		$nota2=$_GET['txtn2'];
		$nota3=$_GET['txtn3'];
		$nota4=$_GET['txtn4'];
        
        if(empty($nota1) || empty($nota2) ||empty($nota3) || empty($nota4)){
            
            $erro = "<span class='erro'> Preencha todos os campos</span>";
        }else if(!is_numeric($nota1)|| !is_numeric($nota2)|| !is_numeric($nota3)|| !is_numeric($nota4)){
            
            $erro = "<span class='erro'>Digite somente números</span>";
            
        }else{
            
            $media = calc_media($nota1, $nota2, $nota3, $nota4);
        }  
    }   
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>
            Média
        </title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
	<body>
        <div id="caixa-principal">
            <div id="caixa_menu">
                <div id="caixa_icone">
                    <div id="icone">

                    </div>
                    <div class="menu">
                        <div class="itens_menu">
                            <a href="media.php">Média</a>
                        </div>
                        <div id="sub_menu" class="itens_menu">
                            Calculadora
                            <div id="menu2">
                                <div class="itens_menu">
                                    <a href="../CALCULADORA/FUNCTION/calculadora.php">Function</a>
                                </div>
                                <div class="itens_menu">
                                    <a href="../CALCULADORA/FUNCTION/calculadora.php">If</a>
                                </div>
                                <div class="itens_menu">
                                    <a href="../CALCULADORA/FUNCTION/calculadora.php">Switch</a>
                                </div>
                            </div>
                        </div>
                        <div class="itens_menu">
                            <a href="../tabuada.php">Tabuada</a>
                        </div>
                        <div class="itens_menu">
                            <a href="../ImPar.php">Pares e impares</a>
                        </div>
                    </div>
                </div>
                <div id="titulo">
                    <strong>
                        Calculo da Média
                    </strong>

                </div>
            </div>
            <form name="frmmedia" method="get" action="media.php">
                Digite a 1ª nota: <input type="text" name="txtn1" value="<?php echo($nota1); ?>" > <br>
                Digite a 2ª nota: <input type="text" name="txtn2" value="<?php echo($nota2); ?>" > <br>
                Digite a 3ª nota: <input type="text" name="txtn3" value="<?php echo($nota3); ?>" > <br>
                Digite a 4ª nota: <input type="text" name="txtn4" value="<?php echo($nota4); ?>" > <br>
                <input type="submit" name="btncalc" value ="Calcular" >
            </form>
        <div id="caixa_alert">
            A média é: <?php
            
            echo($media[0]); 
            
            ?> <br>
            O aluno esta:<?php echo($media[1]); ?><br>
            <?php echo($erro); ?>
            <br>

        </div>
        </div>
	</body>

</html>