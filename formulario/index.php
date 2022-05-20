<?php

//Ativa o recurso de variável de sessão
session_start();

//Declaração das variaveis utilizadas no modo buscar
$rdoSexoF = null;
$rdoSexoM = null;
$nome = "";
$endereco = null;
$bairro = null;
$cep = null;
$telefone = null;
$celular = null;
$email = null;
$obs = null;
$data_nasc = null;
$dt_nasc = null;
$botao = "Salvar";
$sql = null;

//Conexão com o banco de dados
require_once('bd/conexao.php');
$conexao = conexaoMysql();

//Ação de excluir e buscar um registro para edição
//existe a variavel modo?
if (isset($_GET['modo'])) {
	//variaveis enviadas pelo href do editar e excluir no html
	$modo = $_GET['modo'];
	$id = $_GET['id'];

	//guardamos em uma variavel de sessao  codigo do registro que sera atualizado
	//no update
	$_SESSION['idRegistro'] = $id;

	//excluir um registro
	if ($modo == 'excluir') {
		$sql = "delete from tblcontatos where codigo=" . $id;
		mysqli_query($conexao, $sql);

		//carrega os dados na tela
		//buscar o registro a ser atualizado	
	} elseif ($modo == 'buscar') {
		$sql = "select * from tblcontatos where codigo=" . $id;
		$select = mysqli_query($conexao, $sql);

		if ($rscontato = mysqli_fetch_array($select)) {
			$nome = $rscontato['nome'];
			$endereco = $rscontato['endereco'];
			$bairro = $rscontato['bairro'];
			$cep = $rscontato['cep'];
			$telefone = $rscontato['telefone'];
			$celular = $rscontato['celular'];
			$email = $rscontato['email'];

			//formata a data do padrao americano para o brasileiro

			$data_nasc = explode("-", $rscontato['data_nasc']);
			$dt_nasc = $data_nasc[2] . "/" . $data_nasc[1] . "/" . $data_nasc[0];

			if ($rscontato['sexo'] == "F")
				$rdoSexoF = "checked";
			else
				$rdoSexoM = "checked";

			$obs = $rscontato['obs'];

			$botao = "Editar";
		}
	}
}

//Ação de inserir um novo registro
if (isset($_POST['btnSalvar'])) {

	$nome = $_POST['txtnome'];
	$endereco = $_POST['txtendereco'];
	$bairro = $_POST['txtbairro'];
	$cep = $_POST['txtcep'];
	$telefone = $_POST['txttelefone'];
	$celular = $_POST['txtcelular'];
	$email = $_POST['txtemail'];
	$data_nasc = $_POST['txtdtnascimento'];
	$radio = $_POST['rdo'];
	$obs = $_POST['obs'];


	if ($_POST['btnSalvar'] == "Salvar")

		$sql = "insert into tblcontatos
			(
			nome, endereco, bairro, cep, telefone,
			celular, email, data_nasc, sexo, obs
			)
			values
			(
			'" . $nome . "','" . $endereco . "','" . $bairro . "',
			'" . $cep . "','" . $telefone . "','" . $celular . "',
			'" . $email . "','" . $data_nasc . "','" . $radio . "','" . $obs . "'
			)
			
		";

	elseif ($_POST['btnSalvar'] == "Editar")
		$sql = "update tblcontatos set nome='" . $nome . "',
            
            endereco='" . $endereco . "',
									bairro='" . $bairro . "',
									cep='" . $cep . "',
									telefone='" . $telefone . "',
									celular='" . $celular . "',
									email='" . $email . "',
									sexo='" . $radio . "',
                                    data_nasc='" . $dt_nasc . "',
									obs='" . $obs . "'
									
							
							where codigo =" . $_SESSION['idRegistro'];

	//passar o script para o banco
	//primeiro a variavel de conexao, dps a sql
	//mysqli_query($conexao, $sql);

	if (mysqli_query($conexao, $sql)) {
		//redireciona o usuario para uma nova pagina e nao gravar
		//varias vezes no banco a mesma coisa
		header('location:index.php');
	} else {
		$error = mysqli_error($conexao);
		modalAlert($error);
		// header('location:index.php');

	}
}

