<?php 



	if (ISSET($_POST["acao"])) {

		include '../dao/UsuarioBD.class.php';
		
		$email = $_POST["email"];
		$senha = $_POST["senha"];

		
		$usuarioBD = new UsuarioBD();		

		$usuario = new Usuario(null, null, null, null, $email, md5($senha));

		$linhasAfetadas = $usuarioBD->autenticarUsuario($usuario);
		

		if ($linhasAfetadas > 0 ) {
			
			//iniciando a sessão
			session_start();

			//Atribuindo um id à mesma
			$_SESSION["id"] = $usuarioBD->getID($usuario);
			
			header("location: ../html/inicial.php");
		}
		else{

			echo "<script>alert('ERRO Usuário ou Senha Inválidos !');</script>";
			header("refresh:1; url=../html/index.php");
		}

	}










 ?>