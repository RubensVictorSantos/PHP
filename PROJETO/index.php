<!DOCTYPE html>
<?php

    require_once('bd/conexao.php');
    session_start();

    $conexao = conexaoMysql();

    $nomeProduto = null;
    $imagem = null;
    $descricao = null;
    $preco = null;
    $status = null;
    $sql = null;
    $rdoativado = null;
    $rdodesativado = null;
    $id = null;
    $idcat = null;
    $modo = null;

    if(isset($_SESSION['path_foto'])){
        $foto = $_SESSION['path_foto'];
    }

    if(isset($_POST['btn-login'])){
//        Atribuindo os valores das input da página index.php p/ essas variáveis
        $login = $_POST['txt-usuario'];
        
//        Criptografando a senha
        $senha = md5($_POST['txt-senha']);

        $sql = "SELECT * FROM tbl_usuario WHERE nome = '".$login."' AND senha = '".$senha."' AND status = 'A'";
        
        $select = mysqli_query($conexao, $sql);

//        Se existe um cadastro no banco com esse nome e senha 
//        mysqli_num_rows retorna 1 do contrario ele vai retornar 0;
        
        if(mysqli_num_rows($select) > 0){

            $_SESSION['login'] = $login;
            $_SESSION['senha'] = $senha;
            
            if($rs=mysqli_fetch_array($select)){
            
                $_SESSION['nivel'] = $rs['cod_nivel'];
            
            }
            header('location:cms/cms.php');

        }else{

            unset ($_SESSION['login']);
            unset ($_SESSION['senha']);
            echo('<script>alert("Erro ao tentar logar, verifique seu login e senha estão corretos")</script>');
        }

    }
header("Content-type: text/html; charset=utf-8");
?>

<html lang="pt-br">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0,charset=utf-8">
        <title>
            Road Runner Cross Bikes
        </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="icon" href="img/ico/i405_TDM_icon_bike93.gif">
        <script src="js/jquery.js"></script>
        <script src="js/buscar.js"></script> 
        <script src="js/menu-mobile.js"></script>
        <script>
            $(document).ready(function(){
				$('.visualizar').click(function(){
					jQuery('#container').fadeIn(400);
				});
			});
			
			function visualizarDados (idItem)
			{
				$.ajax({
                   
                   type:"GET",
                
                   url:"modal.php",
                    
                    data:{codigo:idItem},
                    
                    success: function(dados){
                        $('#modal').html(dados);
                    
                    }
                });
			}
        </script>
    </head>
    <body>
        <div id="container">
			<div id="modal"></div>
		
        </div>
        <header class="center">
            <div id="box-main-header" class="center">
                
                <!-- LOGO -->
                
                <div id="logo">
                    <a href="index.php" title="Página inicial" >
                        <img src="img/ico/logo.png" style=" " alt="Logotipo da empresa" id="imag-logo">

                    </a>
                </div>
                
                <nav id="menu" class="center">
                    <ul class="center">
                        <li><a href="noticias.php">Destaques</a></li>
                        <li><a href="promocoes.php">Promoções</a></li>
                        <li><a href="eventos.php">Eventos</a></li>
                        <li><a href="fale-conosco.php">Fale Conosco</a></li>
                        <li><a href="sobre.php">Sobre</a></li>
                        <li><a href="lojas.php">Nossas Lojas</a></li>
                    </ul>
                </nav>
                
                <!-- LOGIN -->
                
                <div id="icone-login">
                    <form name="frmlogin" id="frmlogin" method="post" action="index.php">

                        <div class="box-login center">

                            <input class="text-login center"
                                   type="text"
                                   name="txt-usuario"
                                   id="txt-usuario"
                                   placeholder="Login">

                        </div>
                        <div class="box-login center">

                            <input class="text-login center"
                                   type="password" 
                                   name="txt-senha"
                                   id="txt-senha"
                                   placeholder="Senha">

                        </div>
                        <input type="submit"
                               value="Ok"
                               name="btn-login"
                               id="btn-login">
                    </form>
                </div>
            
                <!-- BUSCAR -->

                <div id="container-buscar" class="container-buscar-close">
                    <form name="frmbuscar" id="frmbuscar" method="post" action="index.php">

                        <input type="text"
                               name="txtbuscar"
                               placeholder="Search..."
                               id="txtbuscar"
                               class="txtbuscar-close">

                        <input type="submit"
                               name="btnbuscar" 
                               alt="submit" 
                               id="btnbuscar"
                               value=""
                               class="btnbuscar-close">

                    </form>
                </div>
            
                <!-- MENU MOBILE -->

                <div id="icone_menu">
                    <div class="barra-menu"></div>
                    <div class="barra-menu"></div>
                    <div class="barra-menu"></div>
                </div>
                <nav id="menu_mobile" class="menu_mobile_close">
                    <ul class="center">
                        <li class="itens-menu-mobile">
                            <a href="noticias.php" class="link">
                                Destaques
                            </a>
                        </li>
                        <li class="itens-menu-mobile">
                            <a href="promocoes.php" class="link">
                                Promoções
                            </a>
                        </li>
                        <li class="itens-menu-mobile">
                            <a href="eventos.php" class="link">
                                Eventos
                            </a>
                        </li>
                        <li class="itens-menu-mobile">
                            <a href="fale-conosco.php" class="link">
                                Fale Conosco
                            </a>
                        </li>
                        <li class="itens-menu-mobile">
                            <a href="sobre.php" class="link">
                                Sobre
                            </a>
                        </li>
                        <li class="itens-menu-mobile">
                            <a href="lojas.php" class="link">
                                Nossas Lojas
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            
        </header>
        <div id="conteudo" class="center">
            
            <!-- SLIDER -->
            
            <div id="box-slider-mobile"></div>
            <div id="box-slider" class="center">
                
                <script src="js/jquery-1.11.3.min.js" ></script>
                <script src="js/jssor.slider-27.5.0.min.js"></script>
                <script src="js/slider.js"></script>
                
                <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300italic,regular,italic,700,700italic&subset=latin-ext,greek-ext,cyrillic-ext,greek,vietnamese,latin,cyrillic" rel="stylesheet" type="text/css" />

                <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;visibility:hidden;">
