<?php 

	include "../html/header2.php";
	include "../dao/ConsoleBD.class.php";
	require "../controller/validacao.php";
	
 ?>

 	<main>

 		<?php 

 			$consoleBD = new ConsoleBD();

 			$consoleBD->visualizar();
 			

 		 ?>

 	</main>


 