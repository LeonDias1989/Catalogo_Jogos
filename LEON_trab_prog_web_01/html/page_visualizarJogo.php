<?php 

	include "../html/header2.php";
	include "../dao/JogoBD.class.php";

 ?>

 	<main>

 		<?php 

 			$JogoBD = new JogoBD();

 			$JogoBD->visualizar();
 			

 		 ?>

 	</main>


 