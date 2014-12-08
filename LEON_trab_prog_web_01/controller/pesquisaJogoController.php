<?php 


	require "validacao.php";
	include "../dao/JogoBD.class.php";

	//selecionarJogo

	$nome = $_POST["valor"];

	$jogo = new Jogo($nome, null, null, null , null);

	$jogoDAO = new JogoBD();

	$jogoDAO->selecionarJogo($jogo);	




 ?>