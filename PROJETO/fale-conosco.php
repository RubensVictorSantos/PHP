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
            <title>Fale conosco</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
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
                        <input class="input-fale-conosco" type="text" title="Preencha o campo nome" name="txtnome"  id="nome" value="<?php echo($nome)?>" required>
                    </div>
                    </div>  
                    <div class="box_campos">
                        <div class="box-label">
                            <label for="telefone">
                                Telefone:
                            </label>
                        </div>
                    <div class="box-text-cad">
                        <input class="input-fale-conosco" type="tel" name="txttel"  id="telefone" value="<?php echo($telefone)?>" placeholder="Ex.: (00) 0000-0000">
                        
                    </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label for="celular">
                                Celular*:
                            </label>
                        </div>
                    <div class="box-text-cad">
                        <input class="input-fale-conosco" type="text" name="txtcel"  id="celular" value="<?php echo($celular)?>" placeholder="Ex.: (00) 00000-0000" required>
                    </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label for="email">
                                Email*:
                            </label>
                        </div>
                    <div class="box-text-cad">
                        <input class="input-fale-conosco" type="email" name="txtemail"  id="email" value="<?php echo($email)?>" required>
                    </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label for="home-page">
                                Home Page:
                            </label>
                        </div>
                    <div class="box-text-cad">
                        <input class="input-fale-conosco" type="url" name="txthomep" id="home-page" value="<?php echo($homep)?>">
                    </div>    
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label for="facebook">
                                Facebook:
                            </label>
                        </div>
                    <div class="box-text-cad">
                        <input class="input-fale-conosco" type="text" id="facebook" name="txtface"  value="<?php echo($facebook)?>">
                    </div>
                    </div>
                    <div class="campo-obs">
                        <div class="box-label">
                            <label>
                                Sugestões:
                            </label>
                        </div>
                        <div id="box-textarea" >
                            <textarea name="txtsugestoes"></textarea>
                        </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label for="produto">
                                Infomações Produto:
                            </label>
                        </div>
                    <div class="box-text-cad">
                        <input class="input-fale-conosco" type="text" id="produto" name="txtproduto"  value="<?php echo($produto)?>">
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
                            <input type="radio" name="radio" value="M" required >Masculino 
                        </label>
                        <label>
                            <input type="radio" name="radio" value="F" required>Feminino
                        </label>
                    </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label for="profissao">    
                                Profissão*:
                            </label>
                        </div>
                    <div class="box-text-cad">
                        <input class="input-fale-conosco" type="text" id="profissao" name="txtprofissao" value="<?php echo($profissao)?>">
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
                require_once('redes.php');
            ?>
        </div>
        <?php
            require_once('footer.php');
        ?>
        <script src="js/Mascara.js"></script>
    </body>
</html>
