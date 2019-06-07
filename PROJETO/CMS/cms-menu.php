<?php

if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){

    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header("location:../index.php");

}else{
    $usuario = $_SESSION['login'];
    
}

    echo('
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <div id="logo" class="center">
            <div id="box-titulo-cms">
                    <span style="font-weight:bold;" >CMS</span> - Sistema de gerenciamento do site
            
            </div>
            <div id="box-img-logo">
                <figure id="img-logo" class="center">
                    <img src="../img/ico/">
                </figure>
                
            </div>
        </div>
        <div id="menu" class="center">
            <div class="option-cms">
                <a href="cms.php">
                    <div class="img-option-cms center">
                        <figure>
                            <img src="../img/ico/writing.png" id="btn-content" class="img-menu-cms">
                        
                        </figure>
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
            <div class="option-cms">
                <a href="cms-fale-conosco.php">
                    <div class="img-option-cms center">
                        <figure>
                            <img src="../img/ico/contact.png" id="btn-fc" class="img-menu-cms">
                        
                        </figure>
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
            <div class="option-cms">
                <a href="cms-produto.php">
                    <div class="img-option-cms center">
                        <figure>
                            <img src="../img/ico/product.png" id="btn-fc" class="img-menu-cms">
                            
                        </figure>
                    </div>
                    <div class="text-cms center">
                        <label>
                            <p>
                                Adm. Produtos
                            </p>
                        </label>

                    </div>
                </a>
            </div>
            <div class="option-cms">
                <a href="cms-adm-usuario.php">
                    <div class="img-option-cms center">
                        <input src="../img/ico/man.png"
                                id="btn-user"
                                type="image"
                                class="img-menu-cms">
                                
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
            <div id="box-user">
                <div id="text-name-user">
                    <label for="name-user">
                        <h4>
                            <p>
                                Bem vindo, <span id="name-user">'.$usuario.'</span>
                            </p>
                        
                        </h4>
                    </label>
                </div>
                <div id="box-btn">
                    <input type="button"
                            id="btn-logout"
                            value="Logout">
                                
                </div>
            </div>
        </div>
    ');