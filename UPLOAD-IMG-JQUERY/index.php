<?php
    
    session_start();
    $nome = "";
    $botao= "salvar";

    $server = "localhost";
    $database = "dbcontatos";
    $user = "root";
    $password = "bcd127";
    $id = null;
    $conexao = mysqli_connect($server, $user, $password, $database);
    $rs = null;
    
    if(isset($_GET['modo'])){
        
        $id = $_GET['id'];
        
        if($_GET['modo'] == 'excluir'){
            
            $nomefoto = $_GET['nomefoto'];
            
            $sql = "DELETE FROM tblfotos WHERE codigo=".$id;
            mysqli_query($conexao, $sql);
            
            unlink($nomefoto);
            
            header('location:index.php');
            
        }elseif($_GET['modo'] == 'consultar'){
            
            $sql = "SELECT * FROM tblfotos WHERE codigo =".$id;
            $select = mysqli_query($conexao, $sql);
            
            if($rs = mysqli_fetch_array($select)){
                
                $nome = $rs['nome'];
                $nomefoto = $rs['foto'];
                $botao = 'editar';
                $_SESSION['id'] = $id;
                $_SESSION['nomefoto'] = $nomefoto;
                
            }
        }
    }

    if(isset($_POST['btnSalvar'])){
        
        $nome = $_POST['txtnome'];
//        $foto = $_SESSION['path_foto'];
        $foto = "";
        
        if(isset($_SESSION['path_foto'])){
            $foto = $_SESSION['path_foto'];
        }
            
        if($_POST['btnSalvar']=='salvar'){
        
            $sql = "INSERT INTO tblfotos(nome, foto)values('".$nome."','".$foto."')";

            mysqli_query($conexao, $sql);

        }elseif($_POST['btnSalvar']=='editar'){
            
            if(isset($_SESSION['path_foto']) && $_SESSION['path_foto']!=null){
                
                $sql = "update tblfotos set nome = '".$nome."', foto ='".$foto."'
                where codigo =".$_SESSION['id'];

                if(mysqli_query($conexao, $sql)){
                    unlink($_SESSION['nomefoto']);
                    $_SESSION['path_foto'] = null;
                    $_SESSION['nomefoto'] = null;

                }
            }else{
                
                echo("Update sem a foto!");
            }
            
            header("location:index.php");
        }

        header("location:index.php");

        
    }

?>
<html>
    <head>
        <title>
            Upload Jquery
        </title>
        <!-- Sempre importar a biblioteca do jquery primeiro-->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.form.js"></script>
        
        <script>
            // Importante!
            $(document).ready(function(){
                // Quando ouver uma mudança no estado do file
                // No evento live q signfica alteração de estado de um elento,
                // usamos o atributo change, q significa quando o elemento for alterado
                // (ele mudar o estado de null p preenchimento com um arquivo)
                $('#filefotos').live('change', function(){
                    
                    // Forçando um submit do formulario da foto
                    $('#fotos').ajaxForm({
                        
                        // Retorno(Esta indo para a div)
                        target: '#visualizar_foto'
                        
                    }).submit();
                    
                });
                
            });
            
            
        
        </script>
    </head>
    <body>
        
        <form id="frmCadastro" name="frmCadastro" method="post" action="index.php">
        <div style="width:100px;height: 100px;">
            <label>Nome:</label>
            <input type="text" name="txtnome" value="<?php echo($nome);?>"><br><br>
            
        </div>
        <div style="width:100px;height: 40px;">
            <input type="submit" value="<?php echo($botao);?>" name="btnSalvar">
        </div>
        </form>
        
        <!-- Para usar o Jquery p fazer upload precisamos de um form individual-->
        <form id="fotos" name="frmFotos" method="post" action="upload.php" enctype="multipart/form-data">
            
            <input type="file" id="filefotos" name="flefotos">
            
        </form>
        
        
        <div id="visualizar_foto" >
            <?php
                if(isset($nomefoto)){
            ?>
            <img src="<?php echo($nomefoto);?>" style="width:300px;height:300px;">
            
            <?php
                }
            ?>
        </div>
        
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
                        <a href="index.php?modo=excluir&id=<?php echo($rs['codigo']);?>&nomefoto=<?php echo($rs['foto']);?>">excluir</a>|
                        <a href="index.php?modo=consultar&id=<?php echo($rs['codigo']);?>">Editar</a>
                        
                    </td>
                </tr>
                <?php
                    }        
                ?>
            </table>
        </div>
    </body>
</html>