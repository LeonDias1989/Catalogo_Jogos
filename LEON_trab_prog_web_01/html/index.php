<?php 

	include "../html/header.php";

 ?>

	<main>

		<section id="titulo">

			<h1>Faça <i>log-on</i> ou cadastre-se</h1>	

		</section>

		

		<section id="log">

			<div class="log">

					<form action="../controller/cadastrarUsuario.php" method="post">	

						<fieldset>

							<legend>Cadastrar Usuário</legend>

							<label>Complete os dados do formulário</label>
							<br/><br/>
							<label for ="nomeUsuario" >Nome: </label>
							<input type="text" id="nomeUsuario" name="nomeUsuario">
							<br/><br/>
							<label for ="sobreNomeUsuario" >Sobrenome: </label>
							<input type="text" id="sobreNomeUsuario" name="sobreNomeUsuario">
							<br/><br/>
							<label for ="idade" >Idade: </label>	
							<input type="text" id="idade" name="idade">
							<br/><br/>

							<label for ="sexo" >Sexo: </label>	
							<input type="text" id="sexo" name="sexo">	
							<br/><br/>

							<label for ="email" >E-mail: </label>	
							<input type="email" id="email" name="email">
							<br/><br/>
							<label for ="senha" >Senha: </label>	
							<input type="password" id="senha" name="senha">					

							<br/><br/>

							<input type="submit" id="enviar" nome="enviar" value="Cadastrar">

						</fieldset>

					</form>

					</div>


			
		
		</section>
		<!--
			Aqui encerra a sessão de logs
		-->

		<section id="imagens">

			<article>

				<figure>

					<img src="../imgs/gears.jpg">

				</figure>

			</article>

			<article>

				<figure>

					<img src="../imgs/gta5.jpg">

				</figure>

			</article>

			
			<article>
				<figure>

					<img src="../imgs/max.jpg">

				</figure>
			</article>

			<article>
				<figure>

					<img src="../imgs/mg4.jpg">

				</figure>
			</article>

			<article>
				<figure>

					<img src="../imgs/crash.jpg">

				</figure>
			</article>

			<article>
				<figure>

					<img src="../imgs/ff9.jpg">

				</figure>
			</article>

			<article>
				<figure>

					<img src="../imgs/gt6.jpg">

				</figure>
			</article>

			<article>
				<figure>

					<img src="../imgs/mario.png">

				</figure>
			</article>

	</section>

	</main>	

	<footer>


	</footer>

	</body>

</html>