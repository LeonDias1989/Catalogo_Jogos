<?php 


	
	

		include '../dao/UsuarioBD.class.php';


		$nome = $_POST["nomeUsuario"];
		$sobrenome = $_POST["sobreNomeUsuario"];
		$idade = $_POST["idade"];
		$sexo = $_POST["options"];
		$email = $_POST["email"];
		$senha = $_POST["senha"];
		$senhaConf = $_POST["senhaConf"];


		if ($senha == $senhaConf) {

			//Criptografando a senha e passando para outro atributo
			$senhaCriptografada = md5($senha);

			//Criando um objeto usuário para ser gravado
			$usuario = new Usuario($nome, $sobrenome, $idade, $sexo, $email, $senhaCriptografada);
				
			//criando um objeto usuário DAO
			$userBD = new UsuarioBD();


			//Cadastrando o usuário na base de dados
			$userBD->cadastrarUsuario($usuario);
			
		}
		else{

			echo "<script>alert('Insira as senha iguais!')</script>";
				header("refresh:1; url=../html/index.php");

		}
	
	
	


	




	










 ?>
