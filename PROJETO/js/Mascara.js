const txtNome = document.getElementById("nome");
const txtCelular = document.getElementById("celular");
const txtTelefone = document.getElementById("telefone");

const celularValido = (celular) =>{
	const er = /[(][0-9]{2}[)] ?9[0-9]{4}-[0-9]{4}/
	
	return er.test(celular);
}

const telefoneValido = (telefone) =>{
	const er = /[(][0-9]{2}[)] ?9[0-9]{5}-[0-9]{4}/
	
	return er.test(celular);
}

const mascNome = () =>{
	let texto = txtNome.value;
	
	texto = texto.replace((/[^a-zA-Z À-Ÿ]/),"");
	
	txtNome.value = texto;
}


const mascCelular = () =>{
	let texto = txtCelular.value;
	
	texto = texto.replace(/[^0-9]/g,"");
	texto = texto.replace(/(^.)/,"($1");
	texto = texto.replace(/^(.{3})/,"$1) ");
	texto = texto.replace(/^(.{9})/,"$1-");
	txtCelular.value = texto;
}

const mascTelefone = () =>{
	let texto = txtTelefone.value;
	
	texto = texto.replace(/[^0-9]/g,"");
	texto = texto.replace(/(^.)/,"($1");
	texto = texto.replace(/^(.{3})/,"$1) ");
	texto = texto.replace(/^(.{10})/,"$1-");
	txtTelefone.value = texto;
}

txtNome.addEventListener("keyup", mascNome);
txtCelular.addEventListener("keyup", mascCelular);
txtTelefone.addEventListener("keyup", mascTelefone);