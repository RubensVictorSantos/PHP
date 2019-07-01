<?php

function connect(){
    
    $conexao = null;
    $server = 'localhost';
    $user = 'root';
    $password = 'binho250398';
    $database = 'db_umterafilmes';
    
    $conexao = mysqli_connect($server,$user,$password, $database);

        if (!$conexao) {
            echo "Error: Unable to connect to MySQL." .PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }

        return $conexao;
    }

?>