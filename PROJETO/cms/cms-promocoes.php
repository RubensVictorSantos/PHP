<?php

    require_once('../bd/conexao.php');
    
    $conexao = conexaoMysql();
    session_start();

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
    $rdoativado = null;
    $rdodesativado = null;

    if(isset($_POST["btnsalvar"])){
        
        
        $nome = $_POST["textnomep"];
        $telefone = filter_var($_POST["txttel"], FILTER_SANITIZE_STRING);
        $celular = filter_var($_POST["txtcel"], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST["txtemail"], FILTER_SANITIZE_STRING);
        $homep = filter_var($_POST["txthomep"], FILTER_SANITIZE_STRING);
        $facebook = filter_var($_POST["txtface"], FILTER_SANITIZE_STRING);
        $sugestoes = filter_var($_POST["txtsugestoes"], FILTER_SANITIZE_STRING);
        $produto = filter_var($_POST["txtproduto"], FILTER_SANITIZE_STRING);
        $sexo = $_POST["radio"];
        $profissao = filter_var($_POST["txtprofissao"], FILTER_SANITIZE_STRING);
        
        if($_POST['btnsalvar'] == "salvar"){
        
            $sql = "INSERT INTO tbl_contato(nome, telefone, celular, email, home_page, facebook, sugestoes, produto, sexo, profissao) VALUES ('".$nome."','".$telefone."','".$celular."','".$email."','".$homep."','".$facebook."','".$sugestoes."','".$produto."','".$sexo."','".$profissao."')";
        
        }
        
        echo($sql);
        
        if(mysqli_query($conexao, $sql)){
            header("location:cms-promocoes.php");
        }else{

            //echo("<script>alert(die('Connection failed: 1'.mysqli_connect_error());)</script>");
            //echo("<script>alert('erros!')");
        }
    }


    if(isset($_GET['modo'])){
        
        $modo = $_GET['modo'];
        $id = $_GET['id'];
        $select = null;
        $_SESSION['idRegistro'] = $id;
        
        //excluir
        if($modo == 'excluir'){
            
            $sql = "DELETE FROM tbl_contato WHERE codigo =".$id;
            $select = mysqli_query($conexao, $sql);
            
        }
        if($modo == 'editar'){
            
            $sql = "UPDATE tbl_contato SET nome='".$nome."',
            telefone='".$telefone."',
            celular='".$celular."',
            email='".$email."',
            home_page='".$homep."',
            facebook='".$facebook."',
            sugestoes='".$sugestoes."',
            produto='".$produto."',
            sexo='".$sexo."',
            profissao='".$profissao."'

            WHERE codigo =".$_SESSION['idRegistro'];
            
            echo('<script>alert("isso")</script>');
            
        }
        
    }


?>

