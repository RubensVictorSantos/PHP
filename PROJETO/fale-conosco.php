<?php
    
    require_once('bd/conexao.php');
    
    $conexao = conexaoMysql();
    
    $nome = null;
    $telefone = null;
    $celular = null;
    $email = null;
    $homep = null;
    $facebook = null;
    $sugestoes = null;
    $produto = null;
    $sexo = null;
    $profissao = null;
    $sql = null;
    $rdosexoF = null;
    $rdosexoM = null;
    
    
    if(isset($_POST["btnsalvar"])){
        
        
        $nome = $_POST["txtnome"];
        $telefone = $_POST["txttel"];
        $celular = $_POST["txtcel"];
        $email = $_POST["txtemail"];
        $homep = $_POST["txthomep"];
        $facebook = $_POST["txtface"];
        $sugestoes = $_POST["txtsugestoes"];
        $produto = $_POST["txtproduto"];
        $sexo = $_POST["radio"];
        $profissao = $_POST["txtprofissao"];
        
        $sql = "INSERT INTO tbl_contato(nome, telefone, celular, email, home_page, facebook, sugestoes, produto, sexo, profissao) VALUES ('".$nome."','".$telefone."','".$celular."','".$email."','".$homep."','".$facebook."','".$sugestoes."','".$produto."','".$sexo."','".$profissao."')";
        
        echo($sql);

        if(mysqli_query($conexao, $sql)){
            header("location:fale-conosco.php");
        }else{

//            echo("<script>alert(die('Connection failed: ' . mysqli_connect_error());)</script>");
            echo("<script>alert('erros!')");
            
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
<<<<<<< HEAD
            <title>Fale conosco</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
=======
        <title>Fale conosco</title>
           <script src="js/mascara.js" type="text/javascript">
        </script>
        <link rel="icon" href="img/ico/logo.png">
>>>>>>> e3391cc4befdd58b0cec24434baa9515eec50792
    </head>
    <body>
        <?php
    
            require_once('menu.php');
    
        ?>
        <div id="conteudo" class="center">
            <div id="conteudo-catalogo" class="center">
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
<<<<<<< HEAD
                        <input class="input-fale-conosco" type="text" title="Preencha o campo nome" name="txtnome"  id="nome" value="<?php echo($nome)?>" required>
=======
                        <input onkeypress="return validar(event,'number')" id="nome" class="input-fale-conosco" type="text" name="txtnome"  placeholder="Digite seu nome" value="<?php echo($nome)?>" required >
>>>>>>> e3391cc4befdd58b0cec24434baa9515eec50792
                    </div>
                    </div>  
                    <div class="box_campos">
                        <div class="box-label">
                            <label for="telefone">
                                Telefone:
                            </label>
                        </div>
                    <div class="box-text-cad">
<<<<<<< HEAD
                        <input class="input-fale-conosco" type="tel" name="txttel"  id="telefone" value="<?php echo($telefone)?>" placeholder="Ex.: (00) 0000-0000">
=======
                        <input onkeypress="return validar(event,'caracter','telefone')" id="telefone" maxlength="14" class="input-fale-conosco" type="tel" name="txttel" placeholder="( _ _ ) _ _ _ _-_ _ _ _" value="<?php echo($telefone)?>">
>>>>>>> e3391cc4befdd58b0cec24434baa9515eec50792
                        
                    </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label for="celular">
                                Celular*:
                            </label>
                        </div>
                    <div class="box-text-cad">
<<<<<<< HEAD
                        <input class="input-fale-conosco" type="text" name="txtcel"  id="celular" value="<?php echo($celular)?>" placeholder="Ex.: (00) 00000-0000" required>
=======
                        <input onkeypress="return validar(event,'caracter','celular')" id="celular" maxlength="15" class="input-fale-conosco" type="text" name="txtcel"  placeholder="( _ _ ) _ _ _ _ _-_ _ _ _" value="<?php echo($celular)?>" required>
>>>>>>> e3391cc4befdd58b0cec24434baa9515eec50792
                    </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label for="email">
                                Email*:
                            </label>
                        </div>
                    <div class="box-text-cad">
<<<<<<< HEAD
                        <input class="input-fale-conosco" type="email" name="txtemail"  id="email" value="<?php echo($email)?>" required>
=======
                        <input id="email" class="input-fale-conosco" type="email" name="txtemail" placeholder="seuEmail@dominio.com" value="<?php echo($email)?>" required >
>>>>>>> e3391cc4befdd58b0cec24434baa9515eec50792
                    </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label for="home-page">
                                Home Page:
                            </label>
                        </div>
                    <div class="box-text-cad">
<<<<<<< HEAD
                        <input class="input-fale-conosco" type="url" name="txthomep" id="home-page" value="<?php echo($homep)?>">
=======
                        <input id="home-page" class="input-fale-conosco" type="url" name="txthomep" placeholder="http://seuSite.com.br" value="<?php echo($homep)?>">
>>>>>>> e3391cc4befdd58b0cec24434baa9515eec50792
                    </div>    
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label for="facebook">
                                Facebook:
                            </label>
                        </div>
                    <div class="box-text-cad">
<<<<<<< HEAD
                        <input class="input-fale-conosco" type="text" id="facebook" name="txtface"  value="<?php echo($facebook)?>">
=======
                        <input id="facebook" class="input-fale-conosco" type="text" name="txtface" placeholder="http://facebook.com" value="<?php echo($facebook)?>">
>>>>>>> e3391cc4befdd58b0cec24434baa9515eec50792
                    </div>
                    </div>
                    <div class="campo-obs">
                        <div class="box-label">
                            <label>
                                Sugestões:
                            </label>
                        </div>
                        <div id="box-textarea" >
<<<<<<< HEAD
                            <textarea name="txtsugestoes"></textarea>
=======
                            <textarea name="txtsugestoes" value="<?php echo($sugestoes)?>"></textarea>
>>>>>>> e3391cc4befdd58b0cec24434baa9515eec50792
                        </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label for="produto">
                                Infomações Produto:
                            </label>
                        </div>
                    <div class="box-text-cad">
<<<<<<< HEAD
                        <input class="input-fale-conosco" type="text" id="produto" name="txtproduto"  value="<?php echo($produto)?>">
=======
                        <input id="produto" class="input-fale-conosco" type="text" name="txtproduto"  value="<?php echo($produto)?>">
>>>>>>> e3391cc4befdd58b0cec24434baa9515eec50792
                    </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label>
                                Sexo*:
                            </label>
                        </div>
                    <div class="box-text-cad" style="padding:15px;" >
                        <label>
<<<<<<< HEAD
                            <input type="radio" name="radio" value="M" required >Masculino 
                        </label>
                        <label>
                            <input type="radio" name="radio" value="F" required>Feminino
=======
                            <input type="radio" name="radio" value="M" value="<?php echo($rdosexoM)?>" checked required >Masculino 
                        </label>
                        <label>
                            <input type="radio" name="radio" value="F" value="<?php echo($rdosexoF)?>" required >Feminino
>>>>>>> e3391cc4befdd58b0cec24434baa9515eec50792
                        </label>
                    </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label for="profissao">    
<<<<<<< HEAD
                                Profissão*:
                            </label>
                        </div>
                    <div class="box-text-cad">
                        <input class="input-fale-conosco" type="text" id="profissao" name="txtprofissao" value="<?php echo($profissao)?>">
=======
                                Profissão:
                            </label>
                        </div>
                    <div class="box-text-cad">
                        <input id="profissao" class="input-fale-conosco" type="text" name="txtprofissao" placeholder="Digite sua profissão" value="<?php echo($profissao)?>">
>>>>>>> e3391cc4befdd58b0cec24434baa9515eec50792
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
                                <input type="button" class="btn-fale-conosco" value="sair">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
            <?php
                require_once('redes.php');
            ?>
        </div>
        <?php
            require_once('footer.php');
        ?>
<<<<<<< HEAD
        <script src="js/Mascara.js"></script>
=======
        <script src="js/mascara.js"></script>
>>>>>>> e3391cc4befdd58b0cec24434baa9515eec50792
    </body>
</html>
