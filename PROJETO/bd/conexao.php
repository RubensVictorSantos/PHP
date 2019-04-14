<?php

function conexaoMysql(){
    
    $conexao = null;
    $server = "localhost";
    $user = "root";
    $password = "binho250398";
//    $password = "bcd127";
    $database = "db_bicicleta";

    $conexao = mysqli_connect($server, $user, $password, $database);
    
//        if (!$conexao) {
//
//             die("Connection failed: " . mysqli_connect_error());
//
//        }else{

//            mysqli_close($conexao);
//            return $conexao;
//        }
    
        return $conexao;
    
    }

?>