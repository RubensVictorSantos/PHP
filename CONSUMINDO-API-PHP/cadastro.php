<?php
    
    
    $nome =null;
    $email = null;
    $endereco = null;
    $telefone = null;
    $linkedin = null;
    $foto = null;

    $nome = $_POST['txt_nome'];
    $email = $_POST['txt_email'];
    $endereco = $_POST['txt_endereco'];
    $telefone = $_POST['txt_telefone'];
    $linkedin = $_POST['txt_linkedin'];
    $foto = $_POST['txt_foto'];
    $contato_array = null;
    
    $contato_array = array("nome"->$nome,
                           "endereco"->$endereco,
                           "email"->$endereco,
                           "telefone"->$telefone,
                           "linkedin"->$linkedin,
                           "foto"->$foto
                          );

    //var_dump($contato_array);
    
    // CONVERTER A ARRAY EM JSON
    $contato_json = json_encode($contato_array);
    
    // DEFINIR A URL DA API QUE SERÁ UTILIZADA 
    $url = "http://localhost:8080/contato";
    
    // ABRIR A CONEXÃO PARA A API
    $con = curl_init($url);

    // DEFINIR O METODO DA REPOSIÇÃO HTTP PARA POST
    curl_setopt($con, CURLOPT_CUSTOMREQUEST, "POST");


    // DEFINIR O CONTEÚDO NO BODY DA MENSAGEM
    curl_setopt($con, CURLOPT_POSTFIELDS, $contato_json);

    // DEFINIR SE ACEITAMOS RETORNO
    curl_setopt($con, CURLOPT_RETURNTRANSFER, true);

    // DEFINIR ALGUNS HEADERS NECESSARIOS
    curl_setopt($con, CURLOPT_HTTPHEADER, 
                array('Content-Type: application/json',
                     'Content-Length:'. strlen($contato_json)
                     )
               );
    curl_exec($con);

?>

<a href="index.php">voltar</a>