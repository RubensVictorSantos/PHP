<?php

	//ativa o recurso de variavel de sessao
	session_start();

	//declaracao das variaveis utilizadas no modo buscar
	$rdoSexoF = null;
	$rdoSexoM = null;
	$nome = null;
	$endereco = null;
	$bairro = null;
	$cep = null;
	$telefone = null;
	$celular = null;
	$email = null;
	$obs = null;
	$data_nasc = null;
	$botao = "Salvar";

    //conexao com o bd
	require_once('bd/conexao.php');
	$conexao = conexaoMysql();
	//var_dump($conexao);
	
	
	//$modo = $_GET['modo'];
	//$id = $_GET['codigo'];
	
	//acao de excluir e buscar um registro para edição
	//existe a variavel modo?
	if(isset($_GET['modo']))
	{
		//variaveis enviadas pelo href do editar e excluir no html
		$modo = $_GET['modo'];
		$id = $_GET['id'];
		
		
		//guardamos em uma variavel de sessao  codigo do registro que sera atualizado
		//no update
		$_SESSION['idRegistro'] = $id;
		
		//excluir um registro
		if($modo=='excluir')
		{
			$sql = "delete from tbl_contato where codigo=".$id;
			mysqli_query($conexao, $sql);
		
		//carrega os dados na tela
		//buscar o registro a ser atualizado	
		}elseif($modo=='buscar')
		{
			$sql = "select * from tblcontatos where codigo=".$id;
			$select = mysqli_query($conexao, $sql);
			
			if($rscontato = mysqli_fetch_array($select))
			{
				$nome = $rscontato['nome'];
				$endereco = $rscontato['endereco'];
				$bairro = $rscontato['bairro'];
				$cep = $rscontato['cep'];
				$telefone = $rscontato['telefone'];
				$celular = $rscontato['celular'];
				$email = $rscontato['email'];
				
				//formata a data do padrao americano para o brasileiro
				$data_nasc = explode("-", $rscontato['data_nasc']);
				$data_nasc = $data_nasc[2]. "/".$data_nasc[1]. "/".$data_nasc[0];
				
				if($rscontato['sexo'] == "F")
					$rdoSexoF = "checked";
				else
					$rdoSexoM = "checked";
				
				$obs = $rscontato['obs'];
				
				$botao = "Editar";
				
			}
		}
	}
	
	
	//acao de inserir um novo registro
	if(isset($_POST['btnSalvar']))
	{
		
		$nome = $_POST['txtnome'];
		$endereco = $_POST['txtendereco'];
		$bairro = $_POST['txtbairro'];
		$cep = $_POST['txtcep'];
		$telefone = $_POST['txttelefone'];
		$celular = $_POST['txtcelular'];
		$email = $_POST['txtemail'];
		$dtnascimento= explode("/",$_POST['txtdtnascimento']);
		//var_dump($dtnascimento);
		$dt_nasc = $dtnascimento[2]."-".$dtnascimento[1]."-".$dtnascimento[0];
		//explode busca um caractere padrao na string e automaticamente
		//quebra a sua string em vetor, colocando cada informacao
		//encontrada em um indice
		$radio= $_POST['rdo'];
		$obs = $_POST['obs'];

		
		if($_POST['btnSalvar'] == "Salvar")
		
		$sql = "insert into tbl_contato 
			(
			nome, endereco, bairro, cep, telefone,
			celular, email, data_nasc, sexo, obs
			)
			
			
			values
			(
			
			'".$nome."','".$endereco."','".$bairro."',
			'".$cep."','".$telefone."','".$celular."',
			'".$email."','".$dt_nasc."','".$radio."','".$obs."'
			
			)
			
		";
		
		elseif($_POST['btnSalvar']=="Editar")
			$sql="update tblcontatos set nome='".$nome."',
									endereco='".$endereco."',
									bairro='".$bairro."',
									cep='".$cep."',
									telefone='".$telefone."',
									celular='".$celular."',
									email='".$email."',
									sexo='".$radio."',
                                    data_nasc='".$dt_nasc."',
									obs='".$obs."'
									
							
							where codigo =".$_SESSION['idRegistro'];
							; 
		
		//echo($sql);
		
		//passar o script para o banco
		//primeiro a variavel de conexao, dps a sql
		//mysqli_query($conexao, $sql);
		
		if(mysqli_query($conexao, $sql))
		//redireciona o usuario para uma nova pagina e nao gravar
		//varias vezes no banco  a mesma coisa
		header('location:index.php');
			else
		echo("<script>alert('erro no cadastro')</script>");		
	}
	


