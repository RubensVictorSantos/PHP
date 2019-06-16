<?php

    require_once('../bd/conexao.php');

    $conexao = conexaoMysql();

    $usuario = null;
    $codnivel = null;
    $admconteudo = null;
    $admfaleconosco = null;
    $admproduto = null;
    $admusuario = null;
    $select = null;
    $sql = null;

    if(((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)) or (isset($_POST['btn-logout']))){

        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header("location:../index.php");

    }else{
        $usuario = $_SESSION['login'];
        $codnivel = $_SESSION['nivel'];

        $sql = "SELECT * FROM tbl_nivel WHERE codigo =".$codnivel;

        $select = mysqli_query($conexao, $sql);

        while($rs=mysqli_fetch_array($select))
        {
            $admconteudo = $rs['admconteudo'];
            $admfaleconosco = $rs['admfaleconosco'];
            $admproduto = $rs['admproduto'];
            $admusuario = $rs['admusuario'];

        }
    }

?>
<link rel="icon" href="../img/ico/i405_TDM_icon_bike93.gif">
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
        <?php
            
            if($admconteudo == '1'){
        
        ?>
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
        <?php
            }else{
        ?>
            <div class="img-option-cms center">
                <figure>
                    <img src="../img/ico/blocked.png" id="img-content" class="img-menu-cms">

                </figure>
            </div>
            <div class="text-cms center">
                <label for="img-content">
                    <p>
                        Adm. Conteúdo
                    </p>
                </label>

            </div>
            
        <?php
        
            }
        ?>
    </div>
    <div class="option-cms">
        <?php
            
            if($admfaleconosco == '1'){
        
        ?>
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
          
        <?php
            }else{
        ?>
            <div class="img-option-cms center">
                <figure>
                    <img src="../img/ico/blocked.png" id="img-fc" class="img-menu-cms">

                </figure>
            </div>
            <div class="text-cms center">
                <label for="img-fc">
                    <p>
                        Adm. Fale conosco
                    </p>
                </label>

            </div>
            
        <?php
        
            }
        ?>
    </div>
    <div class="option-cms">
        <?php
            
            if($admproduto == '1'){
        
        ?>
        <a href="cms-adm-produto.php">
            <div class="img-option-cms center">
                <figure>
                    <img src="../img/ico/product.png" id="btn-produto" class="img-menu-cms">

                </figure>
            </div>
            <div class="text-cms center">
                <label for="btn-produto">
                    <p>
                        Adm. Produtos
                    </p>
                </label>

            </div>
        </a>
        <?php
            }else{
        ?>
            <div class="img-option-cms center">
                <figure>
                    <img src="../img/ico/blocked.png" id="img-produto" class="img-menu-cms">

                </figure>
            </div>
            <div class="text-cms center">
                <label for="img-produto">
                    <p>
                        Adm. Produtos
                    </p>
                </label>

            </div>
            
        <?php
        
            }
        ?>
    </div>
    <div class="option-cms">
        <?php
            
            if($admusuario == '1'){
        
        ?>
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
        <?php
            }else{
        ?>
            <div class="img-option-cms center">
                <figure>
                    <img src="../img/ico/blocked.png" id="img-user" class="img-menu-cms">

                </figure>
            </div>
            <div class="text-cms center">
                <label for="img-user">
                    <p>
                        Adm. Usuários
                    </p>
                </label>

            </div>
            
        <?php
        
            }
        ?>
    </div>
    <div id="box-user">
        <form name="frmlogout" id="frmlogout" method="post" action="cms-menu.php">
            <div id="text-name-user">
                <label for="name-user">
                    <h4>
                        <p>
                            Bem vindo, <span id="name-user"><?php echo($usuario)?></span>
                        </p>

                    </h4>
                </label>
            </div>
            <div id="box-btn">
                <input type="submit"
                        id="btn-logout"
                        name="btn-logout"
                        value="Logout">

            </div>
        </form>
    </div>
</div>