<?php
    
    function conexaoMysql(){
    
    $conexao = null;
    $server = "localhost";
    $user = "root";
    $password = "binho250398";
    $database = "db_site";

    $conexao = mysqli_connect($server, $user, $password, $database);
    
        return $conexao;
    
    }
    
    $conexao = conexaoMysql();
    session_start();

    $nome = null;
    $imagem = null;
    $descricao = null;
    $preco = null;
    $valor_desconto = null;
    $status = null;
    $sql = null;
    $rdoativado = null;
    $rdodesativado = null;
    $rs = null;
    $id = null;
    
    
    if(isset($_GET['modo'])){
        
        $modo = $_GET['modo'];
        $id = $_GET['id'];
        
        //excluir
        if($modo == 'excluir'){
            $nomefoto = $_GET['nomefoto'];
            
            
            $sql = "DELETE FROM tbl_produto WHERE codigo =".$id;
            mysqli_query($conexao, $sql);
            
            unlink($nomefoto);
            
            header('location:cms-promocoes.php');
            
        }elseif($modo == 'editar'){
            
            $sql = "SELECT * FROM tbl_produto WHERE codigo =".$id;
            $select = mysqli_query($conexao, $sql);
            
            if($rs = mysqli_fetch_array($select)){
                
                $nome = $rs['nome'];
                $nomefoto = $rs['imagem'];
                $descricao = $rs['descricao'];
                $preco = $rs['preco'];
                $valor_desconto = $rs['valor_desconto'];
//                $status = $rs['radio'];
                
                if($rs['status'] == 'a'){
                    
                    $rdoativado = 'checked';
                    
                }else{
                    
                    $rdodesativado = 'checked';
                    
                }
                
            }
            
        }
        
    }
    
    
    if(isset($_POST["btnsalvar"])){
        
        
        $nome = $_POST["textnomep"];
        $descricao = $_POST["textdescricao"];
        $preco = $_POST["textpreco"];
        $valor_desconto = $_POST["textvdesconto"];
        $status = $_POST["radio"];
        
        $diretorio = "arquivos/";
        $arquivos_permitidos = array(".jpg",".jpeg",".png");
        $arquivo = $_FILES['flefoto']['name'];
        $tamanho_arquivo = $_FILES['flefoto']['size'];
        $tamanho_arquivo = round($tamanho_arquivo/1024);
        $extensao_arquivos = strrchr($arquivo,".");
        $nome_arquivo = pathinfo($arquivo, PATHINFO_FILENAME);
        
        if(in_array($extensao_arquivos, $arquivos_permitidos)){
            
            
            if($tamanho_arquivo<=5000){
                
                
                $arquivo_tmp = $_FILES['flefoto']['tmp_name'];
                
                //Criamos o novo nome do arquivo com a sua extensão
                $foto = $diretorio . $nome_arquivo . $extensao_arquivos;
                
                if(move_uploaded_file($arquivo_tmp, $foto)){
                    
                    $sql = "INSERT INTO tbl_produto(nome, imagem,descricao, preco, valor_desconto, status) VALUES ('".$nome."','".$foto."','".$descricao."','".$preco."','".$valor_desconto."','".$status."')";
                    
                    if(mysqli_query($conexao, $sql)){
                        
//                        var_dump($foto);
                        
                        header("location:cms-promocoes.php");
                    }else{

                        echo("<script>alert('erros!')");
                    }

                    
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

?>

<!DOCTYPE html>
<html lang="pt-br">
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
                    <form name="frmcms-promocoes" method="POST" action="cms-promocoes.php" enctype="multipart/form-data">
                    <div>  
                        <?php
                            if(isset($nomefoto)){
                                
//                                echo("<script>alert('var_dump($arquivo)')</script>");
                        ?>

                        <img src="<?php echo($nomefoto);?>" alt="" id="img-card">


                        <?php
                            }else{
                        ?>
                        <div id="img-card" style="border:1px solid black;border-radius:2px 2px;">
                            
                        </div>
                        <?php 
                        }

                        ?>
                    </div>
                    <div class="nome-produto">

                        <div id="box-file">
                            <input type="file"  name="flefoto" value="<?php echo($nomefoto);?>" onclick="" required>
                        </div>

                        <div class="info">
                            <div class="btn-informacoes">
                                <p>i</p>
                                <div class="box-info">
                                    <div class="retangulo">
                                        <p>
                                            A imagem deve conter no minimo 300x261px p/ não ficar distorcida
                                        </p>
                                    </div>
                                    <div class="triangulo"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nome-produto">
                        <div class="box-input-promo">
                            <input type="text" name="textnomep" class="input-cms-promo" value="<?php echo($nome)?>" maxlength="65" placeholder="Digite o nome do produto">
                        </div>
                        <div class="info">
                            <div class="btn-informacoes">
                                <p>i</p>
                                <div class="box-info">
                                    <div class="retangulo">
                                        <p>
                                            Esse campo deve conter no maximo " " caracteres
                                        </p>
                                    </div>
                                    <div class="triangulo"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nome-produto">
                        <div class="box-input-promo">
                            <input type="text" name="textdescricao" class="input-cms-promo" value="<?php echo($descricao)?>" maxlength="65" placeholder="Digite a descrição do produto">
                        </div>
                        <div class="info">
                            <div class="btn-informacoes">
                                <p>i</p>
                                <div class="box-info">
                                    <div class="retangulo">
                                        <p>
                                           Esse campo deve conter no maximo " " caracteres
                                        </p>
                                    </div>
                                    <div class="triangulo"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nome-produto">
                        <div class="box-input-promo">
                            <input type="text" name="textpreco" class="input-cms-promo" value="<?php echo($preco)?>" maxlength="65" placeholder=" Digite o preço atual do produto">
                        </div>
                        <div class="info">
                            <div class="btn-informacoes">
                                <p>i</p>
                                <div class="box-info">
                                    <div class="retangulo">
                                        <p>Esse campo deve conter no maximo " " caracteres</p>
                                    </div>
                                    <div class="triangulo"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nome-produto">
                        <div class="box-input-promo">
                            <input type="text" name="textvdesconto" class="input-cms-promo" value="<?php echo($valor_desconto)?>" maxlength="65" placeholder=" Digite o preço do produto com desconto">
                        </div>
                        <div class="info">
                            
                            <div class="btn-informacoes">
                                <p>i</p>
                                <div class="box-info">
                                    <div class="retangulo">
                                        <p>
                                             Esse campo deve conter no maximo " " caracteres
                                        </p>
                                    </div>
                                    <div class="triangulo"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="nome-produto">
                        <div class="box-rdo">
                            <input type="radio" name="radio" value="<?php echo($rdoativado) ?>" id="rdo-ativado"><label for="rdo-ativado" required > Ativado</label>
                        </div>
                        <div class="box-rdo">
                            <input type="radio" name="radio" value="<?php echo($rdodesativado) ?>" id="rdo-desativado"><label for="rdo-desativado" required > Desativado</label>
                        </div>
                        <div class="box-rdo">
                            <input type="submit" id="" class="btn-salvar" name="btnsalvar" id="btnsalvar" value="salvar">
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
                            
                            //TABELA VINDO DIRETO DO BANCO
                            $sql = "SELECT * FROM tbl_produto ORDER BY codigo DESC";

                            $select = mysqli_query($conexao, $sql);

                            while($rscontatos=mysqli_fetch_array($select))
                            {
                        ?>
                        <div class="tbl-dados-db">
                            <div class="campos-tbl-promo">
                                <?php echo($rscontatos['nome'])?>	
                            </div>
                            <div class="campos-tbl-promo">
                                <?php echo($rscontatos['imagem'])?>	
                            </div>
                            <div class="campos-tbl-promo">
                                <?php echo($rscontatos['preco'])?>
                            </div>
                            <div class="campos-tbl-promo">
                                <?php echo($rscontatos['valor_desconto'])?>	
                            </div>
                            <div class="campo-opcoes">
                                <div class="opcoes-promo">
                                    
                                    <a href= "cms-promocoes.php?modo=excluir&id=<?php echo($rscontatos['codigo']);?>&nomefoto=<?php echo($rscontatos['imagem']);?>" onclick="return confirm('Deseja realmente excluir?');">

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