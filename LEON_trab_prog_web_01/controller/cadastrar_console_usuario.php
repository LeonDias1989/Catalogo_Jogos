<?php 

	//Sempre utilizar o require para obter a sessão do usuário e por conseguinte seu id
	require "../controller/validacao.php";
	include "../dao/ConsoleBD.class.php";

	$total;

	foreach ($_POST["consoles"] as $id_console) {


		$consoleDAO = new ConsoleBD();
		$total = $consoleDAO->cadastrarConsoleUsuario($id_console, $_SESSION["id"]);

		
	}
			
			if($total > 0){

				echo "<script>alert('Console(s) Inserido(s) com sucesso!');</script>";
				header("refresh:1; url=../html/page_visualizarConsole.php");
				
			}
			else{
				echo "<script>alert('ERRO     Não foi possível inserir!');</script>";
				header("refresh:1; url=../html/page_visualizarConsole.php");
			}



 ?>