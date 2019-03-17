<?php
/*if(isset($_POST["btnsalvar"])){
        
        $nome = $_POST["txtnome"];
        $telefone = $_POST["txttelefone"];
        $celular = $_POST["txtcelular"];
        $email = $_POST["txtemai"];
        $home_page = $_POST["txthomepage"];
        $facebook = $_POST["txtfacebook"];
        $sugestao = $_POST["txtsugestao"];
        //$produto = $_POST[""]
        $sexo = $_POST["radio"];
        
        $data_nasc = explode("/", $_POST["txtdtnasc"]);
        $obs = $_POST["txtobs"];
        $dt_nasc = $data_nasc[2]."-".$data_nasc[1]."-".$data_nasc[0];
        
        //var_dump($data_nasc."<br>");
        //var_dump($dt_nasc."<br>");
        
        if($_POST['btnsalvar'] == 'salvar'){
        
            $sql = "INSERT INTO tblcontatos(nome, endereco, bairro, cep, telefone, celular, email, sexo, data_nasc, obs) VALUES ('".$nome."','".$endereco."','".$bairro."','".$cep."','".$telefone."','".$celular."','".$email."','".$sexo."','".$dt_nasc."','".$obs."')";

            /*echo($nome."<br>" 
                 .$endereco ."<br>" 
                 .$bairro ."<br>" 
                 .$cep."<br>" 
                 .$tel."<br>" 
                 .$cel."<br>"
                 .$email.$sexo."<br>"
                 .$data_nasc."<br>"
                 .$obs."<br>");*/
            //echo($sql);

        
        /*}elseif($_POST['btnsalvar'] == 'editar'){
            
            $sql = "UPDATE tblcontatos SET nome='".$nome."',
                                            endereco='".$endereco."',
                                            bairro='".$bairro."',
                                            cep='".$cep."',
                                            telefone='".$telefone."',
                                            celular='".$celular."',
                                            email='".$email."',
                                            sexo='".$sexo."',
                                            data_nasc='".$dt_nasc."',
                                            obs='".$obs."' 
                                            WHERE codigo = ".$_SESSION['idRegistro'];
                                            
            
        }
        
        /*echo($sql);*/
        /*if(mysqli_query($conexao, $sql)){
            //redireciona para uma nova pagina
            header("location:formulario_contatos.php");
        }else{
            
            echo("<script>alert('erro!')</script>");
            
        }
*/?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <tilulo>Fale conosco</tilulo>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <?php

            require_once('menu.php');
        ?>
        <div id="conteudo" class="center">
            <form name="frmfale-conosco" method="POST" action="fale-conosco.php">
                <div id="main-fale-conosco" class="center">
                    <div id="titulo-cadastro" class="center">
                        <h1>
                            CADASTRE-SE
                        </h1>
                    </div>
                    <div class="box_campos"  >
                        <div class="box-label">
                            <label for="nome">
                                Nome*:
                            </label>
                        </div>
                    <div class="box-text-cad">
                        <input class="input-fale-conosco" type="text" name="txtnome" >
                    </div>
                    </div>  
                    <div class="box_campos">
                        <div class="box-label">
                            <label >
                                Telefone:
                            </label>
                        </div>
                    <div class="box-text-cad">
                        <input class="input-fale-conosco" type="text" name="txtendereco" >
                    </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label>
                                Celular*:
                            </label>
                        </div>
                    <div class="box-text-cad">
                        <input class="input-fale-conosco" type="text" name="txtbairro" >
                    </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label>
                                Email*:
                            </label>
                        </div>
                    <div class="box-text-cad">
                        <input class="input-fale-conosco" type="email" name="txtcep" >
                    </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label>
                                Home Page:
                            </label>
                        </div>
                    <div class="box-text-cad">
                        <input class="input-fale-conosco" type="text" name="txttel" >
                    </div>    
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label>
                                Facebook:
                            </label>
                        </div>
                    <div class="box-text-cad">
                        <input class="input-fale-conosco" type="text" name="txtcel" >
                    </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label>
                                Sexo:
                            </label>
                        </div>
                    <div class="box-text-cad" style="padding:15px;" >
                        <label>
                            <input type="radio" name="radio" value="masc">Masculino 
                        </label>
                        <label>
                            <input type="radio" name="radio" value="fem">Feminino
                        </label>
                    </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label>    
                                Data nasc.:
                            </label>
                        </div>
                    <div class="box-text-cad">
                        <input class="input-fale-conosco" type="text" name="txtdtnasc" pattern="[0-9]{2} [0-9]{4} [0-9]{4}" placeholder=" ( _ _ )_ _ _ _ - _ _ _ _ ">
                    </div>
                    </div>
                    <div class="campo-obs">
                        <div class="box-label">
                            <label>
                                Sugestões:
                            </label>
                        </div>
                        <div id="box-textarea" >
                            <textarea name="txtobs"></textarea>
                        </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label" >

                        </div>
                        <div id="box-buttons">
                            <div class="box-btn">
                                <input type="submit" class="btn-fale-conosco" name="btnsalvar" id="btnsalvar" value="salvar">
                            </div>
                            <div class="box-btn">
                                <input  type="button" class="btn-fale-conosco" value="sair">
                            </div>
                        </div>
                    </div>
                </div>
            </form> 
        </div>
        <?php
            require_once('footer.php');
        ?>
    </body>
</html>