<!--                     Loading Screen -->

                    <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                        
                        <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" alt="Imgem que representa o carregamento do slid" />
                        
                    </div> 

                    
                    <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;">
                        
                        <div>
                            <img data-u="image" src="img/20140727-PELOTON-PHOTOS-HOMEPAGE.jpg" alt="Imagem do slid, corrida de bicicleta" />
                            
                            
                        </div>
                        <div>
                            <img data-u="image" src="img/Almaty-Cycling-1300x500.jpg" alt="Ciclista no topo de um cume olhando para uma montanha"/>
                           
                            
                        </div>
                        <div>
                            <img data-u="image" src="img/granfondo-2-1500-1300x500.jpg" alt="Corrida de ciclitas"/>
                            
                        </div>
                        <div>
                            <img data-u="image" src="img/imgslide_pegBikeRe-Ciclo.jpg" alt="Bicicleta reciclavel" />
                            
                        </div>
                        
                    </div>
<!--                     Bullet Navigator -->
                    <div data-u="navigator" class="jssorb032" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                        <div data-u="prototype" class="i" style="width:16px;height:16px;">
                            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                                
                            </svg>
                            
                        </div>
                        
                    </div>
<!--                     Arrow Navigator -->
                    <div data-u="arrowleft" class="jssora051" style="width:65px;height:65px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                            <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
                        </svg>
                    </div>
                    <div data-u="arrowright" class="jssora051" style="width:65px;height:65px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                            <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
                        </svg>
                    </div>
                </div>
            </div>
            
            <!-- CONTEÚDO CATALOGO -->
            
            <div id="conteudo-catalogo" class="center">
                <div id="menu-catalogo">
                    <ul >
                        
                        <?php
                        
                        $sql =  "SELECT * FROM tbl_categoria WHERE status LIKE 'A%'";

                        $select = mysqli_query($conexao, $sql);
                        
                        while($rsmenu=mysqli_fetch_array($select))
                        {

                            $codcategoria = $rsmenu['codigo'];
                            $categoria = $rsmenu['categoria'];
                            
                        ?>
                        <li class="itens-catalogo">
                            <strong>
                                <?php
                                    echo($rsmenu['categoria']);
                                    
                                ?>
                            </strong>
                            <ul class="submenu">
                                
                                	<?php
                            
                                    $sqlsub = "SELECT DISTINCT psc.cod_subcategoria,
                                                                s.subcategoria,
                                                                psc.cod_categoria
                                                                FROM tbl_produto_subcategoria_categoria AS psc
                                                                INNER JOIN tbl_subcategoria AS s 
                                                                ON psc.cod_subcategoria = s.codigo 
                                                                WHERE psc.cod_categoria =".$codcategoria." 
                                                                AND psc.status LIKE 'A%'";
                            
                                    $test = mysqli_query($conexao, $sqlsub);


                                    while($rsmenu=mysqli_fetch_array($test))
                                    {

                                        $subcategoria = $rsmenu['subcategoria'];
                                        $codsubcategoria = $rsmenu['cod_subcategoria'];
                                        
                                    ?>
                                
                                <li class="itens-subcategoria">
                                    <a href="index.php?modo=categoria&id=<?php echo($codsubcategoria);?>&idcat=<?php echo($codcategoria);?>">
                                    <strong>
                                        <?php
                                            echo($subcategoria);
                                        ?>
                                    </strong>
                                    </a>
                                </li>
                                <?php
                                        
                                        
                                    }
                                ?>
                            </ul>
                        </li>
                        
                        <?php
                            }
                        ?>
                    </ul>
                </div>
                <!--BOX CATALOGO-->
                <div id="box-catalogo">
                    
                    
                    <?php
                        
                        if(isset($_GET['modo'])){
                            
                            $modo = $_GET['modo'];
                            $id = $_GET['id'];
                            $idcat = $_GET['idcat'];
                            
                            if($modo == 'categoria'){
                                
                                $sql = "SELECT DISTINCT psc.cod_subcategoria,
                                                        p.*,
                                                        s.subcategoria,
                                                        psc.cod_categoria
                                                        FROM tbl_produto_subcategoria_categoria AS psc
                                                        INNER JOIN tbl_subcategoria AS s 
                                                        ON psc.cod_subcategoria = s.codigo
                                                        INNER JOIN tbl_produto = p
                                                        ON p.codigo = psc.cod_produto
                                                        WHERE psc.cod_categoria = ".$idcat." 
                                                        AND psc.cod_subcategoria = ".$id." 
                                                        AND psc.status LIKE 'A%'";
                            };
                            
                        }elseif(isset($_POST['btnbuscar'])){
                            
                            $buscar = null;
                            $buscar = $_POST['txtbuscar'];
                            
                            $sql = "SELECT * FROM tbl_produto WHERE produto LIKE '%".$buscar."%' OR descricao LIKE '%".$buscar."%' AND status LIKE 'A%'";
                            
                        }else{
                        
                            $sql = "SELECT * FROM tbl_produto WHERE status LIKE 'A%' ORDER BY RAND()";
                        
                        }
                        $select = mysqli_query($conexao, $sql);
                        
                        if(mysqli_num_rows($select) <= 0){
                            
                            ?>
                                <div >
                                    <p>Colocar Imagem!</p>
                                    
                                </div>
                                
                            <?php

                        }else{
                        
                    
                            while($rsproduto=mysqli_fetch_array($select))
                            {

                                $nomeProduto = $rsproduto['produto'];
                                $nomefoto = $rsproduto['imagem'];
                                $descricao = $rsproduto['descricao'];
                                $preco = $rsproduto['preco'];
                            
                    ?>
                        <div class="card">
                            <div class="img-card center">
                                
                                <img src="cms/<?php echo($nomefoto);?>" alt="Imagem do Produto" class="img-card">
                                
                            </div>
                            <div class="nome-card">
                                <p>
                                   <?php 
                                        echo($nomeProduto);
                            
                                    ?>
                                </p>
                            </div>
                            <div class="desc-card">
                                <p>
                                    <?php 
                                        echo($descricao);
                                    
                                    ?>
                                </p>
                            </div>
                            <div class="preco-card">
                                <p>
                                    R$ <?php echo($preco)?>
                                    
                                </p>
                            </div>
                            <div class="detalhes">

                                <input type="button"
                                       class="visualizar center"
                                       id="btndetalhes"
                                       onclick="visualizarDados(<?php echo($rsproduto['codigo']);?>);"
                                       value="Detalhes">

                            </div>
                        </div>
                    
                    <?php
                            }
                        }
                    ?>
                </div>
                <?php
                
                    require_once('redes.php');
                
                ?>
            </div>
        </div>
        <?php
            
            require_once('footer.php');
            
        ?>
    </body>
</html>