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
		 <br/><br/><br/><br/><br/>
		 <a href="page_consoles.php">Visualizar Meus Vídeo Games</a>

	</main>

