<?php 
	
	include "../html/header2.php";
	include "../dao/JogoBD.class.php";
	require "../controller/validacao.php";

 ?>

	<main>


		<?php 
		
			$j = new JogoBD();
			$j->visualizarJogoUsuario($_SESSION["id"]);

			

		 ?>

	</main>

