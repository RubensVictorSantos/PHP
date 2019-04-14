<?php
    echo('
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <div id="logo" class="center">
            <div id="box-titulo">
                    <span style="font-weight:bold;" >CMS</span> - Sistema de gerenciamento do site
            </div>
            <div id="box-img-logo">
                <figure id="img-logo" class="center">
                    <img src="../img/ico/">
                </figure>
            </div>
        </div>
        <div id="menu" class="center">
            <div class="option">
                <a href="cms.php">
                    <div class="img-option center">
                        <img src="../img/ico/writing.png" id="btn-content" class="img-cms">
                    </div>
                    <div class="text-cms center">
                        <label for="btn-content">
                            <p>
                                Adm. Conteúdo
                            </p>
                        </label>

                    </div>
                </a>
            </div>
            <div class="option">
                <a href="cms-fale-conosco.php">
                    <div class="img-option center">
                        <img src="../img/ico/contact.png" id="btn-fc" class="img-cms">
                    </div>
                    <div class="text-cms center">
                        <label for="btn-fc">
                            <p>
                                Adm. Fale conosco
                            </p>
                        </label>

                    </div>
                </a>
            </div>
            <div class="option">
                <a href="#">
                    <div class="img-option center">
                        <input src="../img/ico/product.png" id="btn-produtos" type="image" class="img-cms">
                    </div>
                    <div class="text-cms center">
                        <label for="btn-produtos">
                            <p>
                                Adm. Produtos
                            </p>
                        </label>

                    </div>
                </a>
            </div>
            <div class="option">
                <a href="#">
                    <div class="img-option center">
                        <input src="../img/ico/man.png" id="btn-user" type="image" class="img-cms">
                    </div>
                    <div class="text-cms center">
                        <label for="btn-user">
                            <p>
                                Adm. Usuários
                            </p>
                        </label>
                    </div>
                </a>
            </div>
            <div id="box-info-user">
                <div id="text-name-user">
                    <label for="name-user">
                        <h4>
                            Bem Vindo,<span id="name-user"> xxxxxx</span>
                        </h4>
                    </label>
                </div>
                <div id="box-btn">
                    <input type="button" id="btn-logout" value="Logout">
                </div>
            </div>
        </div>
    ');