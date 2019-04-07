<?php

function conexaoMysql(){
    
    $conexao = null;
    $server = "localhost";
    $user = "root";
    $password = "binho250398";
//<<<<<<< HEAD
//    $database = "db_formulario";
//=======
    $database = "db_bicicleta";
//>>>>>>> 58562b25220c2e2810a41e100a7f6f2fde9efae9

    $conexao = mysqli_connect($server, $user, $password, $database);

    return $conexao;
    
    }

?>