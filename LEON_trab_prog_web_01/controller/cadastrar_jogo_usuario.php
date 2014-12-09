<?php 

	//Sempre utilizar o require para obter a sessão do usuário e por conseguinte seu id
	require "../controller/validacao.php";
	include "../dao/JogoBD.class.php";

	$total;

	foreach ($_POST["jogos"] as $id_jogo) {


		$jogoDAO = new JogoBD();
		$total = $jogoDAO->cadastrarJogoUsuario($id_jogo, $_SESSION["id"]);

		//Aqui será inserido o jogo através da consulta da classe dao
		//echo "ID do jogo escolhido: " .$jogos ."<br>";
	}
			
			if($total > 0){

				echo "<script>alert('Jogo(s) Inserido(s) com sucesso!');</script>";
				header("refresh:1; url=../html/page_visualizarJogo.php");
				
			}
			else{
				echo "<script>alert('ERRO     Não foi possível inserir!');</script>";
				header("refresh:1; url=../html/page_visualizarJogo.php");
			}



 ?>