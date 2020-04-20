<?php

    if(isset($_GET['cod_cliente']))
    {
        require_once('../db/conexao.php');
        
	    $conexao = conexaoMysql();
        
        $nome = null;
        $telefone = null;
        $celular = null;
        $email = null;
        $homep = null;
        $facebook = null;
        $sugestoes = null;
        $produto = null;
        $sexo = null;
        $profissao = null;
        
        $codigo = $_GET['cod_cliente'];
        
        $sql = "SELECT * FROM tbl_cadastro_cliente WHERE cod_cliente =".$codigo;
        $select = mysqli_query($conexao, $sql);
        
        if($rs = mysqli_fetch_array($select)){
            $nome = $rs['nome'];
            $telefone = $rs['telefone'];
            $celular = $rs['celular'];
            $email = $rs['email'];
            $homep = $rs['home_page'];
            $facebook = $rs['facebook'];
            $sugestoes = $rs['sugestoes'];
            $produto = $rs['produto'];
            $sexo = $rs['sexo'];
            $profissao = $rs['profissao'];
            
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
        <p>
            Cliente
            <?php
                if(isset($nome)){
                    echo($nome);
                }
            ?>
        </p>
        
    </div>
    <div id="box-btn-modal">
        <a href="cms-fale-conosco.php">
            <input type="button"
                   id="fechar"
                   value="X">
            
        </a>
    </div>
</div>
<table id="tbl-modal">
    <tr style="width:100%;height:20px;">
        <td style="float:left;width:100px;">
            <lable>Nome:</lable>

        </td>
        <td style="width:400px;">
            <?php
                if(isset($nome)){
                    echo($nome);
                }
            ?>
        </td>
    </tr>
    <tr style="width:100%;heigth:20px;">
        <td style="width:100px;">
            <lable>Telefone:</lable>

        </td>
        <td style="width:400px;">
            <?php
                if(isset($telefone)){
                    echo($telefone);
                }
            ?>
        </td>
    </tr>
    <tr style="width:100%;heigth:20px;">
        <td style="width:100px;">
            <lable>Celular:</lable>

        </td>
        <td style="width:400px;">
            <?php
                if(isset($celular)){
                    echo($celular);
                }
            ?>
        </td>
    </tr>
    <tr style="width:100%;heigth:20px;">
        <td style="width:100px;">
            <lable>Email:</lable>

        </td>
        <td style="width:400px;">
            <?php
                if(isset($email)){
                    echo($email);
                }
            ?>
        </td>
    </tr>
    <tr style="width:100%;heigth:20px;">
        <td style="width:100px;">
            <lable>Home Page:</lable>

        </td>
        <td style="width:400px;">
            <?php
                if(isset($homep)){
                    echo($homep);
                }
            ?>
        </td>
    </tr>
    <tr style="width:100%;heigth:20px;">
        <td style="width:100px;">
            <lable>facebook:</lable>

        </td>
        <td style="width:400px;">
            <?php
                if(isset($facebook)){
                    echo($facebook);
                }
            ?>
        </td>
    </tr>
    <tr style="width:100%;heigth:20px;">
        <td style="width:100px;">
            <lable>Produto:</lable>

        </td>
        <td style="width:400px;">
            <?php
                if(isset($produto)){
                    echo($produto);
                }
            ?>
        </td>
    </tr>
    <tr style="width:100%;heigth:20px;">
        <td style="width:100px;">
            <lable>Profissão:</lable>

        </td>
        <td style="width:400px;">
            <?php
                if(isset($profissao)){
                    echo($profissao);
                }
            ?>
        </td>
    </tr>
    <tr style="width:100%;heigth:20px;">
        <td style="width:100px;">
            <lable>Sugestões.:</lable>

        </td>
        <td style="width:400px;">
            <?php
                if(isset($sugestoes)){
                    echo($sugestoes);
                }
            ?>
        </td>
    </tr>
    <tr style="width:100%;heigth:20px;">
        <td style="width:100px;">
            <lable>Sexo:</lable>
        </td>
        <td style="width:400px;">
            <?php
                if(isset($sexo)){

                    if($sexo == 'M'){
                        echo('Masculino');

                    }else{
                        echo('Feminino');

                    }
                }
            ?>
        </td>
    </tr>
</table>