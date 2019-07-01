<!DOCTYPE html>
<?php

    require_once('db/conexao.php');
//    require_once('upload.php');
    
    if(!isset($_SESSION)){
        session_start();
        
    }else{
        
        echo("<script>alert('Existe Valiavel de Sessão')</script>");
    }
    
    $titulo = null;
    $descricao = null;
    $sql = null;
    $select = null;


    $conexao = connect();
    //echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
    //echo "Host information: " . mysqli_get_host_info($conexao) . PHP_EOL;

//    mysqli_close($conexao);
    
    //var_dump($conexao);
    if(isset($_POST['btnsalvar'])){
        
        $titulo = $_POST['txttitulo'];
        $descricao = $_POST['txtdescricao'];
        $foto = null;
        
        if(isset($_SESSION['path_foto'])){
            $foto = $_SESSION['path_foto'];
            echo("<script>alert('EXITE')</script>");
        }else{
            
            echo("<script>alert('NÃO EXITE')</script>");
        }
        
        $sql = "INSERT INTO tbl_filme(titulo, descricao, imagem) VALUES('".$titulo."','".$descricao."','".$foto."')";
        
        echo("<script>alert('FOTO: ".$foto."')</script>");
        if(mysqli_query($conexao,$sql)){
            
        }
        
//        header('location:cms.php');
        
    }else{
        
//        echo('<script>alert("não entro no if")</script>');
    }
        
    
?>


<html lang="pt-br">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0,charset=utf-8">
        <title>
            cms-improvisado
        </title>
    </head>
    <body>
        <div class="">
            <h1>Cadastrar filme</h1>
            <form id="fotos" name="frmFotos" method="POST" action="upload.php" enctype="multipart/form-data">

                <div class="input-text-cms">
                    <div id="box-file">
                        <input type="file"
                               id="filefoto"
                               name="flefoto"
                               requered>
                    </div>

                </div>

            </form>
            
            <form name="frmcms" method="post" id="frmcms" action="cms.php">
                
                <input type="text"
                       name="txttitulo"
                       id="txttitulo"><br><br>
                
                <input type="text"
                       name="txtdescricao"
                       id="txtdescricao">

                <input type="submit" 
                       name="btnsalvar" 
                       id='btnsalvar' 
                       value="salvar">
            </form>
        </div>
    </body>
</html>