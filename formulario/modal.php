<?php 
    if(isset($_GET['codigo']))
    {
        require_once('bd/conexao.php');
	    $conexao = conexaoMysql();
        
        $codigo = $_GET['codigo'];
        $sql = "select * from tblcontatos where codigo =".$codigo;
        $select = mysqli_query($conexao, $sql);
        
        //recordset(rsContatos)=result, retorna dados do banco
        if($rscontato=mysqli_fetch_array($select))
        {
                $nome = $rscontato['nome'];
				$endereco = $rscontato['endereco'];
				$bairro = $rscontato['bairro'];
				$cep = $rscontato['cep'];
				$telefone = $rscontato['telefone'];
				$celular = $rscontato['celular'];
				$email = $rscontato['email'];
				
				//formata a data do padrao americano para o brasileiro
				$data_nasc = explode("-", $rscontato['data_nasc']);
				$data_nasc = $data_nasc[2]. "/".$data_nasc[1]. "/".$data_nasc[0];
                
                $sexo = $rscontato['sexo'];
                $obs = $rscontato['obs'];
        }
    }

?>
<<<<<<< HEAD
//modal
=======
<link rel="stylesheet" type="text/css" href="css/style.css">
>>>>>>> 58562b25220c2e2810a41e100a7f6f2fde9efae9
<script>
    $(document).ready(function(){
        $('#fechar').click(function(){
            jQuery('#container').fadeOut(400);
        });
    });
</script>
<div>
<<<<<<< HEAD
    <a href="#" id="fechar">fechar</a>
=======
    <a href="#" id="fechar">
        <input type="button" id="btn-fechar" value="X">    
        
    </a>
>>>>>>> 58562b25220c2e2810a41e100a7f6f2fde9efae9
</div>
<table>
    <tr>
        <td>Nome:</td>
<<<<<<< HEAD
        <td><?php echo($nome)?></td>
=======
        <td><?php
                echo($nome);
            ?>
        </td>
>>>>>>> 58562b25220c2e2810a41e100a7f6f2fde9efae9
    </tr>
    <tr>
        <td>Endereço:</td>
        <td><?php echo($endereco)?></td>
    </tr>
    <tr>
        <td>Bairro:</td>
        <td><?php echo($bairro)?></td>
    </tr>
    <tr>
        <td>Cep:</td>
        <td><?php echo($cep)?></td>
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
        <td>Dt. Nasc.:</td>
        <td><?php echo($data_nasc)?></td>
    </tr>
    <tr>
        <td>Sexo:</td>
        <td><?php echo($sexo)?></td>
    </tr>
    <tr>
        <td>Obs.:</td>
        <td><?php echo($obs)?></td>
    </tr>
</table>