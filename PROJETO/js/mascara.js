const txtNome = document.getElementById("nome");
const txtCelular = document.getElementById("celular");
const txtTelefone = document.getElementById("telefone");

const celularValido = (celular) =>{
	const er = /[(][0-9]{2}[)] ?9[0-9]{4}-[0-9]{4}/
	
	return er.test(celular);
}

const telefoneValido = (telefone) =>{
	const er = /[(][0-9]{2}[)] ?9[0-9]{4}-[0-9]{4}/
	
	return er.test(telefone);
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
	texto = texto.replace(/^(.{10})/,"$1-");
	txtCelular.value = texto;
}

const mascTelefone = () =>{
	let texto = txtTelefone.value;
	
	texto = texto.replace(/[^0-9]/g,"");
	texto = texto.replace(/(^.)/,"($1");
	texto = texto.replace(/^(.{3})/,"$1) ");
	texto = texto.replace(/^(.{9})/,"$1-");
	txtTelefone.value = texto;
}

txtNome.addEventListener("keyup", mascNome);
txtCelular.addEventListener("keyup", mascCelular);
txtTelefone.addEventListener("keyup", mascTelefone);

function validar(caracter,blockType,campo){

    /*Tratamento para verificar por qual navegador esta vindo 
    o evento, caso seja pelo IE o evento retorna pela 
    propriedade window.event*/
    if(window.event){
        //Transforma em ascii, caso a entrada de dados for pelo IE
        //var letra=caracter.keyCode;
        var letra=caracter.charCode;

    }else{
        //Transforma em ascii, caso a entrada de dados for pelo 
        //Firefox e chrome
        var letra=caracter.which;
    }

    //Tratamento para verificar qual o tipo de bloqueio
    if(blockType=='number'){

        //Bloqueio de Numeros de 0 até 9
        if(letra>=48 && letra<=57){
            return false;
        }

    }else if (blockType=='caracter'){
        //Bloqueio de Caracteres
       if(letra<48 || letra >57){

           //Ativar algumas teclas necessárias
           //traço = 45 , espaço = 32 e backspace = 8
           if(letra!=45 && letra!=32 && letra!=8){

               //document.getElementById('campo').style="background-color:red;border:10;border-color:blue;";

//                                document.getElementById(campo).style="background-color:red;border:10;border-color:blue;";

               return false;

           }else{

//                                document.getElementById(campo).style="background-color:#ffffff;";        
           }
       }
    }
}