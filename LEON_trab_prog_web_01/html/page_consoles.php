<?php 
	
	include "../html/header2.php";
	include "../dao/ConsoleBD.class.php";
	require "../controller/validacao.php";

 ?>

	<main>


		<?php 
		
			$c = new ConsoleBD();
			$c->visualizarConsoleUsuario($_SESSION["id"]);

			

		 ?>
		 

	</main>