<html>
    <head>
        <title>
            cms-promoções
        </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div id="box-main" class="center">
            
            <?php
    
                require_once('cms-menu.php');
    
            ?>
            <div class="titulos-cms">
                <h3>Página Promoções</h3>
            </div>
            <div id="conteudo">
                <div class="conteudo-cms-promo">
                    <form name="frmcms-promocoes" method="POST" action="cms-promocoes.php">
                    <div>
                        <img src="" alt="" id="img-card">
                    </div>
                    <div class="nome-produto">
                        <div id="box-file">
                            <input type="file" id="input-file">
                        </div>
                        <div class="info">
                            <div class="box-info">
                                <div class="retangulo">
                                    Informações sobre a imagem
                                </div>
                                <div class="triangulo"></div>
                            </div>
                            <div class="btn-informacoes">
                                <p>i</p>
                            </div>
                        </div>
                    </div>
                    <div class="nome-produto">
                        <div class="box-input-promo">
                            <input type="text" id="textnomep" class="input-cms-promo" value="<?php echo($nome)?>" maxlength="65" placeholder="Digite o nome do produto">
                        </div>
                        <div class="info">
                            <div class="box-info">
                                <div class="retangulo">
                                    Informações sobre a imagem
                                </div>
                                <div class="triangulo"></div>
                            </div>
                            <div class="btn-informacoes">
                                <p>i</p>
                            </div>
                        </div>
                    </div>
                    <div class="nome-produto">
                        <div class="box-input-promo">
                            <input type="text" id="text-desc-p" class="input-cms-promo" maxlength="65" placeholder="Digite a descrição do produto">
                        </div>
                        <div class="info">
                            <div class="box-info">
                                <div class="retangulo">
                                    Informações sobre a imagem
                                </div>
                                <div class="triangulo"></div>
                            </div>
                            <div class="btn-informacoes">
                                <p>i</p>
                            </div>
                        </div>
                    </div>
                    <div class="nome-produto">
                        <div class="box-input-promo">
                            <input type="text" id="text-preco-p" class="input-cms-promo" maxlength="65" placeholder=" Digite o preço atual do produto">
                        </div>
                        <div class="info">
                            <div class="box-info">
                                <div class="retangulo">
                                    Informações sobre a imagem
                                </div>
                                <div class="triangulo"></div>
                            </div>
                            <div class="btn-informacoes">
                                <p>i</p>
                            </div>
                        </div>
                    </div>
                    <div class="nome-produto">
                        <div class="box-input-promo">
                            <input type="text" id="text-preco-desc" class="input-cms-promo" maxlength="65" placeholder=" Digite o preço do produto com desconto">
                        </div>
                        <div class="info">
                            <div class="box-info">
                                <div class="retangulo">
                                    Informações sobre a imagem
                                </div>
                                <div class="triangulo"></div>
                            </div>
                            <div class="btn-informacoes">
                                i
                            </div>
                        </div>
                    </div>

                    <div class="nome-produto">
                        <div class="box-rdo">
                            <input type="radio" name="radio" id="rdo-ativado"><label for="rdo-ativado"> Ativado</label>
                        </div>
                        <div class="box-rdo">
                            <input type="radio" name="radio" id="rdo-desativado" checked><label for="rdo-desativado"> Desativado</label>
                        </div>
                        <div class="box-rdo">
                            <input type="submit" id="" class="btn-fale-conosco" name="btnsalvar" id="btnsalvar" value="salvar">
                        </div>
                    </div>
                    </form>
                </div>
                
                <div class="conteudo-cms-tbl">
                    <div></div>
                    <div id="tbl-promocoes">
                        <div class="cabecalho">
                            <div class="titulos-promo">
                                Nome produto:
                            </div>
                            <div class="titulos-promo">
                                Imagem:
                            </div>
                            <div class="titulos-promo">
                                Preço:
                            </div>
                            <div class="titulos-promo">
                                Desconto:
                            </div>
                            <div class="titulo-campo-opcoes">
                                Opções:
                            </div>
                        </div>
                        <?php

                            $sql = "SELECT * FROM tbl_contato ORDER BY codigo DESC";

                            $select = mysqli_query($conexao, $sql);

                            while($rscontatos=mysqli_fetch_array($select))
                            {
                        ?>
                        <div class="tbl-dados-db">
                            <div class="campos-tbl-promo">
                                <?php echo($rscontatos['nome'])?>	
                            </div>
                            <div class="campos-tbl-promo">
                                <?php echo($rscontatos['telefone'])?>	
                            </div>
                            <div class="campos-tbl-promo">
                                <?php echo($rscontatos['celular'])?>
                            </div>
                            <div class="campos-tbl-promo">
                                <?php echo($rscontatos['email'])?>	
                            </div>
                            <div class="campo-opcoes">
                                <div class="opcoes-promo">
                                    <input type="image" class="visualizar" onclick="visualizarDados(<?php echo($rscontatos['codigo']);?>);" src="../img/pesquisar.png" width="20px" height="20px" class="center" style="margin-top:4px;">
                                </div>
                                <div class="opcoes-promo">
                                    <a href= "cms-promocoes.php?modo=excluir&id=<?php echo($rscontatos['codigo']);?>" onclick="return confirm('Deseja realmente excluir?');">

                                        <input type="image" src="../img/excluir.png" width="24px" height="24px" class="img center"
                                        style="margin-top:2px;">
                                    </a>
                                </div>
                                <div class="opcoes-promo">
                                    <a href="cms-promocoes.php?modo=editar&id=<?php echo($rscontatos['codigo']);?>">
                                        <img src="../img/editar24.png" width="20px" height="23px" class="img center" style="margin-top:2px;">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
            <div id="footer">
                <h3>
                    Desenvolvido por: Rubens Victor
                </h3>
            
            </div>
        </div>
    </body>
</html>