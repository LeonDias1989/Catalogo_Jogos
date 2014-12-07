<?php 
	
	require "../controller/validacao.php";
	

	if (isset($_POST["remover"])) {

		
		include "../dao/UsuarioBD.class.php";
		
		$email = $_POST["email"];
		$senha = $_POST["senha"];

		$senhaCript = md5($senha);

		//$nome="", $sobrenome="", $idade="", $sexo="", $email="", $senha=""
		$usuario = new Usuario(null, null, null , null, $email, $senhaCript);

		$usuarioDAO = new UsuarioBD();

		$usuarioDAO->deletarUsuario($usuario, $_SESSION["id"]);



	}




 ?>