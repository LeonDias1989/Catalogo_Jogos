<?php 

	include "../html/header2.php";
	include "../dao/JogoBD.class.php";
	require "../controller/validacao.php";
	
 ?>

 	<main>

 		<?php 

 			$JogoBD = new JogoBD();

 			$JogoBD->visualizar();
 			

 		 ?>

 	</main>


 