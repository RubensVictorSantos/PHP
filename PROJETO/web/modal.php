<?php

    if(isset($_GET['codigo'])){
        
        require_once('db/conexao.php');
        session_start();

        $conexao = conexaoMysql();
        
        $nomeProduto = null;
        $imagem = null;
        $descricao = null;
        $preco = null;
        $status = null;
        $sql = null;
        
        $codigo = $_GET['codigo'];
        
        $sql = "SELECT * FROM tbl_produto WHERE codigo = ".$codigo;
        
        $select = mysqli_query($conexao, $sql);
        
        if($rs=mysqli_fetch_array($select)){
            
            $nomeProduto = $rs['produto'];
            $imagem = $rs['imagem'];
            $descricao = $rs['descricao'];
            $preco = $rs['preco'];
            $status = $rs['status'];
        
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
            <?php    
            
                if(isset($nomeProduto)){
                    echo($nomeProduto);
                }
            
            ?>
        </p>
        
    </div>
    <div id="box-btn-modal">
        <a href="index.php">
            <input type="button"
                   id="fechar"
                   value="X">
            
        </a>
    </div>
</div>
<table id="tbl-modal">
    <tr style="width:100%;height:20px;">
        <td style="width:100px;">
            <lable>Produto:</lable>

        </td>
        <td style="width:400px;">
            <?php
                if(isset($nomeProduto)){
                    echo($nomeProduto);
                }
            ?>
        </td>
    </tr>
    <tr style="width:100%;heigth:20px;">
        <td style="width:100px;">
            <lable>Imagem:</lable>

        </td>
        <td style="width:400px;">
            <?php
                if(isset($imagem)){
                    echo($imagem);
                }
            ?>
        </td>
    </tr>
    <tr style="width:100%;heigth:20px;">
        <td style="width:100px;">
            <lable>Descrição:</lable>

        </td>
        <td style="width:400px;">
            <?php
                if(isset($descricao)){
                    echo($descricao);
                }
            ?>
        </td>
    </tr>
    <tr style="width:100%;heigth:20px;">
        <td style="width:100px;">
            <lable>Preco:</lable>

        </td>
        <td style="width:400px;">
            <?php
                if(isset($preco)){
                    echo($preco);
                }
            ?>
        </td>
    </tr>
<!--
    <tr style="width:100%;heigth:20px;">
        <td style="width:100px;">
            <lable>Home Page:</lable>

        </td>
        <td style="width:400px;">
            <?php
//                if(isset($homep)){
//                    echo($homep);
//                }
            ?>
        </td>
    </tr>
-->
    <tr style="width:100%;heigth:20px;">
        <td style="width:100px;">
            <lable>Status:</lable>
        </td>
        <td style="width:400px;">
            <?php
                if(isset($status)){

                    if($status == 'A'){
                        echo('Ativado');

                    }else{
                        echo('Desativado');

                    }
                }
            ?>
        </td>
    </tr>
</table>