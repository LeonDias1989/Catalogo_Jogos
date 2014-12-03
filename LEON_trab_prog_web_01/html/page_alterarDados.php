<?php 

	include "../html/header2.php";

 ?>

 	<main>

		<section>

			<article>


				<div>

					<form action="../controller/alterarDados.php" method="post">

						<label>Nome: </label>
						<input type="text" id="nome" name="nome">
						<br>

						<label>Sobrenome: </label>
						<input type="text" id="sobrenome" name="sobrenome">
						<br>

						<label>Idade: </label>
						<input type="text" id="idade" name="idade">
						<br>

						<label>E-mail: </label>
						<input type="email" id="email" name="email">
						<br>

						<label>Senha: </label>
						<input type="password" id="senha" name="senha">
						<br>

						<input type="submit" value="Alterar Dados">

						<input type="reset" value="Limpar">

					</form>




				</div>


			</article>


		</section>

 	</main>


 <?php 

 	include "../html/footer.php";


  ?>