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
<<<<<<< HEAD
            <form name="frmfale-conosco" method="POST" action="fale-conosco.php">
                <div id="main-fale-conosco" class="center">
                    <div id="titulo-cadastro" class="center">
                        <h1>
                            CADASTRE-SE
                        </h1>
                    </div>
                    <div class="box_campos"  >
                        <div class="box-label">
                            <label for="nome">
                                Nome*:
                            </label>
                        </div>
                    <div class="box-text-cad">
                        <input class="input-fale-conosco" type="text" name="txtnome" >
                    </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label >
                                Telefone:
                            </label>
                        </div>
                    <div class="box-text-cad">
                        <input class="input-fale-conosco" type="text" name="txtendereco" >
                    </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label>
                                Celular*:
                            </label>
                        </div>
                    <div class="box-text-cad">
                        <input class="input-fale-conosco" type="text" name="txtbairro" >
                    </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label>
                                Email*:
                            </label>
                        </div>
                    <div class="box-text-cad">
                        <input class="input-fale-conosco" type="text" name="txtcep" >
                    </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label>
                                Home Page:
                            </label>
                        </div>
                    <div class="box-text-cad">
                        <input class="input-fale-conosco" type="text" name="txttel" >
                    </div>    
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label>
                                Facebook:
                            </label>
                        </div>
                    <div class="box-text-cad">
                        <input class="input-fale-conosco" type="text" name="txtcel" >
                    </div>
                    </div>
                    <div class="campo-obs">
                        <div class="box-label">
                            <label>
                                Sugestões:
                            </label>
                        </div>
                    <div id="box-textarea" >
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
                        <input class="input-fale-conosco" type="email" name="txtemail" >
                    </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label>
                                Sexo:
                            </label>
                        </div>
                    <div class="box-text-cad" style="padding:15px;" >
                        <label>
                            <input type="radio" name="radio" value="masc">Masculino 
                        </label>
                        <label>
                            <input type="radio" name="radio" value="fem">Feminino
                        </label>
                    </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label">
                            <label>    
                                Data nasc.:
                            </label>
                        </div>
                    <div class="box-text-cad">
                        <input class="input-fale-conosco" type="text" name="txtdtnasc">
                    </div>
                    </div>
                    <div class="box_campos">
                        <div class="box-label" >

                        </div>
                        <div id="box-buttons">
                            <div class="box-btn">
                                <input type="submit" class="btn-fale-conosco" name="btnsalvar" id="btnsalvar" value="salvar">
                            </div>
                            <div class="box-btn">
                                <input  type="button" class="btn-fale-conosco" value="sair">
                            </div>
                        </div>
=======
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
>>>>>>> e4f2422ae794b34d5f3932d327d828dd8104c44d
                    </div>
                </div>
            </form> 
        </div>
        <?php
            require_once('footer.php');
        ?>
    </body>
</html>