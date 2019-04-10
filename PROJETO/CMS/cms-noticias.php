<?php
    
    require_once('../bd/conexao.php');

    
    
    
    

?>
<head>
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
                            <h4>Noticia em destaque 1:</h4>
                            <div style="float:left;">
                                <p>
                                    <label for="">Digite o titulo da noticia:</label>
                                </p>
                            </div>
                            <div >
                                <input type="text">
                            </div>
                            <div style="clear:both;">
                                <img src="" class="img-cms-noticias">
                            </div>
                            <div>
                                <input type="file">
                            </div>
                        </div>
                        <div class="container-input">
                            <h4>Noticia em destaque 2:</h4>
                            <div style="float:left;">
                                <p>
                                    <label for="">Digite o titulo da noticia:</label>
                                </p>
                            </div>
                            <div>
                                <input type="text">
                            </div>
                            <div style="clear:both;">
                                <img src="" class="img-cms-noticias">
                            </div>
                            <div>
                                <input type="file">
                            </div>
                        </div>
                        <div class="container-input">
                            <h4>Noticia em destaque 3:</h4>
                            <div style="float:left;">
                                <p>
                                    <label for="">Digite o titulo da noticia:</label>
                                </p>
                            </div>
                            <div>
                                <input type="text">
                            </div>
                            <div style="clear:both;">
                                <img src="" class="img-cms-noticias">
                            </div>
                            <div>
                                <input type="file">
                            </div>
                        </div>
                    </div>
                    <div class="conteudo-cms">
                        
                        <div class="">
                            <h4>Noticia em destaque 1:</h4>
                            <div style="float:left;">
                                <p>
                                    <label for="">Digite o titulo da noticia:</label>
                                </p>
                            </div>
                            <div >
                                <input type="text">
                            </div>
                            <div style="clear:both;">
                                <img src="" width="128px" height="128px">
                                <textarea></textarea>
                            </div>
                            <div>
                                <input type="file">
                            </div>
                        </div>
                        <div class="">
                            <h4>Noticia em destaque 2:</h4>
                            <div style="float:left;">
                                <p>
                                    <label for="">Digite o titulo da noticia:</label>
                                </p>
                            </div>
                            <div>
                                <input type="text">
                            </div>
                            <div style="clear:both;">
                                <img src="" width="128px" height="128px">
                                <textarea></textarea>
                            </div>
                            <div>
                                <input type="file">
                            </div>
                        </div>
                        <div class="">
                            <h4>Noticia em destaque 3:</h4>
                            <div style="float:left;">
                                <p>
                                    <label for="">Digite o titulo da noticia:</label>
                                </p>
                            </div>
                            <div>
                                <input type="text">
                            </div>
                            <div style="clear:both;">
                                <img src="" width="128px" height="128px">
                                <textarea></textarea>
                            </div>
                            <div>
                                <input type="file">
                            </div>
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
</head>