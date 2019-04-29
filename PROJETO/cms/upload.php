<?php

    // Valida se os dados enviados para esse arquivo serão do tipo post
    if(isset($_POST)){
        
        if(!empty($_FILES['flefoto']['name'])){
        
            $arquivos_permitidos = array(".jpg",".jpeg",".png");
       
            $diretorio = "arquivos/";

            $arquivo = $_FILES['flefoto']['name'];
           
            $tamanho_arquivo = $_FILES['flefoto']['size'];
            
            $tamanho_arquivo = round($tamanho_arquivo/1024);
            
            $extensao_arquivos = strrchr($arquivo,".");

            $nome_arquivo = pathinfo($arquivo, PATHINFO_FILENAME);

            $nome_arquivo_cryt = md5(uniqid(time()).$nome_arquivo);

            if(in_array($extensao_arquivos, $arquivos_permitidos)){

                if($tamanho_arquivo<=5000){

                    $arquivo_tmp = $_FILES['flefoto']['tmp_name'];

                    $foto = $diretorio . $nome_arquivo_cryt . $extensao_arquivos;

                    if(move_uploaded_file($arquivo_tmp, $foto)){
                        
                        echo("<img src='".$foto."' id='img-card'>");
                        
                        session_start();
                        $_SESSION['path_foto'] = $foto;

                    }else{

                        echo("<script>alert('Erro ao enviar o arquivo para o servidor')</script>");

                    }
                }else{

                    echo("<script>alert('Tamanho do arquivo invalido')</script>");    
                }

            }else{

                echo("<script>alert('Extensão Invalida!')</script>");

            }
        }
    }
?>