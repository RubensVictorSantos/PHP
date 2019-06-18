<?php
    
    /*Ativa o recurso de variavel de sessão*/
    session_start();

    $rdosexoF = null;
    $rdosexoM = null;
    
    require_once('bd/conexao.php');
    
    $conexao = conexaoMysql();
    

    $nome = null;
    $endereco = null;
    $bairro = null;
    $cep = null;
    $telefone = null;
    $celular = null;
    $email = null;
    $sexo = null;
    $data_nasc = null;
    $obs = null;
    $dt_nasc = null;
    $sql = null;
    $botao = 'salvar';
    
    //Ação de excluir um registro

    if(isset($_GET['modo'])){
        
        $modo = $_GET['modo'];
        
        $id = $_GET['id'];
        
        /*Quardamos em uma variável de sessão o codigo do registro em uma  */
        $_SESSION['idRegistro'] = $id;
        
        if($modo == 'excluir'){
            
            $sql="DELETE FROM tblcontatos WHERE codigo=".$id;// INT NÃO PRECISA DE ASPAS SIMPLES
            mysqli_query($conexao, $sql);
        
        }elseif($modo== 'buscar'){
        
            $sql="SELECT * FROM tblcontatos WHERE codigo=".$id;
            $select = mysqli_query($conexao, $sql);
            
            if($rscontato = mysqli_fetch_array($select)){
                
                $nome = $rscontato['nome'];
                $endereco = $rscontato['endereco'];
                $bairro = $rscontato['bairro'];
                $cep = $rscontato['cep'];
                $telefone = $rscontato['telefone'];
                $celular = $rscontato['celular'];
                $email = $rscontato['email'];
                
                $data_nasc = explode("-",$rscontato['data_nasc']);
                $data_nasc = $data_nasc[2] . "/".$data_nasc[1]."/".$data_nasc[0];
                
                
                if($rscontato['sexo'] == 'F'){
                    
                    $rdosexoF = 'checked';
                    
                }else{
                    
                    $rdosexoM = 'checked';
                    
                }
                
                $obs = $rscontato['obs'];
                $botao = 'editar';
            }
        }  
    }

    //Ação de inserir um novo registro

    if(isset($_POST["btnsalvar"])){
        
        
        $nome = $_POST["txtnome"];
        $endereco = $_POST["txtendereco"];
        $bairro = $_POST["txtbairro"];
        $cep = $_POST["txtcep"];
        $telefone = $_POST["txttel"];
        $celular = $_POST["txtcel"];
        $email = $_POST["txtemail"];
        $sexo = $_POST["radio"];
        
        
        /*Explode busca uma caracter padrão na string e automaticamente quebra a sua string em vetor, colocando cada infiormalção encontrada em um indice*/
        
        $data_nasc = explode("/", $_POST["txtdtnasc"]);
        $obs = $_POST["txtobs"];
        $dt_nasc = $data_nasc[2]."-".$data_nasc[1]."-".$data_nasc[0];
        
        //var_dump($data_nasc."<br>");
        //var_dump($dt_nasc."<br>");
        
        if($_POST['btnsalvar'] == 'salvar'){
        
            $sql = "INSERT INTO tblcontatos(nome, endereco, bairro, cep, telefone, celular, email, sexo, data_nasc, obs) VALUES ('".$nome."','".$endereco."','".$bairro."','".$cep."','".$telefone."','".$celular."','".$email."','".$sexo."','".$dt_nasc."','".$obs."')";//quando o valor for numerico tira as aspas simples.

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

            //<pattern="[0-9]{2} [0-9]{4} [0-9]{4}" placeholder="(__)____-____--">
        
        }elseif($_POST['btnsalvar'] == 'editar'){
            
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
        if(mysqli_query($conexao, $sql)){
            //redireciona para uma nova pagina
            header("location:formulario_contatos.php");
        }else{
            
            echo("<script>alert('erro!')</script>");
            
        }
    }
    
?>
    

<html>
    <head>
        <meta charset="utf-8">
        <title>

        </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="js/jquery.js"></script>
<!--
        document = area do navegador 
        ready = evento de abertura do navegador
        fazer isso sempre que eu for precisar usar qualquer funÃ§ao do jQuery
-->
        <script>
        
            $(document).ready(function(){
                
                $('.visualizar').click(function(){
                    jQuery('#container').fadeIn(400);
                });
            });
            
            function visualizardados(idItem)
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
            <div id="modal" class="center"></div>
        </div>
        <div id="box-main" class="center">
            <form class="center" name="frmcontatos" method="POST" action="formulario_contatos.php">
                    <div class="box_campos">
                        <div class="box-label">
                            <label for="nome">
                                Nome:
                            </label>
                        </div>
                        <div>
                            <input type="text" name="txtnome" value="<?php echo($nome) ?>">
                        </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label >
                                Endereço:
                            </label>
                        </div>
                        <div>
                            <input type="text" name="txtendereco" value="<?php echo($endereco) ?>">
                        </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label>
                                Bairro:
                            </label>
                        </div>
                        <div>
                            <input type="text" name="txtbairro" value="<?php echo($bairro) ?>">
                        </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label>
                                Cep:
                            </label>
                        </div>
                        <div>
                            <input type="text" name="txtcep" value="<?php echo($cep) ?>">
                        </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label>
                                Tel:
                            </label>
                        </div>
                        <div>
                            <input type="text" name="txttel" value="<?php echo($telefone) ?>">
                        </div>    
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label>
                                Cel:
                            </label>
                        </div>
                        <div>
                            <input type="text" name="txtcel" value="<?php echo($celular) ?>">
                    
                        </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label>
                                Email:
                            </label>
                        </div>
                        <div>
                            <input type="email" name="txtemail" value="<?php echo($email) ?>">
                        </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label>
                                Sexo:
                            </label>
                        </div>
                        <div>
                            <input type="radio" name="radio" value="F" <?php echo($rdosexoF) ?> >fem
                            <input type="radio" name="radio" value="M" <?php echo($rdosexoM) ?> >masc
                        </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label>    
                                Data nasc.:
                            </label>
                        </div>
                        <div>
                            <input type="text" name="txtdtnasc" value="<?php echo($data_nasc) ?>">
                        </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label>
                                Obs:
                            </label>
                        </div>
                        <div>
                            <textarea name="txtobs" value="<?php echo($obs) ?>"></textarea>
                        </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <input type="submit" name="btnsalvar" id="btnsalvar" value="<?php echo($botao) ?>">
                        </div>
                        <div class="box-label">
                            <input  type="button" value="sair">
                        </div>
                    </div>
            </form>
            <table>
                <tr>
                    <td colspan="5" style="text-align:center;">
                        
                        Consulta de contatos
                        
                    </td>
                </tr>
                <?php
                    $sql = "SELECT * FROM tblcontatos order by codigo desc";
                    $select = mysqli_query($conexao, $sql);
                    
                    //transforma uma lista de retorno do banco de dados em uma matriz de dados;
                    while($rscontatos = mysqli_fetch_array($select)){
                
                ?>
                <tr>
                    <td>
                        <?php
                            echo($rscontatos['nome']);    
                        ?>  
                    </td>
                    <td>
                         <?php
                            echo($rscontatos['telefone']);    
                        ?>
                    </td>
                    <td>
                         <?php
                            echo($rscontatos['celular']);    
                        ?>
                    </td>
                    <td>
                         <?php
                            echo($rscontatos['email']);    
                        ?>
                    </td>
                    <td>
                        <a href="formulario_contatos.php?modo=excluir&id=<?php echo($rscontatos['codigo']);?>" onclick="return confirm('Deseja relmanete excluir?');">
<<<<<<< HEAD
<!--
<<<<<<< HEAD
                            <img src="img/x-button.png">&nbsp; &nbsp;
                        </a>
                        <a href="formulario_contatos.php?modo=buscar&id=<?php echo($rscontatos['codigo']);?>;">
                            <img src="img/search.png">&nbsp; &nbsp;
                        </a>
                        <a href="#" >
                            <img src="img/exchange.png" class="visualizar" width="24px" height="24px" onclick="visualizardados(<?php ?>)">&nbsp; &nbsp;
=======
-->
=======
>>>>>>> 17de3d8cbcbdd118d2faf6fccf9c47a684038621
                            <img src="img/x-button.png" width="24px" height="24px">&nbsp; &nbsp;
                        </a>
                        <a href="formulario_contatos.php?modo=buscar&id=<?php echo($rscontatos['codigo']);?>;">
                            <img src="img/search.png" width="24px" height="24px" >&nbsp; &nbsp;
                        </a>
                        <a href="#" >
                            <img src="img/exchange.png" class="visualizar" width="24px" height="24px" onclick="visualizardados(<?php echo($rscontatos['codigo']);?>);">
<<<<<<< HEAD
<!-->>>>>>> 58562b25220c2e2810a41e100a7f6f2fde9efae9-->
=======
>>>>>>> 17de3d8cbcbdd118d2faf6fccf9c47a684038621
                        </a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </body>
</html>