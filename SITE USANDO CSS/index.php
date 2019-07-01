<!doctype html>
<?php

    require_once('db/conexao.php');
    
    $conexao = connect();
    
    $titulo = null;
    $descricao = null;
    $legenda = null;
    
?>
<html lang="pt-br">
	<head>
		<meta Charset="UTF-8">
		<title>UMTERAFILMES</title>
		<link rel="icon" href="img/icon/playButton.png">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body class="bg_image">
		<header>
		<!-- AREA MENU -->
			<?php
                include('menu.php');
            ?>
		</header>
		<div id="empresa">
            <div id="caixas_generos" class="center">
                <div class="secao">
				
					<div >
						<a href="lançamentos/lançamentos.html" ><h1 class="titulo">LANÇAMENTOS</h1></a>
					</div>
					
                    <div class="container-box">
						<div class="teste2">
                        <?php
                            
                            $sql = "SELECT * FROM tbl_filme";
                                
                            $select = mysqli_query($conexao,$sql);
                        
                            while($rs=mysqli_fetch_array($select)){
                            
                                $titulo = $rs['titulo'];
                                
                        ?>
                        
                            <div class="box_filmes">
                                <div class="titulo_filme">
                                    <p>
                                        <?php
                                            echo($titulo);
                                        ?>
                                    </p>
                                </div>
                                <div class="box_img">

    <!--									<img src="filmes\ThePredator\Img\PRE1_384x576.jpg" class="box_img">-->

                                </div>
                                <div class="legendas">
                                    LEGENDADO/DUBLADO
                                </div>

                                <div class="play">
                                    <a href="filmes\ThePredator\ThePredator.html">
                                        <div class="img_play center">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        </div>
                    </div>
                    
				</div>
			</div>
		</div>
		<footer class="center" id="footer">
            <?php
                include('footer.php');
            ?>
			
		</footer>
	</body>
</html>