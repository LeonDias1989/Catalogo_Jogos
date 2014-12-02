<html>
<head>
	<title>Cadastro Usuario</title>
</head>
<body>

	<form action="../controller/cadastrarUsuario.php" method="post">	

		<fieldset>

			<legend>Cadastrar Usuário</legend>

			<label for ="nomeUsuario" >Nome: </label>
			<input type="text" id="nomeUsuario" name="nomeUsuario">


			<label for ="sobreNomeUsuario" >Sobrenome: </label>
			<input type="text" id="sobreNomeUsuario" name="sobreNomeUsuario">


			<label for ="idade" >Idade: </label>	
			<input type="text" id="idade" name="idade">

			<br/><br/>

			<label for ="sexo" >Sexo: </label>	
			<input type="text" id="sexo" name="sexo">	


			<label for ="email" >E-mail: </label>	
			<input type="email" id="email" name="email">

			<label for ="senha" >Senha: </label>	
			<input type="password" id="senha" name="senha">					

			<br/><br/><br/>

			<input type="submit" id="enviar" nome="enviar" value="Cadastrar">

		</fieldset>

	</form>

</body>
</html>