?>

<!doctype html>
<html lang="pt-br">
    <head>
        <title>
            Aula HTML 5
        </title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
		<script src="js/jquery.js"></script>
		
		<!-- $ significa jQuery, nao estamos programando em javaScript mas sim em jQuery
			document = area do navegador 
			ready = evento de abertura do navegador
			fazer isso sempre que eu for precisar usar qualquer funçao do jQuery-->
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
                    //a div(#modal) receber� os dados do html
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
			<div id="modal">
			</div>
		</div>
        <header class="center">
			cadastro de contatos
        </header>
		<!--
		
		required - tratamento para obrigar o usuario a fornecer um dado, caso o campo seja obrigatorio
		placeholder - coloca uma mensagem informativa na caixa de texto
		
		pattern - permite criar uma expressao regular para validacao e mascara dos dados
		ex.: pattern="[0-9]{2} [0-9]{4}-[0-9]{4}" -> mascara para o padrao do telefone
		pattern="[a-z A-Z]*" -> restring a entrada dos numeros
		
		
		type da input = text, tel, email, url, number(min e max, podem ser cofigurados como parametro), range, 
		***cuidado(date, month, week)nao funciona em todos os navegadores***
		color
		
		INSERT
		aspas duplas = aspas normais de qualquer string
		aspas simples = aspas do banco
		as unicas coisas fora das aspas duplas, sao as variaveis
		as variaveis STRING estao dentro das aspas simples que sao nativas do banco
		se as variaveis fossem do tipo int, nao precisaria das aspas simples porque no banco
		variaveis do tipo inteiro nao precisam de aspas
		
		ano/mes/dia = formato de data do banco
		
		explode = separa o conteudo por indice se orientando por "/"(barras)
		-->
		<div id="caixa_conteudo" class="center">
			<div id="txts"><br>
				<label class="txt01">Nome:
					<!---->
				</label><br><br>
				<label class="txt01">Endereço:
					<!---->
				</label><br><br>
				<label class="txt01">Bairro:
					<!---->
				</label><br><br>
				<label class="txt01">Cep:
					<!---->
				</label><br><br>
				<label class="txt01">Telefone:
					<!---->
				</label><br><br>
				<label class="txt01">Celular:
					<!---->
				</label><br><br>
				<label class="txt01">Email:
					<!---->
				</label><br><br>
				<label class="txt01">Dt. Nasc:
					<!---->
				</label><br><br>
				<label class="txt01">Sexo:
					
				</label><br><br>
				<label class="txt01">Obs.:
					
				</label><br><br>
			</div>
			<form name="frmCadastro" method="post" action="index.php"><br>
				<div id="preencher">
					<input type="text" name="txtnome" onkeypress="" value="<?php echo($nome)?>" placeholder="digite seu nome"><br><br>
					<input type="text" name="txtendereco" onkeypress="" value="<?php echo($endereco)?>"><br><br>
					<input type="text" name="txtbairro" onkeypress="" value="<?php echo($bairro)?>"><br><br>
					<input type="text" name="txtcep" onkeypress="" value="<?php echo($cep)?>"><br><br>
					<input type="text" name="txttelefone" onkeypress="" value="<?php echo($telefone)?>" placeholder="00 0000-0000"><br><br>
					<input type="text" name="txtcelular" onkeypress="" value="<?php echo($celular)?>"><br><br>
					<input type="text" name="txtemail" onkeypress="" value="<?php echo($email)?>"><br><br>
					<input type="text" name="txtdtnascimento" onkeypress="" value="<?php echo($data_nasc)?>"><br><br>
					<input type="radio" name="rdo" value="f" <?php echo($rdoSexoF)?> /><b>Feminino</b>
					<input type="radio" name="rdo" value="m" <?php echo($rdoSexoM)?> /><b>Masculino</b><br><br>
					<textarea name="obs"><?php echo($obs)?></textarea><br><br>
					<input type="submit" name="btnSalvar" value="<?php echo($botao)?>">
					<input type="submit" name="btnLimpar" value="LIMPAR">					
				</div>
			</form>
		</div>
		<!-- tabela principal -->
		<table width="700" height="200" border="1" align="center" cellspacing="0" cellpadding="0">
			<tr>
				<td>
				<!-- estrutura de cabecalho e conteudo-->
					<table width="100%" height="100%" border="1" align="center" cellspacing="0" cellpadding="0">
						<tr>
							<td><!-- cabecalho -->
								<table width="100%" height="100%" border="1" align="center" cellspacing="0" cellpadding="0">
									<tr height="20%">
										<td align="center" width="100%">
											<b>Consulta de contatos</b>
										</td>
									</tr>
									<tr height="30%">
										<td width="100%">
											<table width="100%" height="100%" border="1" align="center" cellspacing="0" cellpadding="0">
												<tr>
													<td align="center" width="20%">
														<b>Nome:</b>
													</td>
													<td align="center" width="20%">
														<b>Telefone:</b>
													</td>
													<td align="center" width="20%">
														<b>Celular:</b>
													</td>
													<td align="center" width="20%">
														<b>E-mail:</b>
													</td>
													<td align="center" width="20%">
														<b>Opções:</b>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr height="25%">
										<td align="center" width="100%">
											<table width="100%" height="100%" border="1" align="center" cellspacing="0" cellpadding="0">
												<tr>
													<td align="center" width="20%">
														
													</td>
													<td align="center" width="20%">
														
													</td>
													<td align="center" width="20%">
														
													</td>
													<td align="center" width="20%">
														
													</td>
													<td align="center" width="20%">
														
													</td>
												</tr>
												<?php
										
													$sql = "select * from tblcontatos order by codigo desc";
													
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
											</table>
										</td>
									</tr>
									<tr height="25%">
										<td align="center" width="100%">
											<table width="100%" height="100%" border="1" align="center" cellspacing="0" cellpadding="0">
												<tr>
													<td align="center" width="20%">
													<!--colocar o campo do banco de dados, exatamente como esta escrito l�-->
													<?php echo($rscontatos['nome'])?>	
													</td>
													<td align="center" width="20%">
													<?php echo($rscontatos['telefone'])?>	
													</td>
													<td align="center" width="20%">
													<?php echo($rscontatos['celular'])?>
													</td>
													<td align="center" width="20%">
													<?php echo($rscontatos['email'])?>	
													</td>
													<td align="center" width="20%">
													<table width="100%" height="100%" border="1" align="center" cellspacing="0" cellpadding="0">
													<tr>
														<td width="33%">
														<!-- fazendo na mao o mesmo que o metodo get faz.
														Caso houver erro, ele aparece no link ao passar do mouse no icone-->
														<a href= "index.php?modo=excluir&id=<?php echo($rscontatos['codigo']);?>" onclick="return confirm('Deseja realmente excluir?');">
														<img src="img/excluir.png" width="24" height="24" class="img">
														</a>
														</td>
														<td width="33%">
														<a href="index.php?modo=buscar&id=<?php echo($rscontatos['codigo']);?>">
														<img src="img/editar24.png" width="24" height="24" class="img">
														</a>
														</td>
														<td width="33%">
														<img class="visualizar" onclick="visualizarDados(<?php echo($rscontatos['codigo']);?>);" src="img/pesquisar.png" width="24" height="20" class="img">
														</td>
													</tr>
													</table>
													</td>
												</tr>
												<?php
													}
												?>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>