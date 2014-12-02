<html>
<head>
	<title>Cadastro de Jogos</title>
</head>
<body>

	<form action = "../controller/cadastrarJogo.php" method="post">

		<fieldset>


			<legend>Cadastre um Novo Jogo</legend>


			<label for="nome">Nome</label>
			<input type="text"  name="nome" id="nome">

			<label for="distribuidora">Distribuidora</label>
			<input type="text" name="distribuidora" id="distribuidora">

			<label for="genero" >Gênero</label>
			<input type="text" name="genero" id="genero">
				
			<label for="idioma">Idioma</label>
			<input type="text" name="idioma" id="idioma">
				
			<label for="faixa">Faixa Etária</label>
			<input type="text" name="faixa" id="faixa">

			<input type="submit" value="Cadastrar" name="cadastrar" id="cadastrar">
			
		</fieldset>


	</form>

</body>
</html>