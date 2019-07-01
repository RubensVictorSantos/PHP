<?php 
/*conexao com o Banco de Dados*/
    $conexao = null;

    //Estabelece uma conexao com o BD MySQl
    $conexao=mysqli_connect('localhost','root','binho250398','dbcontato');
    
    //Ativa o database a ser utilizado no projeto
//    mysqli_select_db('');


/**/

//Verifica se o botao Salvar foi clicado
if(isset($_POST["btnsalvar"]))
{
    //Resgata os dados fornecidos pelo usuário
    //usando o metodo POST, conforme escolhido no Form
    $nome=$_POST["txtnome"];
    $telefone=$_POST["txttelefone"];
    $celular=$_POST["txtcelular"];
    $email=$_POST["txtemail"];
    $dt_nasc=$_POST["txtdatanasc"];
    $sexo=$_POST["rdosexo"];
    $obs=$_POST["txtobs"];
    
    //Monta o Script para enviar para o BD
    $sql="insert into tblcontatos (nome,telefone,celular,email,sexo,dt_nasc,obs)
        values('".$nome."','".$telefone."','".$celular."','".$email."',
               '".$sexo."','".$dt_nasc."','".$obs."')";
    
    //Executa o script no BD
    mysqli_query($conexao,$sql);
    
    
    /*
    if($nome=="" || $email=="")
    {
        //echo("<font color='red'>Dados Obrigatórios</font>");
    ?>
        <script>
            alert('Dados Obrigatórios');    
        </script>    
    
    <?php
    }
    */
    
}



?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CRUD-Contatos</title>
    <script type="text/javascript">
        function validar(caracter,blockType,campo)
        {
            
            //Tratamento para verificar por qual navegador esta vindo 
            //o evento, caso seja pelo IE o evento retorna pela 
            //propriedade window.event
            if(window.event)
                {
                    //Transforma em ascii, caso a entrada de dados for pelo IE
                    //var letra=caracter.keyCode;
                    var letra=caracter.charCode;
                                    
                }else
                {
                    //Transforma em ascii, caso a entrada de dados for pelo 
                    //Firefox e chrome
                    var letra=caracter.which;
                }
            
                //Tratamento para verificar qual o tipo de bloqueio
                if (blockType=='number')
                    {
                    //Bloqueio de Numeros de 0 até 9
                    if(letra>=48 && letra<=57)
                        {
                            return false;
                        }
                    }else if (blockType=='caracter')
                    {
                        //Bloqueio de Caracteres
                       if(letra<48 || letra >57)
                           {
                               //Ativar algumas teclas necessárias
                               //traço = 45 , espaço = 32 e backspace = 8
                               if(letra!=45 && letra!=32 && letra!=8)
                                {
                                   //document.getElementById('campo').style="background-color:red;border:10;border-color:blue;";
                                    
                                    document.getElementById(campo).style="background-color:red;border:10;border-color:blue;";
                                       
                                   return false;
                                    
                                }
                           }else
                               {
                                  document.getElementById(campo).style="background-color:#ffffff;";
                                   
                               }
              
                    }
            
            
                
            
        }
    </script>
   
    
    
</head>

<body>

<div id="principal">
	<div id="cabecalho">
		<img src="imagens/mvc.jpg" width="980" height="200">
    </div>

    <div id="content">
    	<div id="cadastro">
        	<!-- 
                placeholder - permite um lembrete na digitação
                required
                type=email - valida a digitação de email
				tel   - valida a digitação de telefone (não suportado nos navegadores)
				number - permite a entra apenas de numeros
				range -  permite a entra apenas de numeros por seleção
				date  -  permitem a entrada de data (não suportado nos navegadores)
				month -  permitem a entrada de data / mes (não suportado nos navegadores)
				week - permitem a entrada de data pela semana
				color - permite a escolha de uma cor na palheta de cores do SO e retorna um hexadecimal
				url - valida a digitação de links válidos
				pattern - permite criar um critério de validação
				ou mascara para a entrada de dados
                     

            -->
            <form name="frmcontatos" method="post" action="cadastro.php">
            
                <table id="tblcadastro">
                  <tr>
                    <td colspan="2" class="titulo_tabela">Cadastro de Contatos</td>
                  </tr>
                  <tr>
                    <td class="tblcadastro_td">Nome:</td>
                    <td><input onkeypress="return validar(event,'number')" placeholder="Digite seu nome"  name="txtnome" pattern="[a-z A-Z ã Ã õ Õ é É ô Ô ç Ç]*" title="Digitação apenas de Letras" type="text" value="" required   /></td>
                  </tr>
                  <tr>
                    <td class="tblcadastro_td">Telefone:</td>
                    <td><input id="telefone" onkeypress="return validar(event,'caracter','telefone')"   name="txttelefone" type="text" value="" /></td>
                  </tr>
                  <tr>
                    <td class="tblcadastro_td">Celular:</td>
                    <td><input id="celular" onkeypress="return validar(event,'caracter','celular')" name="txtcelular" type="text" value="" /></td>
                  </tr>
                  <tr>
                    <td class="tblcadastro_td">Email:</td>
                    <td><input name="txtemail" type="email" value="" required /></td>
                  </tr>
				  <tr>
                    <td class="tblcadastro_td">Data Nascimento:</td>
                    <td><input name="txtdatanasc" type="date" min="2000-01-01" max="2100-12-31" value="" /></td>
                  </tr>
                   <tr>
                    <td class="tblcadastro_td">Sexo:</td>
                    <td>
					<input type="radio" name="rdosexo" value="F" />Feminino
					<input type="radio" name="rdosexo" value="M" />Masculino
					</td>
                  </tr>
				  <tr>
				  
                    <td class="tblcadastro_td">Obs:</td>
                    <td><textarea name="txtobs" cols="20" rows="5">  </textarea></td>
                  </tr>
                  <tr>
                    <td><input name="btnsalvar" type="submit" value="Salvar" /></td>
                    <td><input name="btnlimpar" type="reset" value="Limpar" /></td>
                  </tr>
                </table>
            
            </form>

        </div>
        
           
    </div>
    
    <div id="rodape">
    
    </div>
    
</div>

</body>
</html>



	

