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
<div id="box-btn-modal">
    <a href="cms-fale-conosco.php">
        <input type="button" id="btn-fechar" value="X">
    </a>
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
        <div><?php echo($nome)?></div>
        <div><?php echo($telefone)?></div>
        <div><?php echo($celular)?></div>
        <div><?php echo($email)?></div>
        <div><?php echo($homep)?></div>
        <div><?php echo($facebook)?></div>
        <div><?php echo($produto)?></div>
        <div><?php echo($profissao)?></div>
        <div><?php echo($sugestoes)?></div>
        <div><?php echo($sexo)?></div>
    </div>
</div>