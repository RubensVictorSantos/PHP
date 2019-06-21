<?php

    require_once('../bd/conexao.php');

    $conexao = conexaoMysql();

/*    Esse bloco de código em php verifica se existe a sessão, pois o usuário pode 
    simplesmente não fazer o login e digitar na barra de endereço do seu navegador 
    o caminho para a página principal do site (sistema), burlando assim a obrigação de 
    fazer um login, com isso se ele não estiver feito o login não será criado a session, 
    então ao verificar que a session não existe a página redireciona o mesmo 
    para a ../index.php.*/

    if(!isset($_SESSION)){
        
        session_start();
    }

   if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){

        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header("location:../index.php");

    }else{

        $usuario = $_SESSION['login'];
        $codnivel = $_SESSION['nivel'];

        $sql = "SELECT * FROM tbl_nivel WHERE codigo =".$codnivel;

        $select = mysqli_query($conexao, $sql);

        if($rs=mysqli_fetch_array($select)){

            $admconteudo = $rs['admconteudo'];

        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            CMS
        </title>
        <link rel="icon" href="../img/ico/i405_TDM_icon_bike93.gif">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div id="box-main" class="center">
            <?php
                require_once('cms-menu.php');
    
            ?>
            <div id="conteudo">
                <?php
                    
                    if($admconteudo == '1'){

                ?>
                <div class="container-conteudo-cms">
                    <!--******************** NOTICIAS ********************-->
                    <div class="option-conteudo">
                        <a href="cms-noticias.php">
                            <div class="conteudo-img">
                                <figure>
                                    <img src="../img/ico/icon-cms/newspaper%20(3).png"
                                         id="img-noticias"
                                         class="img-cms">
                                    
                                </figure>
                            </div>
                            <div class="text-conteudo">
                                <label>
                                    <p>Gerienciar página Notícias</p>
                                </label>
                            </div>
                        </a>
                    </div>
                    <!--******************** PROMOÇÕES ********************-->
                    <div class="option-conteudo">
                        <a href="cms-promocoes.php">
                            <div class="conteudo-img">
                                <figure>
                                    <img src="../img/ico/icon-cms/offer.png"
                                         id="img-promocao"
                                         class="img-cms">
                                
                                </figure>
                            </div>
                            <div class="text-conteudo">
                                <label>
                                    <p>Gerenciar página Promoções</p>
                                    
                                </label>
                            </div>
                        </a>
                    </div>
                    <!--******************** EVENTOS ********************-->
                    <div class="option-conteudo">
                        <a href="cms-eventos.php">
                            <div class="conteudo-img">
                                <figure>
                                    <img src="../img/ico/icon-cms/calendar.png"
                                         id="img-eventos"
                                         class="img-cms">
                                    
                                </figure>
                            </div>
                            <div class="text-conteudo">
                                <label>
                                    <p>Gerenciar página Eventos</p>
                                    
                                </label>
                            </div>
                        </a>
                    </div>
                    <!--******************** SOBRE ********************-->
                    <div class="option-conteudo">
                        <a href="cms-sobre.php">
                            <div class="conteudo-img">
                                <figure>
                                    <img src="../img/ico/icon-cms/help.png"
                                         id="img-sobre"
                                         class="img-cms">
                                    
                                </figure>
                                
                            </div>
                            <div class="text-conteudo">
                                <label>
                                    <p>Gerenciar página Sobre</p>
                                    
                                </label>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="container-conteudo-cms">
                    <!--******************** LOJAS ********************-->
                    <div class="option-conteudo">
                        <a href="cms-lojas.php">
                            <div class="conteudo-img">
                                <figure>
                                    <img src="../img/ico/icon-cms/location.png"
                                         id="img-lojas"
                                         class="img-cms">
                                
                                </figure>
                            </div>
                            <div class="text-conteudo">
                                <label>
                                    <p>Gerenciar página Lojas</p>
                                    
                                </label>
                            </div>
                        </a>
                    </div>
                </div>
                
                <?php
                        }else{
                    
                ?>
                    <div class="welcome center">
                        <h1>Bem Vindo!</h1>
                
                    </div>
                <?php
                    }
                ?>
            </div>
            <div id="footer">
                <h3>
                    Desenvolvido por: Rubens Victor
                </h3>
            
            </div>
        
        </div>
    </body>
</html>