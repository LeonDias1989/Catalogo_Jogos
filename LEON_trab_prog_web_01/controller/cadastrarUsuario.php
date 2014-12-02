<?php 

	include '../dao/UsuarioBD.class.php';
	include '../html/page_header.php';
	
	
	$nome = $_POST["nomeUsuario"];
	$sobrenome = $_POST["sobreNomeUsuario"];
	$idade = $_POST["idade"];
	$sexo = $_POST["sexo"];
	$email = $_POST["email"];
	$senha = $_POST["senha"];

	//Criptografando a senha e passando para outro atributo
	$senhaCriptografada = md5($senha);

	//Criando um objeto usuário para ser gravado
	$usuario = new Usuario($nome, $sobrenome, $idade, $sexo, $email, $senhaCriptografada);
		
	//criando um objeto usuário DAO
	$userBD = new UsuarioBD();


	//Cadastrando o usuário na base de dados
	$userBD->cadastrarUsuario($usuario);


	




	










 ?>