function modalAlert($message, $typeError = "")
{
	?>
		<div class="modal-alert" id="modal" data-toggle-modal="true">	
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
				<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
			</svg>
			<h5><?php echo ($message); ?></h5>
			<span></span>
		</div>

<?php
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
		const filterInput = (e) => {
			let type = e.type
			let char = ""

			switch (type) {
				case "tel":

					let str = e.value;
					let teste = "";

					for (var i = 0; i < str.length; i++) {
						teste = teste + str[i].replace(/\D/, "");
					}

					e.value = teste;

					break;

				default:
					break;
			}
		}

		$(document).ready(function() {
			$('.visualizar').click(function() {
				jQuery('#container-modal').fadeIn(400);
			});

			console.log($('.modal-alert').attr('data-toggle-modal'));
		});

		function visualizarDados(idItem) {
			$.ajax({
				//metodo
				type: "GET",
				//pagina que sera descarregada a informacao
				url: "modal.php",
				//e o parametro de informacao
				data: {
					codigo: idItem
				},
				//havendo sucesso na requisicao dos dados
				//descarregamos o resultado da modal, dentro da div modal
				//a div(#modal) receber� os dados do html
				success: function(dados) {
					$('#modal').html(dados);
					//alert(dados); alert para trazer o html caso tenha erros(comentar a linha de cima)
				}
			});
		}
	</script>
</head>

<body>
	<div class="container-modal" id="container-modal">
		<div class="modal" id="modal">
		</div>
	</div>
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
	<main class="main-content" id="caixa_conteudo">
		<!-- seção cadastro -->
		<section class="container-cadastro">
			<header>
				Cadastro de contatos
			</header>
			<form name="frmCadastro" method="post" action="index.php">
				<div class="form-inputs-field">
					<!-- Input txt_nome -->
					<div class="field-input">
						<input type="text" name="txtnome" id="txt_nome" value="<?php echo ($nome); ?>" required />
						<label for="txt_nome" class="form-lbl"><span>Nome</span></label>
					</div>

					<!-- Input txt_endereco -->
					<div class="field-input">
						<input type="text" id="txt_endereco" name="txtendereco" onkeypress="" value="<?php echo ($endereco) ?>" required />
						<label for="txt_endereco" class="form-lbl"><span>Endereço</span></label>
					</div>

					<!-- Input txt_bairro -->
					<div class="field-input">
						<input type="text" id="txt_bairro" name="txtbairro" onkeypress="" value="<?php echo ($bairro) ?>" required />
						<label for="txt_bairro" class="form-lbl"><span>Bairro</span></label>
					</div>

					<!-- Input txt_cep -->
					<div class="field-input">
						<input type="text" id="txt_cep" name="txtcep" onkeypress="" placeholder="00000-000" value="<?php echo ($cep) ?>" required />
						<label for="txt_cep" class="form-lbl"><span>Cep</span></label>
					</div>

					<!-- pattern="[0-9]{2}[0-9]{4}[0-9]{4}" -->
					<!-- Input txt_telefone -->
					<div class="field-input">
						<input type="tel" id="txt_telefone" name="txttelefone" onkeyup="filterInput(this)" placeholder="" maxlength="13" value="<?php echo ($telefone) ?>" required />
						<label for="txt_telefone" class="form-lbl"><span>Telefone</span></label>
					</div>

					<!-- Input txt_celular -->
					<div class="field-input">
						<input type="text" id="txt_celular" name="txtcelular" onkeypress="" value="<?php echo ($celular) ?>" required />
						<label for="txt_celular" class="form-lbl"><span>Celular</span></label>
					</div>

					<!-- Input txt_email -->
					<div class="field-input">
						<input type="email" name="txtemail" onkeypress="" value="<?php echo ($email) ?>" required />
						<label class="form-lbl"><span>Email</span></label>
					</div>

					<!-- Input dt_nascimento -->
					<div class="field-input">
						<input type="date" id="dt_nascimento" name="txtdtnascimento" onkeypress="" required />
						<label for="dt_nascimento" class="form-lbl"><span> Data Nascimento </span></label>
					</div>

					<!-- Textarea txta_observacao -->
					<div class="field-input">
						<label class=""><span>Observações</span></label>
						<textarea name="obs" class="default-scroll"><?php echo ($obs) ?></textarea>
					</div>

					<!-- Input rdo_sexo -->
					<div class="">
						<span>Gênero</span>
						<div class="field-radio">

							<!-- Radio feminino -->
							<div>
								<input type="radio" id="rdo_feminino" name="rdo" value="f" <?php echo ($rdoSexoF) ?> />
								<label for="rdo_feminino" class="">Fem</label>
							</div>

							<!-- Radio masculino -->
							<div>
								<input type="radio" id="rdo_masculino" name="rdo" value="m" <?php echo ($rdoSexoM) ?> />
								<label for="rdo_masculino" class="">Masc</label>
							</div>

							<!-- Radio outros -->
							<div>
								<input type="radio" id="rdo_outros" name="rdo" value="o" />
								<label for="rdo_outros" class="">Outros</label>
							</div>
						</div>

					</div>
				</div>

				<div class="form-submit">
					<input type="submit" name="btnSalvar" value="<?php echo ($botao) ?>">
					<input type="submit" name="btnLimpar" value="limpar">
				</div>
			</form>
		</section>
		<!-- seção consulta -->
		<section class="container-consulta">
			<header>
				Consulta de contatos
			</header>
			<main class="tb-container default-scroll">
				<table width="100%" height="100%" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th width="20%">
								Nome
							</th>
							<th width="20%">
								Telefone
							</th>
							<th width="20%">
								Celular
							</th>
							<th width="20%">
								E-mail
							</th>
							<th width="20%">
								Opções
							</th>
						</tr>
					</thead>
					<tbody>
						<?php

						$sql = "select * from tblcontatos order by codigo desc";

						//select retorna dados, por isso precisamos de uma variavel
						//guarda o retorno do bd em uma variavel local
						$select = mysqli_query($conexao, $sql);

						//rs = recod set, retorna os dados do banco
						//mysql_fetch_array transforma uma lista de retorno do banco de dados
						//de dados em uma matriz de dados
						//no caso o select, e guarda na variavel rscontatos
						while ($rscontatos = mysqli_fetch_array($select)) {

						?>
							<tr class="row">
								<td width="20%">
									<!--colocar o campo do banco de dados, exatamente como esta escrito l�-->
									<?php echo ($rscontatos['nome']) ?>
								</td>
								<td width="20%">
									<?php echo ($rscontatos['telefone']) ?>
								</td>
								<td width="20%">
									<?php echo ($rscontatos['celular']) ?>
								</td>
								<td width="20%">
									<?php echo ($rscontatos['email']) ?>
								</td>
								<td width="20%">
									<table width="100%" height="100%" cellspacing="0" cellpadding="0">
										<tr>
											<td width="33%">
												<!-- fazendo na mao o mesmo que o metodo get faz.
														Caso houver erro, ele aparece no link ao passar do mouse no icone-->
												<a href="index.php?modo=excluir&id=<?php echo ($rscontatos['codigo']); ?>" onclick="return confirm('Deseja realmente excluir?');">
													<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-trash-fill img" viewBox="0 0 16 16">
														<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
													</svg>
												</a>
											</td>
											<td width="33%">
												<a href="index.php?modo=buscar&id=<?php echo ($rscontatos['codigo']); ?>">
													<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-pencil-square img" viewBox="0 0 16 16">
														<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
														<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
													</svg>
												</a>
											</td>
											<td width="33%">
												<svg xmlns="http://www.w3.org/2000/svg" onclick="visualizarDados(<?php echo ($rscontatos['codigo']); ?>);" fill="currentColor" class="bi bi-search visualizar img" viewBox="0 0 16 16">
													<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
												</svg>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</main>
		</section>
	</main>
</body>

</html>