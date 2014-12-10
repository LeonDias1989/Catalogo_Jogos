<?php 

	include "../html/header2.php";
	require "../controller/validacao.php";

 ?>

 	<main>

		<section>

			<div class="form_dados">

					<form action="../controller/alterarDados.php" method="post">


						<fieldset>

							<?php 

								include "../dao/UsuarioBD.class.php";
								

								$usuarioDAO = new UsuarioBD();
								$usuario = $usuarioDAO->getUser($_SESSION["id"]);

							 ?>

							<legend>Alterar Dados do Usuário</legend>

							<label>Nome: </label>
							<input type="text" id="nome" name="nome" value= "<?php 

								

								echo $usuario->__get("nome");


							 ?>">
							<br><br>

							<label>Sobrenome: </label>
							<input type="text" id="sobrenome" name="sobrenome" value = "<?php 

								
								echo $usuario->__get("sobrenome");

							 ?>">
							<br><br>

							<label>Idade: </label>
							<input type="text" id="idade" name="idade" value = "<?php 



								echo $usuario->__get("idade");

							 ?>">
							<br><br/>

							<label>Confirme seu e-mail e senha:</label>
							<br/><br/>
							<label>E-mail: </label>
							<input type="email" id="email" name="email">
							<br><br>

							<label>Senha: </label>
							<input type="password" id="senha" name="senha">
							<br><br>

							<input type="submit" value="Alterar Dados">

							<input type="reset" value="Limpar">



						</fieldset>	

						

					</form>
					<a href="page_removeUsuario.php">Cancelar minha conta</a>
				</div>




		</section>

 	</main>


 <?php 

 	include "../html/footer.php";


  ?>