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
    $rdosexoF = null;
    $rdosexoM = null;
    
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
            
            <?php
    
                require_once('cms-menu.php');
    
            ?>
            
            <!--CONTEÚDO-->
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
                        <div class="campo-opcoes">
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
                                <?php echo($rscontatos['nome'])
                                
                                ?>	
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
                            <div class="campo-opcoes">
                                <div class="opcoes">
                                    <input type="image" class="visualizar" onclick="visualizarDados(<?php echo($rscontatos['codigo']);?>);" src="../img/pesquisar.png" width="24px" height="24px" class="img center">
                                </div>
                                <div class="opcoes">
                                    <a href= "cms-fale-conosco.php?modo=excluir&id=<?php echo($rscontatos['codigo']);?>" onclick="return confirm('Deseja realmente excluir?');">

                                        <input type="image" src="../img/excluir.png" width="24" height="24" class="img center">
                                    </a>
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