<?php

function conexaoMysql(){
    
    $conexao = null;
    $server = "localhost";
    $user = "root";
    $password = "binho250398";
    $database = "db_bicicleta";

    $conexao = mysqli_connect($server, $user, $password, $database);

    return $conexao;
    
    }

?>