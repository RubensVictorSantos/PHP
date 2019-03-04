<?php

    require_once('menu.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <tilulo>Fale conosco</tilulo>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div id="conteudo" class="center">
             <form class="center" id="form-fale-conosco" name="frmfale-conosco" method="POST" action="fale-conosco.php">
                 <div id="titulo-cadastro" class="center">
                    <h1>
                        CADASTRE-SE
                    </h1>
                </div>
                <div class="box_campos">
                    <div class="box-label">
                        <label for="nome">
                            Nome*:
                        </label>
                    </div>
                    <div class="box-text-cad">
                        <input type="text" name="txtnome" >
                    </div>
                </div>
                <div class="box_campos">
                    <div class="box-label">
                        <label >
                            Telefone:
                        </label>
                    </div>
                    <div class="box-text-cad">
                        <input type="text" name="txtendereco" >
                    </div>
                </div>
                <div class="box_campos">
                    <div class="box-label">
                        <label>
                            Celular*:
                        </label>
                    </div>
                    <div class="box-text-cad">
                        <input type="text" name="txtbairro" >
                    </div>
                </div>
                <div class="box_campos">
                    <div class="box-label">
                        <label>
                            Email*:
                        </label>
                    </div>
                    <div class="box-text-cad">
                        <input type="text" name="txtcep" >
                    </div>
                </div>
                <div class="box_campos">
                    <div class="box-label">
                        <label>
                            Home Page:
                        </label>
                    </div>
                    <div class="box-text-cad">
                        <input type="text" name="txttel" >
                    </div>    
                </div>
                <div class="box_campos">
                    <div class="box-label">
                        <label>
                            Link no Facebook:
                        </label>
                    </div>
                    <div class="box-text-cad">
                        <input type="text" name="txtcel" >
                    </div>
                </div>
                <div class="campo-obs">
                    <div class="box-label">
                        <label>
                            Sugestões:
                        </label>
                    </div>
                    <div>
                        <textarea name="txtobs"></textarea>
                    </div>
                </div>
                <div class="box_campos">
                    <div class="box-label">
                        <label>
                            Email:
                        </label>
                    </div>
                    <div class="box-text-cad">
                        <input type="email" name="txtemail" >
                    </div>
                </div>
                <div class="box_campos">
                    <div class="box-label">
                        <label>
                            Sexo:
                        </label>
                    </div>
                    <div style="padding:15px;" >
                        <input type="radio" name="radio" value="masc">
                        <input type="radio" name="radio" value="fem">
                    </div>
                </div>
                <div class="box_campos">
                    <div class="box-label">
                        <label>    
                            Data nasc.:
                        </label>
                    </div>
                    <div class="box-text-cad">
                        <input type="text" name="txtdtnasc">
                    </div>
                </div>
                <div id="box-buttons">
                    <div class="box-btn">
                        <input type="submit" name="btnsalvar" id="btnsalvar" value="salvar">
                    </div>
                    <div class="box-btn">
                        <input  type="button" value="sair">
                    </div>
                </div>
            </form> 
        </div>
        <?php
            require_once('footer.php');
        ?>
    </body>
</html>