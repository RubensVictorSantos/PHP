<?php

    require_once('../bd/conexao.php');
    
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

    if(isset($_GET['modo'])){
        
        $modo = $_GET['modo'];
        $id = $_GET['id'];
        
        $_SESSION['idRegistro'] = $id;
        
        //excluir
        if($modo == 'excluir'){
            
            $sql = "DELETE FROM tbl_contato WHERE codigo =".$id;
            
            if($rscontato = mysqli_fetch_array($select)){
                
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
                
                if($rscontato['sexo'] == 'F'){
                    
                    $rdosexoF = "checked";
                    
                }else{
                    
                    $rdosexoM = "checked";
                    
                }
                
            }
            
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
        }
        
    }
?>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>
            CMS-fale-conosco
        </title>
        <link rel="icon" href="img/ico/logo.png">
        <link rel="icon" href="../img/ico/logo.png">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="../js/jquery.js"></script>
        <script>
            $(document).ready(function(){
				$('.visualizar').click(function(){
					jQuery('#container').fadeIn(400);
				});
			});
			
			function visualizarDados (idItem)
			{
				$.ajax({
                    //metodo
                   type:"GET",
                    //pagina que sera descarregada a informacao
                   url:"modal.php",
                    //e o parametro de informacao
                    data:{codigo:idItem},
                    //havendo sucesso na requisicao dos dados
                    //descarregamos o resultado da modal, dentro da div modal
                    //a div(#modal) receberá os dados do html
                    success: function(dados){
                        $('#modal').html(dados);
                    //alert(dados); alert para trazer o html caso tenha erros(comentar a linha de cima)
                    }
                });
			}
        </script>
    </head>
    <body>
        <div id="container">
            
			<div id="modal"></div>
		
        </div>
        <div id="box-main" class="center">
            <div id="logo">
                <div id="box-titulo">
                        <span style="font-weight:bold;" >CMS</span> - Sistema de gerenciamento do site
                    
                </div>
                <div id="box-img-logo">
                    <figure id="img-logo" class="center">
                        <img src="../img/ico/logo.png">
                        <!--id="img-logo"-->
                    </figure>
                </div>
            </div>
            <div id="menu">
                <div class="option">
                    <div class="img-option center">
                        <a href="cms.php">
                            <input src="../img/ico/writing.png" id="btn-content" type="image" class="img-cms">
                        </a>
                    </div>
                    <div class="text-cms center">
                        <label for="btn-content">
                            <p>
                                Adm. Conteúdo
                            </p>
                        </label>
                    
                    </div>
                </div>
                <div class="option">
                    <div class="img-option center">
                        <a href="#">
                            <input src="../img/ico/contact.png" id="btn-fc" type="image" class="img-cms">
                        </a>
                    </div>
                    <div class="text-cms center">
                        <label for="btn-fc">
                            <p>
                                Adm. Fale conosco
                            </p>
                        </label>
                    
                    </div>
                </div>
                <div class="option">
                    <div class="img-option center">
                        <a href="#">
                            <input src="../img/ico/product.png" id="btn-produtos" type="image" class="img-cms">
                        </a>
                    </div>
                    <div class="text-cms center">
                        <label for="btn-produtos">
                            <p>
                                Adm. Produtos
                            </p>
                        </label>
                    
                    </div>
                </div>
                <div class="option">
                    <div class="img-option center">
                        <a href="#">
                            <input src="../img/ico/man.png" id="btn-user" type="image" class="img-cms">
                        </a>
                    </div>
                    <div class="text-cms center">
                        <label for="btn-user">
                            <p>
                                Adm. Usuários
                            </p>
                        </label>
                    </div>
                </div>
                <div id="box-info-user">
                    <div id="text-name-user">
                        <label for="name-user">
                            <h4>
                                Bem Vindo,<span id="name-user"> xxxxxx</span>
                            </h4>
                        </label>
                    </div>
                    <div id="box-btn">
                        <input type="button" id="btn-logout" value="Logout">
                    </div>
                </div>
            </div>
            
            <div id="conteudo">
                <div id="table">
                    <div class="titulo-tbl">
                        Consulta de contatos
                    </div> 
                    <div class="cabecalho">
                        <div class="titulos">
                            Nome:
                        </div>
                        <div class="titulos">
                            Telefone:
                        </div>
                        <div class="titulos">
                            Celular:
                        </div>
                        <div class="titulos">
                            E-mail:
                        </div>
                        <div class="titulos">
                            Opções:
                        </div>
                    </div>
                        <?php

                            $sql = "SELECT * FROM tbl_contato ORDER BY codigo DESC";

                            //select retorna dados, por isso precisamos de uma variavel
                            //guarda o retorno do bd em uma variavel local
                            $select = mysqli_query($conexao, $sql);

                            //rs = recod set, retorna os dados do banco
                            //mysql_fetch_array transforma uma lista de retorno do banco de dados
                            //de dados em uma matriz de dados
                            //no caso o select, e guarda na variavel rscontatos
                            while($rscontatos=mysqli_fetch_array($select))
                            {
                        ?>
                        <div class="tbl-dados-db">
                            <div class="campos-db">
                                <?php echo($rscontatos['nome'])?>	
                            </div>
                            <div class="campos-db">
                                <?php echo($rscontatos['telefone'])?>	
                            </div>
                            <div class="campos-db">
                                <?php echo($rscontatos['celular'])?>
                            </div>
                            <div class="campos-db">
                                <?php echo($rscontatos['email'])?>	
                            </div>
                            <div class="campos-db">
                                <div class="opcoes">
                                    <a href= "index.php?modo=excluir&id=<?php echo($rscontatos['codigo']);?>" onclick="return confirm('Deseja realmente excluir?');">

                                        <input type="image" src="../img/excluir.png" width="24" height="24" class="img">
                                    </a>
                                </div>
                                <div class="opcoes">
                                    <a href="index.php?modo=editar&id=<?php echo($rscontatos['codigo']);?>">
                                        <img src="../img/editar24.png" width="24" height="24" class="img">
                                    </a>
                                </div>
                                <div class="opcoes">
                                    <input type="image" class="visualizar" onclick="visualizarDados(<?php echo($rscontatos['codigo']);?>);" src="../img/pesquisar.png" width="24px" height="20px" class="img">
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
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