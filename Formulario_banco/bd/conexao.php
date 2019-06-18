<?php

function conexaoMysql(){
    
    $conexao = null;
    $server = "localhost";
    $user = "root";
    $password = "binho250398";
<<<<<<< HEAD
//<<<<<<< HEAD
//    $database = "db_formulario";
//=======
    $database = "db_bicicleta";
//>>>>>>> 58562b25220c2e2810a41e100a7f6f2fde9efae9
=======
    $database = "db_bicicleta";
>>>>>>> 17de3d8cbcbdd118d2faf6fccf9c47a684038621

    $conexao = mysqli_connect($server, $user, $password, $database);

    return $conexao;
    
    }

?>