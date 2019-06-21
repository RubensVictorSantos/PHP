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
    
    if(!isset($_SESSION)){    
        session_start();
        
        $codnivel = $_SESSION['nivel'];

        $sql = "SELECT * FROM tbl_nivel WHERE codigo =".$codnivel;

        $select = mysqli_query($conexao, $sql);

        if($rs=mysqli_fetch_array($select)){

            $admfaleconosco = $rs['admfaleconosco'];

        }
        
        if(!$admfaleconosco){
            
            header('location:cms.php');
        }
    
    } 

    if(isset($_GET['modo'])){
        
        $modo = $_GET['modo'];
        $id = $_GET['id'];
        $select = null;
        
        /******************************* EXCLUIR *******************************/
        if($modo == 'excluir'){
            
            $sql = "DELETE FROM tbl_cadastro_cliente WHERE cod_cliente =".$id;
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
                   
                   type:"GET",
                
                   url:"modal.php",
                    
                    data:{cod_cliente:idItem},
                    
                    success: function(dados){
                        $('#modal').html(dados);
                    
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
                            Nome
                            
                        </div>
                        <div class="tbl-titulos">
                            Telefone
                            
                        </div>
                        <div class="tbl-titulos">
                            Celular
                            
                        </div>
                        <div class="tbl-titulos">
                            E-mail
                            
                        </div>
                        <div class="titulo-campo-opcoes">
                            Opções
                            
                        </div>
                    </div>
                        <?php

                            $sql = "SELECT * FROM tbl_cadastro_cliente ORDER BY cod_cliente DESC";
                            $select = mysqli_query($conexao, $sql);
                             
                            while($rs=mysqli_fetch_array($select)){
                                
                        ?>
                        <div class="tbl-dados-db">
                            <div class="campos-db">
                                <?php echo($rs['nome'])?>
                                
                            </div>
                            <div class="campos-db">
                                <?php echo($rs['telefone'])?>
                                
                            </div>
                            <div class="campos-db">
                                <?php echo($rs['celular'])?>
                                
                            </div>
                            <div class="campos-db">
                                <?php echo($rs['email'])?>
                                
                            </div>
                            <div class="campo-opcoes">
                                <div class="opcoes">
                                    <input type="image"
                                           class="visualizar center"
                                           onclick="visualizarDados(<?php echo($rs['cod_cliente']);?>);"
                                           src="../img/pesquisar.png"
                                           width="20px"
                                           height="20px"
                                           style="margin-top:4px;">
                                    
                                </div>
                                <div class="opcoes">
                                    <a href= "cms-fale-conosco.php?modo=excluir&id=<?php echo($rs['cod_cliente']);?>" onclick="return confirm('Deseja realmente excluir?');">
                                        <input type="image"
                                               src="../img/excluir.png"
                                               width="24px"
                                               height="24px"
                                               class="img center"
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