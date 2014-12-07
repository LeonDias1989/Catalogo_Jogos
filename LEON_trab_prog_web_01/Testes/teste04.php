<?php 
	
	require "../controller/validacao.php";

	echo "Id do usuário: " .$_SESSION["id"] ."<br/><br/>";

	foreach ($_POST["jogos"] as $jogos) {

		echo "ID do jogo escolhido: " .$jogos ."<br>";
	}



 ?>