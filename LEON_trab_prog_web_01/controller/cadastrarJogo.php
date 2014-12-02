<?php 


	include '../dao/JogoBD.class.php';
	include '../html/pageCadastroJogo.php';
	

	$nome = $_POST["nome"];
	$distribuidora = $_POST["distribuidora"];
	$genero = $_POST["genero"];
	$idioma = $_POST["idioma"];
	$faixa = $_POST["faixa"];

	
	//cria-se um objeto do tipo jogo e já o instancia com os dados coletados do formulário
	$jogo = new Jogo($nome, $distribuidora, $genero, $idioma, $faixa);

	//cria-se um objeto do tipo JogoDB que irá mandar as informações para o banco de dados
	$jogoDAO = new JogoBD();

	$jogoDAO->cadastrarJogo($jogo);






 ?>