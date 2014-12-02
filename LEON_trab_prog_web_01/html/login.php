<!DOCTYPE html>
<html> 
<head>
	<title>Formulário de autenticação</title>
 
	<style type="text/css">
		body { font-family: arial; }
		input { margin-bottom: 20px; border: 1px solid #999; }
		input, label { display: block; }
	</style>
		
</head>
<body>

	<form action="../controller/autenticar.php" method="post">
		
		<!-- type do tipo "email" valida sintaxe -->
		<label for="email">Email:</label>
		<input name="email" id="email" type="email" required/>

		<label for="senha">Senha:</label>
		<input name="senha" id="senha" type="password" required/>

		<input name="acao" type="submit" value="Entrar" />
	

	</form>

</body>
</html>