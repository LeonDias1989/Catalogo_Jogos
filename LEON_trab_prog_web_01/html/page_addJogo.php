<?php 

	include "header2.php";
	require "../controller/validacao.php";

 ?>

 	<main>
		
		

			<div class="form">

			 		<form action = "../controller/cadastrarJogo.php" method="post">

					<fieldset>


						<legend>Cadastre um Novo Jogo</legend>
						<br/>
						
						<label for="nome">Nome</label>
						<input type="text"  name="nome" id="nome">
						<br/><br/>
						
						<label for="distribuidora">Distribuidora</label>
						<input type="text" name="distribuidora" id="distribuidora">
						<br/><br/>
						
						<label for="genero" >Gênero</label>
						<input type="text" name="genero" id="genero">
						<br/><br/>	
						
						<label for="idioma">Idioma</label>
						<input type="text" name="idioma" id="idioma">
						<br/><br/>
						
						<label for="faixa">Faixa Etária</label>
						<input type="text" name="faixa" id="faixa">
						<br/><br/>
						

						<input type="submit" value="Cadastrar" name="cadastrar" id="cadastrar">
						
					</fieldset>


					</form>
					<a href="page_addConsole.php">Clique aqui para adicionar um novo Console</a>

			</div>

				
 		
 	</main>


<?php 


	include "footer.php";

?>