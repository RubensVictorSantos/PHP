<?php
    
    require_once('../bd/conexao.php');

    $conexao = conexaoMysql();
    
    if(!isset($_SESSION)){

        session_start();

        $codnivel = $_SESSION['nivel'];

        $sql = "SELECT * FROM tbl_nivel WHERE codigo =".$codnivel;

        $select = mysqli_query($conexao, $sql);

        if($rs=mysqli_fetch_array($select)){

            $admusuario = $rs['admusuario'];

        }

        if(!$admusuario == '1'){
        
            header('location:cms.php');
            
        }
    }
            
?>


<!DOCTYPE html>
<html lang="pt-br">
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <head>
        <title>
            CMS Adm. Usuário
        </title>
        <link rel="icon" href="../img/ico/i405_TDM_icon_bike93.gif">
    </head>
    <body>
        <div id="box-main" class="center">
            
            <!--********************* MENU ********************-->
            <?php
                require_once('cms-menu.php');
    
            ?>
            
            <!--********************* CONTEÚDO ****************-->
            <div class="titulos-cms">
                <h3>Administrar Usuarios</h3>
            </div>
            
            <div id="conteudo">
                <div class="option-conteudo">
                    <a href="cms-usuario.php">
                        <div class="conteudo-img">
                            <figure>
                                <img src="../img/ico/icon-cms/employee.png"
                                     id="img-users"
                                     class="img-cms">

                            </figure>
                        </div>
                        <div class="text-conteudo">
                            <label>
                                <p>Cadastrar Usuário</p>
                            </label>
                        </div>
                    </a>
                </div>
                <div class="option-conteudo">
                    <a href="cms-nivel.php">
                        <div class="conteudo-img">
                            <figure>
                                <img src="../img/ico/icon-cms/hierarchy-levels.png"
                                     id="img-nivel"
                                     class="img-cms">

                            </figure>
                        </div>
                        <div class="text-conteudo">
                            <label>
                                <p>Cadastrar Nível Usuário</p>
                            </label>
                        </div>
                    </a>
                </div>
                
            </div>
            
            <!--********************* FOOTER ********************-->
            <div id="footer">
                <h3>
                    Desenvolvido por: Rubens Victor
                </h3>
            
            </div>
        </div>
    </body>
</html>