<?php

	function conexaoMysql(){
		
		/*
		mysql_connect() - biblioteca de conexao com BD mysql,
		vigente até o php 5.6

		mysqli() - biblioteca de conexao com BD mysql,
		vigente as versoes atuais

		PDO - biblioteca de conexao com BD mysql mais
		utilizada em projetos de orientacao a onjetos
		*/

		//variavel que vai receber a conexao com o bd
		$conexao = null;

		//variaveis para estabelecer a conexao com o banco
		$server = "localhost";
		$user = "root";
		$password = "binho250398";
		$database = "dbcontato";

		$conexao = mysqli_connect($server,$user,$password,$database);
		
		return $conexao;
		
	}

?>