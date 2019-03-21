<?php
    
    //**********FUNÇÕES TABUADA***********

    function tabuada($a, $b){
        
        $resultado = (string)null;
        
        for($cont=0; $cont<=$b; $cont++){    
            $resultado = $resultado .$a ." x " .$cont ." = " .$a * $cont ."<br>";
            
        }   
        return $resultado;
        
    }
    

    //**********FUNÇÕES PAR IMPAR***********

    function preen_select( int $ini, int $fin){
        
        $test = null;
        for($cont = $ini; $cont<=$fin; $cont++){

            $test = $test ."<option value=" .$cont .">" .$cont ."</option>";
        }
        return $test;
    }
    
    function verifica_ImPar($a, $b){
        
        $par = '';
        $impar = '';
        $contPar = 0;
        $contImpar = 0;
        
        for($cont = $a; $cont<= $b; $cont++){
            
            if($cont%2 == 0){
                $par .= $cont ."<br>";
                $contPar++;
            }else{
                
                $impar .= $cont ."<br>";
                $contImpar++;
            }
        }
        return array($par,$impar, $contPar, $contImpar);
    }
    
    //***********FUNÇÕES MÉDIA**************

    function calc_media($a, $b, $c, $d){
        
        $media = (int)null;
        $status = null;
        
        $media = ($a+$b+$c+$d)/4;
        
        if($media>7){
            
            $status = "<span style='color:#00ff00';>Aprovado!</span>";
        
        }else{
            $status = "<span style='color:#ff0000';>Reprovado!</span>";
        
        }
        
        return array($media,$status);
    }

        function Calcular($v1, $v2, $operacao)
    {

        global $rdosomar;
        global $rdomultiplicar;
        global $rdosubtrair;
        global $rdodividir;
        global $calc_err;

        $result = null;
        switch($operacao){

            case "som":
                $result = $v1 + $v2;
                $rdosomar = "checked";
                break;
            case "sub":
                $result = $v1 - $v2;
                $rdosubtrair = "checked";  
                break;
            case "mul":
                $result = $v1 * $v2;
                $rdomultiplicar = "checked";
                break;
            case "div":
                if($v2==0){

                    $calc_err = true;
                    $rdodividir = "checked";

                }else{
                    $result = $v1 / $v2;
                }
                break;
            default:
                //Somente será interpretado quando nenhum case for acionado
        }

        return $result;
    }
?>