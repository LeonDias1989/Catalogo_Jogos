<?php 


	include "../dao/UsuarioBD.class.php";
	


	$nome = $_POST["nome"];
	$sobrenome = $_POST["sobrenome"];
	$idade = $_POST["idade"];
	$email = $_POST["email"];
	$senha = $_POST["senha"];


	$usuario = new Usuario($nome, $sobrenome, $idade, null, $email, md5($senha));

	$usuarioDAO = new UsuarioBD();

	$usuarioDAO->alterarDados($usuario);



 ?>