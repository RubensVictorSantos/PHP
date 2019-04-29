<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            CMS
        </title>
        <link rel="icon" href="../img/ico/">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div id="box-main" class="center">
            
            <?php
    
                require_once('cms-menu.php');
    
            ?>
            
            <div id="conteudo">
                <div class="container-conteudo-cms">
                    <div class="option-conteudo">
                        <a href="cms-noticias.php">
                            <div class="conteudo-img">
                                <img src="../img/ico/icon-cms/newspaper%20(3).png" id="" class="img-cms">
                            </div>
                            <div class="text-conteudo">
                                <label>
                                    <p>
                                        Gerienciar página Noticias
                                    </p>
                                </label>

                            </div>
                        </a>
                    </div>
                    <div class="option-conteudo">
                        <a href="cms-promocoes.php">
                            <div class="conteudo-img">
                                <img src="../img/ico/icon-cms/offer.png" id="" type="image" class="img-cms">
                            </div>
                            <div class="text-conteudo">
                                <label>
                                    <p>
                                        Gerenciar página Promoções
                                    </p>
                                </label>

                            </div>
                        </a>
                    </div>
                    <div class="option-conteudo">
                        <a href="cms-eventos.php">
                            <div class="conteudo-img">
                                    <img src="../img/ico/icon-cms/calendar.png" id="" type="image" class="img-cms">

                            </div>
                            <div class="text-conteudo">
                                <label>
                                    <p>
                                        Gerenciar página Eventos
                                    </p>
                                </label>

                            </div>
                        </a>
                    </div>
                    <div class="option-conteudo">
                        <a href="cms-sobre.php">
                            <div class="conteudo-img">
                                <img src="../img/ico/icon-cms/help.png" id="" type="image" class="img-cms">

                            </div>
                            <div class="text-conteudo">
                                <label>
                                    <p>
                                        Gerenciar página Sobre
                                    </p>
                                </label>

                            </div>
                        </a>
                    </div>
                </div>
                <div class="container-conteudo-cms">
                    <div class="option-conteudo">
                        <a href="cms-lojas.php">
                            <div class="conteudo-img">
                                <img src="../img/ico/icon-cms/location.png" id="" type="image" class="img-cms">

                            </div>
                            <div class="text-conteudo">
                                <label>
                                    <p>
                                        Gerenciar página Lojas
                                    </p>
                                </label>

                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div id="footer">
                <h3>
                    Desenvolvido por: Rubens Victor
                </h3>
            
            </div>
        
        </div>
    </body>
</html>