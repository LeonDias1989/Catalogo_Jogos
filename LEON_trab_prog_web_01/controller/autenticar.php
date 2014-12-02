<?php 



	if (ISSET($_POST["acao"])) {

		include '../dao/UsuarioBD.class.php';
		
		$email = $_POST["email"];
		$senha = $_POST["senha"];

		
		$usuarioBD = new UsuarioBD();		

		$usuario = new Usuario(null, null, null, null, $email, md5($senha));

		$linhasAfetadas = $usuarioBD->autenticarUsuario($usuario);
		

		if ($linhasAfetadas > 0 ) {
			
			session_start();
			header("location: ../html/inicial.php");
		}
		else{

			echo "<h1>Usuário ou Senha Inválidos !";
			header("refresh:5; url=../html/login.php");
		}

	}










 ?>