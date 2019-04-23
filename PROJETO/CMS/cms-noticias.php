<?php
    
    require_once('../bd/conexao.php');

    
    
    
    

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            CMS Noticias
        </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div id="box-main" class="center">
            <?php
    
                require_once('cms-menu.php');
    
            ?>
            <div id="conteudo">
                <form name="frm-cms-noticia" method="POST" action="cms-noticia.php">
                    <div class="titulos-cms">
                        <h3>Página Noticia</h3>
                    </div>
                    <div class="conteudo-cms">
                        <div class="container-input">
                            <h4>Noticia em destaque:</h4>
                            <div >
                                <input type="text" class="input-cms-promo" placeholder="Digite o titulo da noticia">
                            </div>
                            <div style="clear:both;">
                                <img src="" class="img-cms-noticias">
                            </div>
                            <div>
                                <input type="file">
                            </div>
                             <div class="nome-produto">
                                <div class="box-rdo">
                                    <input type="radio" name="radio" value="<?php echo($rdoativado) ?>" id="rdo-ativado"><label for="rdo-ativado" required > Ativado</label>
                                </div>
                                <div class="box-rdo">
                                    <input type="radio" name="radio" value="<?php echo($rdodesativado) ?>" id="rdo-desativado"><label for="rdo-desativado" required > Desativado</label>
                                </div>
<!--
                                <div class="box-rdo">
                                    <input type="submit" id="" class="btn-salvar" name="btnsalvar" id="btnsalvar" value="salvar">
                                </div>
-->
                            </div>
                        </div>
                        <div class="container-noticias-corpo">
                            <h4>Noticia em destaque:</h4>
                            <div >
                                <input type="text" class="input-cms-promo" placeholder="Digite o titulo da noticia">
                            </div>
                            <div>
                                <div style="float:left;">
                                    <img src="" width="128px" height="128px" >
                                </div>
                                <div >
                                    <input type="file">
                                </div>
                                
                            </div>
                            <div style="clear:both;">
                                <textarea class="cms-textarea">
                                
                                
                                </textarea>
                            </div>
                             <div class="nome-produto">
                                <div class="box-rdo">
                                    <input type="radio" name="radio" value="<?php echo($rdoativado) ?>" id="rdo-ativado"><label for="rdo-ativado" required > Ativado</label>
                                </div>
                                <div class="box-rdo">
                                    <input type="radio" name="radio" value="<?php echo($rdodesativado) ?>" id="rdo-desativado"><label for="rdo-desativado" required > Desativado</label>
                                </div>
                                <div class="box-rdo">
                                    <input type="submit" id="" class="btn-salvar" name="btnsalvar" id="btnsalvar" value="salvar">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="conteudo-cms">
                        <div id="tbl-promocoes">
                            <div class="cabecalho">
                                <div class="titulos-promo">
                                    Nome produto:
                                </div>
                                <div class="titulos-promo">
                                    Imagem:
                                </div>
                                <div class="titulos-promo">
                                    Preço:
                                </div>
                                <div class="titulos-promo">
                                    Desconto:
                                </div>
                                <div class="titulo-campo-opcoes">
                                    Opções:
                                </div>
                            </div>
                            <?php

                                //TABELA VINDO DIRETO DO BANCO
                                $sql = "SELECT * FROM tbl_produto ORDER BY codigo DESC";

                                $select = mysqli_query($conexao, $sql);

                                while($rscontatos=mysqli_fetch_array($select))
                                {
                            ?>
                            <div class="tbl-dados-db">
                                <div class="campos-tbl-promo">
                                    <?php //echo($rscontatos['nome'])?>	
                                </div>
                                <div class="campos-tbl-promo">
                                    <?php //echo($rscontatos['imagem'])?>	
                                </div>
                                <div class="campos-tbl-promo">
                                    <?php ////echo($rscontatos['preco'])?>
                                </div>
                                <div class="campos-tbl-promo">
                                    <?php //echo($rscontatos['valor_desconto'])?>	
                                </div>
                                <div class="campo-opcoes">
                                    <div class="opcoes-promo">

                                        <a href= "cms-promocoes.php?modo=excluir&id=<?php echo($rscontatos['codigo']);?>&nomefoto=<?php echo($rscontatos['imagem']);?>" onclick="return confirm('Deseja realmente excluir?');">

                                            <input type="image" src="../img/excluir.png" width="24px" height="24px" class="img center"
                                            style="margin-top:2px;">
                                        </a>
                                    </div>
                                    <div class="opcoes-promo">

                                        <a href="cms-promocoes.php?modo=editar&id=<?php echo($rscontatos['codigo']);?>">

                                            <img src="../img/editar24.png" width="20px" height="23px" class="img center" style="margin-top:2px;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            ?>

                        </div>
                    </div>
                </form>
            </div>
            <div id="footer">
                <h3>
                    Desenvolvido por: Rubens Victor
                </h3>
            
            </div>
        </div>
    </body>
</html>