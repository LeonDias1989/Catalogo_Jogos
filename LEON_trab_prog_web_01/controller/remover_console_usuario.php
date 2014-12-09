<?php 

	require "../controller/validacao.php";
	include "../dao/ConsoleBD.class.php";

	$totalRemovidos;

	foreach ($_POST["console_usuario"] as $idConsoleUsuario) {

		$consoleDAO = new ConsoleBD();


		$totalRemovidos = $consoleDAO->removerConsoleUsuario($idConsoleUsuario, $_SESSION["id"]);
	}


		if($totalRemovidos > 0){

				echo "<script>alert('Console(s) Removido(s) com sucesso!');</script>";
				header("refresh:1; url=../html/page_Consoles.php");
				
			}
			else{
				echo "<script>alert('ERRO     Não foi possível Remover!');</script>";
				header("refresh:1; url=../html/page_Consoles.php");
			}


 ?>