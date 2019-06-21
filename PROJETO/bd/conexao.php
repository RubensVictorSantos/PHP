<?php

function conexaoMysql(){
    
    $conexao = null;
    $server = "localhost";
    $user = "root";
    $password = "binho250398";
//    $password = "bcd127";
    $database = "db_site";

    $conexao = mysqli_connect($server, $user, $password, $database);
    
    /* change character set to utf8 */
    
//        if (!mysqli_set_charset($conexao, "utf8")) {
//            printf("Error loading character set utf8: %s\n", mysqli_error($conexao));
//            exit();
//        } else {
//            printf("Current character set: %s\n", mysqli_character_set_name($conexao));
//        }
    
        return $conexao;
    
    }

?>