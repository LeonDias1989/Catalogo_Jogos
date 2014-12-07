<?php 

	include "../html/header2.php";
	require "../controller/validacao.php";

 ?>

 	<main>

		<section>

			<div class="form_dados">

					<form action="../controller/removerUsuario.php" method="post">


						<fieldset>

							<legend>Remover Usuário</legend>

							<label>Para remover usuário confirme seu e-mail e senha</label>
							<br><br>
							<label for="email">E-mail: </label>
							<input type="email" id="email" name="email">
							<br><br>

							<label for="senha">Senha: </label>
							<input type="password" id="senha" name="senha">
							<br><br>


							<input type="submit" value="Remover" name="remover">

							<input type="reset" value="Limpar">



						</fieldset>	

						

					</form>
					<a href="page_alterarDados.php">Voltar</a>
				</div>




		</section>

 	</main>


 <?php 

 	include "../html/footer.php";


  ?>