<?php 

	if (isset($_POST["cadastrar"])) {

		
		include "../dao/ConsoleBD.class.php";
		
		$nome = $_POST["nome"];
		$midia = $_POST["midia"];
		$geracao = $_POST["geracao"];
		$fabricante = $_POST["fabricante"];

		$console = new Console($nome, $midia, $geracao, $fabricante);

		$consoleDAO = new ConsoleBD();

		$consoleDAO->addConsole($console);


	}




 ?>