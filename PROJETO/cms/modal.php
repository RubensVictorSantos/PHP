<?php 
    if(isset($_GET['codigo']))
    {
        require_once('../bd/conexao.php');
        
	    $conexao = conexaoMysql();
        
        $codigo = $_GET['codigo'];
        $sql = "SELECT * FROM tbl_cadastro_cliente WHERE codigo =".$codigo;
        $select = mysqli_query($conexao, $sql);
        
        if($rscontato = mysqli_fetch_array($select))
        {
            $nome = $rscontato['nome'];
            $telefone = $rscontato['telefone'];
            $celular = $rscontato['celular'];
            $email = $rscontato['email'];
            $homep = $rscontato['home_page'];
            $facebook = $rscontato['facebook'];
            $sugestoes = $rscontato['sugestoes'];
            $produto = $rscontato['produto'];
            $sexo = $rscontato['sexo'];
            $profissao = $rscontato['profissao'];
        }
    }
?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script>
    $(document).ready(function(){
        $('#fechar').click(function(){
            jQuery('#container').fadeOut(400);
        });
    });
</script>
<div style="width:100%; heigth: 20px;">
    <div id="titulo-modal" >
        <p>Cliente
            <?php
                if(isset($nome)){
                    echo($nome);
                }
            ?>
        </p>
    </div>
    <div id="box-btn-modal">
        <a href="cms-fale-conosco.php">
            <input type="button" id="fechar" value="X">
        </a>
    </div>
</div>
<div id="tbl-modal">
    <div id="labels">
        <div>
            <lable>Nome:</lable>
        </div>
        <div>
            <lable>Telefone:</lable>
        </div>
        <div>
            <lable>Celular:</lable>
        </div>
        <div>
            <lable>Email:</lable>
        </div>
        <div>
            <lable>Home Page:</lable>
        </div>
        <div>
            <lable>facebook:</lable>
        </div>
        <div>
            <lable>Produto:</lable>
        </div>
        <div>
            <lable>Profissão:</lable>
        </div>
        <div>
            <lable>Sugestões.:</lable>
        </div>
        <div>
            <lable>Sexo:</lable>
        </div>
        
    </div>
    <div id="dados-cliente">
        <div>
            <?php
                if(isset($nome)){
                    echo($nome);
                }
            ?>
        </div>
        <div>
            <?php
                if(isset($telefone)){
                    echo($telefone);
                }
            ?>
        </div>
        <div>
            <?php
                if(isset($celular)){
                    echo($celular);
                }
            ?>
        </div>
        <div>
            <?php
                if(isset($email)){
                    echo($email);
                }
            ?>
        </div>
        <div>
            <?php
                if(isset($homep)){
                    echo($homep);
                }
            ?>
        </div>
        <div>
            <?php
                if(isset($facebook)){
                    echo($facebook);
                }
            ?>
        </div>
        <div>
            <?php
                if(isset($produto)){
                    echo($produto);
                }
            ?>
        </div>
        <div>
            <?php
                if(isset($profissao)){
                    echo($profissao);
                }
            ?>
        </div>
        <div>
            <?php
                if(isset($sugestoes)){
                    echo($sugestoes);
                }
            ?>
        </div>
        <div>
            <?php
                if(isset($sexo)){
                    echo($sexo);
                }
            ?>
        </div>
    </div>
</div>