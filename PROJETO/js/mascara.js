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
    
    const txtCelular = document.getElementById("celular");
    const txtTelefone = document.getElementById("telefone");
               
    const mascTelefone = () =>{
        let texto = txtTelefone.value;

        texto = texto.replace(/[^0-9]/g,"");
        texto = texto.replace(/(^.)/,"($1");
        texto = texto.replace(/^(.{3})/,"$1) ");
        texto = texto.replace(/^(.{9})/,"$1-");
        txtTelefone.value = texto;
    }
    
    const mascCelular = () =>{
    let texto = txtCelular.value;

        texto = texto.replace(/[^0-9]/g,"");
        texto = texto.replace(/(^.)/,"($1");
        texto = texto.replace(/^(.{3})/,"$1) ");
        texto = texto.replace(/^(.{10})/,"$1-");
        txtCelular.value = texto;
    }
    
    txtCelular.addEventListener("keyup", mascCelular);
    txtTelefone.addEventListener("keyup", mascTelefone);
    
    //Tratamento para verificar qual o tipo de bloqueio
    if(blockType=='number'){

        //Bloqueio de Numeros de 0 até 9 e outros caracteres
        if(letra>=33 && letra<=64){
            
            return false;
        }

    }else if (blockType=='caracter'){
        //Bloqueio de Caracteres
       if(letra<48 || letra >57){

           //Ativar algumas teclas necessárias
           //traço = 45 , espaço = 32 e backspace = 8
           if(letra!=45 && letra!=32 && letra!=8 && letra!=40 && letra!=41 ){

               document.getElementById(campo).style="background-color:#ffeeee;border:10;border-color:#ff9999;";

               return false;

           }else{
               
               document.getElementById(campo).style="background-color:#ffffff;";        
           }
       }
    }
}