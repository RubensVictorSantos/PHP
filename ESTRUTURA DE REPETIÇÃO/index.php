<?php
    if(isset($_POST['btncalcular'])){
        
        $valor1 = $_POST['txtnumero'];
        
        echo("**** USANDO WHILE ****<br>");
        
        $cont = 0;
        $resultado = "";
        while($cont <= $valor1){
            
            //$resultado = $resultado .$cont ."<br>";
            $resultado .= $cont ."<br>";
            //$cont = $cont+1;
            $cont +=1;

        }
        echo("**** USANDO FOR ****<br>");
        
         for($cont=0; $cont<=$valor1; $cont++){
            
            //$resultado = $resultado .$cont ."<br>";
            $resultado .= $cont ."<br>";
            //$cont = $cont+1;
        }
        
        echo($resultado);
    }

?>


<html>
    <head>
        <meta charset="utf-8">
        <title>
            ESTRUTURA DE REPETIÇÃO
        </title>
    </head>
    <body>
        <form name="frmrepeticao" method="post" action="index.php">
            <input type="text" name="txtnumero">
            <input type="submit" name="btncalcular" value="Calcular">
        
        </form>
    </body>
</html>

