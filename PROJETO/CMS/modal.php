<?php 
    if(isset($_GET['codigo']))
    {
        require_once('../bd/conexao.php');
	    $conexao = conexaoMysql();
        
        $codigo = $_GET['codigo'];
        $sql = "SELECT * FROM tbl_contato WHERE codigo =".$codigo;
        $select = mysqli_query($conexao, $sql);
        
        //recordset(rsContatos)=result, retorna dados do banco
        if($rscontato=mysqli_fetch_array($select))
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
                $profissao = $rscontato['produto'];
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
<div>
    <a href="#" id="fechar">fechar</a>
</div>
<table>
    <tr>
        <td>Nome:</td>
        <td><?php echo($nome)?></td>
    </tr>
    <tr>
        <td>Telefone:</td>
        <td><?php echo($telefone)?></td>
    </tr>
    <tr>
        <td>Celular:</td>
        <td><?php echo($celular)?></td>
    </tr>
    <tr>
        <td>Email:</td>
        <td><?php echo($email)?></td>
    </tr>
    <tr>
        <td>Home Page:</td>
        <td><?php echo($homep)?></td>
    </tr>
    <tr>
        <td>facebook:</td>
        <td><?php echo($facebook)?></td>
    </tr><tr>
        <td>Produto:</td>
        <td><?php echo($produto)?></td>
    </tr><tr>
        <td>Profissão:</td>
        <td><?php echo($profissao)?></td>
    </tr>
    <tr>
        <td>Sugestões.:</td>
        <td><?php echo($sugestoes)?></td>
    </tr>
    <tr>
        <td>Sexo:</td>
        <td><?php echo($sexo)?></td>
    </tr>
</table>