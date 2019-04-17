<?php
    
    $nome = "";
    

    $server = "localhost";
    $database = "dbcontato";
    $user = "root";
//    $password = "bcd127";
    $password = "binho250398";
//    $id = (int) "";
    
    $conexao = mysqli_connect($server, $user, $password, $database);
    $rs = null;
    
    $id = $_GET['id'];

    if(isset($_GET['modo'])){
        
        
        
        if($_GET['modo'] == 'excluir'){
            
            $id = $_GET['id'];
            $nomefoto = $_GET['nomefoto'];
            
            $sql = "DELETE FROM tblfotos WHERE codigo=".$id;
            mysqli_query($conexao, $sql);
            
            //Unlink apaga um arquivo
            unlink($nomefoto);
            
            
            header('location:index.php');
            
            
        }elseif($_GET['modo'] == 'consultar'){
            
            $sql = "SELECT * FROM tblfotos WHERE codigo =".$id;
            
            echo($sql);
            
            $select = mysqli_query($conexao, $sql);
            
            if($rs = mysqli_fetch_array($select)){
                
                $nome = $rs['nome'];
                $nomefoto = $rs['foto'];
                
                
                
                header('location:index.php');
            }
        }
    }

    if(isset($_POST['btnsalvar'])){
        
        $nome = $_POST['txtnome'];
        
        //Arquivos permitidos no upload de imagens
        $arquivos_permitidos = array(".jpg",".jpeg",".png");
        
        //Diretorio que será enviado os arquivos;
        $diretorio = "arquivos/";
        
        //Guarda o nome do arquivo a ser upado para o servidor
        $arquivo = $_FILES['flefotos']['name'];
        
        //Guarda o tamanho do arquivo
        $tamanho_arquivo = $_FILES['flefotos']['size'];
        
        //A divisão de 1024 Converte a unidade de medida de bytes para kbites
        //round permite trazer apenas a parte internma do valor
        $tamanho_arquivo = round($tamanho_arquivo/1024);
        
        //Variável q guarda a extensão
        //Retorna a extensão do arquivo (busca a string de trás para frente)
        $extensao_arquivos = strrchr($arquivo,".");
        
        
        //Retorna somente o nome do arquivo
        // PATHINFO_DIRNAME
        // PATHINFO_BASENAME
        // PATHINFO_EXTENSION
        $nome_arquivo = pathinfo($arquivo, PATHINFO_FILENAME);
        
        /*
            Funções nativas do php para realizar criptografia de dados:

            md5(); -> 64 caractere
            sha1(); -> 128 caractere
            *Usar para salvar senha no banco
            
            
            base64(); -> 8 caractere
        
        */
        /*
            Usamos o md5 para criptografar o nome do arquivo, alem de gerar um ID 
        unico que nunca irá se repetir(uniqid e usamos a função time())
        
        */
        
        $nome_arquivo_cryt = md5(uniqid(time()).$nome_arquivo);
        
        if(in_array($extensao_arquivos, $arquivos_permitidos)){
            
            
            //Validação para tamanho de arquivos
            if($tamanho_arquivo<=5000){
                
                //local q a img foi guardada pelo post do form
                $arquivo_tmp = $_FILES['flefotos']['tmp_name'];
                
                //Criamos o novo nome do arquivo com a sua extensão
                $foto = $diretorio . $nome_arquivo_cryt . $extensao_arquivos;
                
                if(move_uploaded_file($arquivo_tmp, $foto)){
                    
                    $sql = "INSERT INTO tblfotos(nome, foto)values('".$nome."','".$foto."')";
                    
                    mysqli_query($conexao, $sql);
                    
                    header("location:index.php");
                    
                    
                }else{
                    
                    echo("<script>alert('Erro ao enviar o arquivo para o servidor')</script>");
                    
                }
                
            }else{
                
                echo("<script>alert('Tamanho do arquivo invalido')</script>");    
                
            }
            
            
        }else{
            
            echo("<script>alert('Extensão Invalida!')</script>");
            
        }
        
        //echo($nome_arquivo_cryt);
    }

?>
<html>
    <head>
        <title>
        
        </title>
    </head>
    <body>
        
        <!-- 
            
            *Sempre usar post para upload de arquivos 

            *Alterar tamanho do arquivo:

            ; Maximum allowed size for uploaded files.
            ; http://php.net/upload-max-filesize
            upload_max_filesize=10M

            *Para recuperar o objeto q foi selecionado, utilizamos $_FILES ao invés de POST


        -->
        
        <form id="frmCadastro" name="frmCadastro" method="post" action="index.php" enctype="multipart/form-data">
        <div style="width:100px;height: 100px;">
            <label>Nome:</label>
            <input type="text" name="txtnome" value="<?php echo($nome);?>"><br><br>
            <input type="file" name="flefotos">
        </div>
        <div style="width:100px;height: 40px;">
            <input type="submit" value="salvar" name="btnsalvar">
        </div>
        </form>
        <?php
            if(isset($nomefoto)){
        ?>
        <div id="visualizar_foto" >
            <img src="<?php echo($nomefoto);?>" style="width:300px;height:300px;">
        </div>
        <?php
            }
        ?>
        
        <div>
            <table border="1px">
                <tr height="20px">
                    <td width="150px">
                        Nome
                    </td>
                    <td width="150px">
                        Foto
                    </td>
                </tr>
                
                <?php
                    $sql = "SELECT * FROM tblfotos";
                    $select = mysqli_query($conexao, $sql);
                
                    while($rs = mysqli_fetch_array($select)){
                    
                ?>
                
                <tr>
                    <td>
                        <?php echo($rs['nome'])?>
                    </td>
                    <td>
                        <img style="width:150px;height:100px;" src="<?php echo($rs['foto']);?>">
                    </td>
                    <td>
                        <a href="index.php?modo=excluir&id=<?php echo($rs['codigo']);?>&nomefoto=<?php echo($rs['foto']);?>">excluir</a>
                        
                        |
                        
                        <a href="index.php?modo=consultar&id=<?php echo($rs['codigo']);?>">editar</a>
                        
                    </td>
                </tr>
                <?php
                    }        
                ?>
            </table>
        </div>
    </body>
</html>