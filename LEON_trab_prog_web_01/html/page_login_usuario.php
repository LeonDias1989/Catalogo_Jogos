<?php 
	
	include "../html/header.php";


 ?>

 	<main>


 		<div class="logon">

 			<form action="../controller/autenticar.php" method="post">

				<fieldset>

					<legend>Entrar</legend>
				
							
						<label>Insira seu e-mail e senha</label>

						<br/><br/>
						<label for="email">Email:</label>
						<input name="email" id="email" type="email" required/>

						<br/><br/>
						<label for="senha">Senha:</label>
						<input name="senha" id="senha" type="password" required/>

						<br/><br/>
						<input name="acao" type="submit" value="Entrar" />
						
				</fieldset>
	
			</form>

		</div>
 		

	</main>



 <?php 

 	include "../html/footer.php";

  ?>