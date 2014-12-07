<?php 

	//Sempre utilizar o require para obter a sessão do usuário e por conseguinte seu id
	require "../controller/validacao.php";
	include "../dao/JogoBD.class.php";


	foreach ($_POST["jogos"] as $id_jogo) {


		$jogoDAO = new JogoBD();
		$jogoDAO->cadastrarJogoUsuario($id_jogo, $_SESSION["id"]);

		//Aqui será inserido o jogo através da consulta da classe dao
		//echo "ID do jogo escolhido: " .$jogos ."<br>";
	}



 ?>