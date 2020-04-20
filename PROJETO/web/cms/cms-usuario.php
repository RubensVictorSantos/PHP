<?php
    
    require_once('../db/conexao.php');
    
    $conexao = conexaoMysql();

    $nome = null;
    $email = null;
    $senha = null;
    $status = null;
    $sql = null;
    $combobox = 0;
    $id = null;
    $readonly = null;
    $rdoativado = null;
    $rdodesativado = null;
    $verificar_senha = null;
    $botao = 'salvar';

    /***************************** VERIFICAR PERMISÃO *****************************/
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
        

    if(isset($_GET['modo'])){

        $modo = $_GET['modo'];
        $id = $_GET['id'];

        /************************ EXCLUIR ************************/
        if($modo == 'excluir'){

            $sql = "DELETE FROM tbl_usuario WHERE codigo =".$id;
            mysqli_query($conexao, $sql);

            header('location:cms-usuario.php');

       }elseif($modo == 'consultar'){

            $sql = "SELECT u.*, n.* FROM tbl_usuario AS u INNER JOIN tbl_nivel AS n ON u.cod_nivel = n.codigo WHERE u.codigo =".$id;

            $select = mysqli_query($conexao, $sql);

            if($rs = mysqli_fetch_array($select)){

                $nome = $rs['nome'];
                $combobox = $rs['cod_nivel'];
                $nivel = $rs['nivel'];
                $email = $rs['email'];
                $senha = $rs['senha'];

                if($rs['status'] == 'A'){
                    $rdoativado = 'checked';

                }else{
                    $rdodesativado = 'checked';

                }
                $botao = 'editar';

                $_SESSION['id'] = $id;
            }
        }
    }

    if(isset($_POST['btnsalvar'])){

        $nome = filter_var($_POST["text-nome"], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST["text-email"], FILTER_SANITIZE_STRING);
        $senha = md5(filter_var($_POST["text-senha"], FILTER_SANITIZE_STRING));
        $verificar_senha = md5(filter_var($_POST["text-senha2"], FILTER_SANITIZE_STRING));
        $combobox = filter_var($_POST["combobox"], FILTER_SANITIZE_STRING);
        $status = $_POST['radio'];

        /*************** SALVAR **************/
        if($_POST['btnsalvar'] == 'salvar'){

            if($senha == $verificar_senha){

                /*************** ENCRIPTAÇÃO SENHA ******************/

                $sql = "INSERT INTO tbl_usuario(nome, email, senha, status, cod_nivel) VALUES ('".$nome."','".$email."','".$senha."','".$status."',".$combobox.")";


                mysqli_query($conexao, $sql);

                $senha = 'required';

                header("location:cms-usuario.php");

            }else{
                echo('<script>alert("Erro ao confirmar a senha, digite novamente")</script>');
            }

        /*************** EDITAR **************/
        }elseif($_POST['btnsalvar'] == 'editar'){

            if($senha == null){

//                echo('<script>alert("senha: '.$senha.'")</script>');

                $sql = "UPDATE tbl_usuario SET nome = '".$nome."',
                                                email = '".$email."',
                                                status = '".$status."',
                                                cod_nivel = '".$combobox."'
                                                WHERE codigo =".$_SESSION['id'];

                mysqli_query($conexao, $sql);

            }else{

                $sql = "UPDATE tbl_usuario SET nome = '".$nome."',
                                                email = '".$email."',
                                                senha = '".$senha."',
                                                status = '".$status."',
                                                cod_nivel = '".$combobox."'
                                                WHERE codigo =".$_SESSION['id'];

                mysqli_query($conexao, $sql);
            }
        header("location:cms-usuario.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <head>
        <title>
            CMS Adm. Usuários
        </title>
        
    </head>
    <body>
        <div id="box-main" class="center">
            
            <!--********************* MENU ********************-->
            <?php
                require_once('cms-menu.php');
    
            ?>
            
            <!--********************* CONTEÚDO ****************-->
            <div class="titulos-cms">
                <h3>Administrar Usuários</h3>
            </div>
            <div id="conteudo">
                <form name="frmcms-usuario" method="POST" action="cms-usuario.php" enctype="multipart/form-data">
                    <div class="conteudo-adm">
                        <div class="input-text-cms">
                            <h3>Cadastrar Usuário</h3>
                        </div>
                        <div class="input-text-cms">
                            <div class="box-input-promo">
                                <input type="text"
                                       name="text-nome"
                                       class="input-cms-promo"
                                       value="<?php echo($nome)?>"
                                       maxlength="65"
                                       placeholder=" Digite o nome do usuário"
                                       required>

                            </div>
                        </div>
                        <div class="input-text-cms">
                            <div class="box-input-promo">
                                <input type="email"
                                       name="text-email"
                                       class="input-cms-promo"
                                       value="<?php echo($email)?>"
                                       maxlength="65"
                                       placeholder=" Digite o seu email"
                                       required>

                            </div>
                        </div>
                        <div class="input-text-cms">
                            <div class="box-input-promo">
                                <input type="password"
                                       name="text-senha"
                                       class="input-cms-promo"
                                       value=""
                                       <?php echo($senha);?>
                                       placeholder=" Digite a senha" 
                                       maxlength="15"
                                       >
                            </div>
                        </div>
                        <div class="input-text-cms">
                            <div class="box-input-promo">
                                <input type="password"
                                       name="text-senha2"
                                       class="input-cms-promo"
                                       value=""
                                       placeholder=" Confirmar senha"
                                       maxlength="15"
                                       >

                            </div>
                        </div>
                        <div class="input-text-cms">
                            <div class="box-input-promo">

                                <!--********************* COMBO BOX ********************-->
                                <select name="combobox" class="input-cms-promo" id="combobox" required>
                                    
                                    <?php
                                        
                                        if($modo == "consultar"){
                                            
                                    ?>
                                    <option value="<?php echo($combobox);?>">
                                        <?php echo($nivel);?>
                                    </option>
                                    
                                    <?php
                                        }else{
                                    ?>
                                    <option>
                                        Selecione nivel de usuário
                                    </option>

                                    <?php
                                        }
                                    
                                        $sql = "SELECT * FROM tbl_nivel WHERE status LIKE 'A%' AND codigo <>".$combobox." ORDER BY codigo";
                                        $select = mysqli_query($conexao, $sql);

                                        while($rs=mysqli_fetch_array($select)){

                                    ?>

                                    <option value="<?php echo($rs['codigo'])?>">

                                        <?php echo($rs['nivel'])?>

                                    </option>

                                    <?php
                                        }
                                    ?>
                                </select>

                            </div>
                        </div>
                        <div class="input-text-cms">
                            <div class="box-rdo" style="width:85px;">
                                <input type="radio"
                                       name="radio"
                                       value="A"
                                       id="rdo-ativado"
                                       <?php echo($rdoativado)?>
                                       checked
                                       required>

                                <label for="rdo-ativado"> Ativar</label>

                            </div>
                            <div class="box-rdo">
                                <input type="radio"
                                       name="radio"
                                       value="D"
                                       id="rdo-desativado"
                                       <?php echo($rdodesativado)?>
                                       required>

                                <label for="rdo-desativado"> Desativar</label>

                            </div>
                            <div class="box-rdo">
                                <input type="submit"
                                       class="btn-salvar"
                                       name="btnsalvar"
                                       id="btnsalvar"
                                       value="<?php echo($botao);?>">
                            </div>
                        </div>
                    </div>
                </form>
                <div class="conteudo-tbl-adm-user">
                    <div id="tbl-promocoes">
                        <div class="cabecalho">
                            <div class="titulos-promo" style="width:280px;">
                                <p>
                                    Nome
                                </p>
                                
                            </div>
                            <div class="titulos-promo" style="width:140px;">
                                <p>
                                    Nível
                                </p>
                                
                            </div>
                            <div class="titulos-promo" style="width:280px;">
                                <p>
                                    E-mail
                                </p>
                                
                            </div>
                            <div class="titulos-promo" style="width:130px;">
                                <p>
                                    Status
                                </p>
                                
                            </div>
                            <div class="titulo-campo-opcoes">
                                <p>
                                    Opções
                                </p>
                                
                            </div>
                        </div>
                        <?php
                            
                            /********************* VISUALIZAR DADOS DO BANCO ************************/
                        $sql = "SELECT tbl_usuario.codigo,
                                        tbl_usuario.nome,
                                        tbl_usuario.senha, 
                                        tbl_usuario.status,
                                        tbl_usuario.cod_nivel,
                                        tbl_usuario.email, 
                                        tbl_nivel.nivel
                                FROM tbl_usuario JOIN tbl_nivel 
                                ON tbl_usuario.cod_nivel = tbl_nivel.codigo ORDER BY status ASC";
                        
                            $select = mysqli_query($conexao, $sql);

                            while($rs = mysqli_fetch_array($select)){
                                
                        ?>
                        <div class="tbl-dados-db">
                            <div class="campos-tbl-promo" style="width:280px;">
                                <?php echo($rs['nome'])?>
                                
                            </div>
                            <div class="campos-tbl-promo" style="width:140px;">
                                <?php
                                   echo($rs['nivel']);
                                ?>
                            </div>
                            <div class="campos-tbl-promo" style="width:280px;">
                                <?php
                                   echo($rs['email']);
                                ?>
                            </div>
                            <div class="campos-tbl-promo" style="width:130px;">
                                <?php
                                    if($rs['status'] == 'A'){
                                        echo('Ativado');
                                        
                                    }else{
                                        echo('Desativado');
                                        
                                    }
                                ?>	
                            </div>
                            
                            <div class="campo-opcoes">
                                <div class="opcoes-promo">
                                    <a href= "cms-usuario.php?modo=excluir&id=<?php echo($rs['codigo']);?>" onclick="return confirm('Deseja realmente excluir?');">

                                        <img src="../img/excluir.png"
                                             style="width:24px; height:24px; margin-top:2px;"
                                             class="img center">
                                        
                                    </a>
                                </div>
                                <div class="opcoes-promo">
                                    <a href="cms-usuario.php?modo=consultar&id=<?php echo($rs['codigo']);?>">
                                        
                                        <img src="../img/editar24.png"
                                             style="width:20px; height:23px; margin-top:2px;"
                                             class="img center">
                                        
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                        
                    </div>
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
