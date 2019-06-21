<?php
    
    $url = "http://localhost:8080/contato";
    $dados_json = file_get_contents($url);
    $dados_array = json_decode($dados_json, true) ;
    //phpinfo();
//    print_r ($dados_json);
//    print_r ($dados_array);

?>


<!DOCTYPE html>
<html>
    <head>
        <title>
            Acessando API REST
        </title>
    </head>
    <body>
        <header>
        
        </header>
        <div>
            <h3>
                Lista de contatos
            </h3>
            <table>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>EMAIL</th>
                </tr>
                <?php
                    foreach($dados_array as $key => $contato){
                        
                        $id = $contato["id"];
                        $nome = $contato["nome"];
                        $email = $contato["email"];
//                        $id = $contato['id'];
                        echo("
                        
                            <tr>
                                
                                <td>$id</td>
                                <td>$nome</td>
                                <td>$email</td>
                                
                            </tr>
                        
                        ");
                        
                    }
                
                ?>
                <!-- -->
                <tr>
                    
                </tr>
            </table>
        </div>
    </body>
    
</html>