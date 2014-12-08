<?php 

	require "../controller/validacao.php";
	include "../dao/JogoBD.class.php";

	$totalRemovidos;

	foreach ($_POST["jogos_usuario"] as $idJogoUsuario) {

		$jogoDAO = new JogoBD();


		$totalRemovidos = $jogoDAO->removerJogoUsuario($idJogoUsuario, $_SESSION["id"]);
	}


		if($totalRemovidos > 0){

				echo "<script>alert('Jogo(s) Removido(s) com sucesso!');</script>";
				header("refresh:1; url=../html/inicial.php");
				
			}
			else{
				echo "<script>alert('ERRO     Não foi possível Remover!');</script>";
				header("refresh:1; url=../html/inicial.php");
			}


 ?>