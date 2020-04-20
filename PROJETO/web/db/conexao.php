<?php



function conexaoMysql(){
    
    $con = null;
    $server = "localhost";
    $user = "root";
    $password = "Ladera*610892";
    $database = "db_site";

    $con = mysqli_connect($server, $user, $password, $database);
    
    /* Mudar conjunto de caracter para utf8 */
    
    if (!mysqli_set_charset($con, "utf8")) {
        
        mysqli_error($con);
        exit();

    } else {
        mysqli_character_set_name($con);

    }
    
    return $con;
}

function querySelect($query){

    $con = conexaoMysql();

    return mysqli_query($con, $query);
}

?>