<?php

    require_once('../bd/conexao.php');
    session_start();

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
        $select = null;
        $_SESSION['idRegistro'] = $id;
        
        /******************************* EXCLUIR *******************************/
        if($modo == 'excluir'){
            
            $sql = "DELETE FROM tbl_cadastro_cliente WHERE codigo =".$id;
            $select = mysqli_query($conexao, $sql);
            
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>
            CMS Fale Conosco
        </title>
        <link rel="icon" href="../img/ico/i405_TDM_icon_bike93.gif">
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
        <!--****************************** MODAL ****************************-->
        <div id="container">
			<div id="modal"></div>
		
        </div>
        <div id="box-main" class="center">
            
            <?php
    
                require_once('cms-menu.php');
    
            ?>
            <div class="titulos-cms">
                <h3>Consulta cadastro clientes</h3>
            </div>
            <!--*********************** CONTEÚDO ******************************-->
            <div id="conteudo">
                <div id="table-fale-conosco">
                    <div class="cabecalho">
                        <div class="tbl-titulos">
                            Nome:
                        </div>
                        <div class="tbl-titulos">
                            Telefone:
                        </div>
                        <div class="tbl-titulos">
                            Celular:
                        </div>
                        <div class="tbl-titulos">
                            E-mail:
                        </div>
                        <div class="titulo-campo-opcoes">
                            Opções:
                        </div>
                    </div>
                        <?php

                            $sql = "SELECT * FROM tbl_cadastro_cliente ORDER BY codigo DESC";

                            $select = mysqli_query($conexao, $sql);
                             
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
                            <div class="campo-opcoes">
                                <div class="opcoes">
                                    <input type="image" class="visualizar" onclick="visualizarDados(<?php echo($rscontatos['codigo']);?>);" src="../img/pesquisar.png" width="20px" height="20px" class="center" style="margin-top:4px;">
                                </div>
                                <div class="opcoes">
                                    <a href= "cms-fale-conosco.php?modo=excluir&id=<?php echo($rscontatos['codigo']);?>" onclick="return confirm('Deseja realmente excluir?');">

                                        <input type="image" src="../img/excluir.png" width="24px" height="24px" class="img center"
                                        style="margin-top:2px;">
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