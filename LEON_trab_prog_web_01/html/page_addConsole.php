<?php 

	include "header2.php";
	require "../controller/validacao.php";

 ?>

 	<main>
		
		
			<div class="form_console">

			 		<form action = "../controller/cadastrarConsole.php" method="post">

					<fieldset>


						<legend>Cadastre um Novo Vídeo Game</legend>
						<br/>
						
						<label for="nome">Nome</label>
						<input type="text"  name="nome" id="nome">
						<br/><br/>
						
						<label for="midia">Midia Física</label>
						<input type="text" name="midia" id="midia">
						<br/><br/>
						
						<label for="geracao" >Geração</label>
						<input type="text" name="geracao" id="geracao">
						<br/><br/>	
						
						<label for="fabricante">Fabricante</label>
						<input type="text" name="fabricante" id="fabricante">
						<br/><br/>
						
						
						<br/><br/>
						

						<input type="submit" value="Cadastrar" name="cadastrar" id="cadastrar">
						
					</fieldset>


					</form>
					<a href="page_addJogo.php">Voltar</a>

			</div>

		
 		
 	</main>


<?php 


	include "footer.php";

?>