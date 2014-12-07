<?php 

	include 'ConectarBD.class.php';
	include '../entidades/Usuario.class.php';
	
	class UsuarioBD
	{
		//Criando um objeto para estabelecer a conexão com o banco de dados

		private $conexaoBD;

		function __construct(){

			$this->conexaoBD = new ConectarBD();

		}

		/**
		*/

		function cadastrarUsuario($usuario){

			$this->conexaoBD->conectar();


			$querySelectEmail = $this->conexaoBD->getPDO()->prepare("SELECT email FROM usuario WHERE email = :email");

			$querySelectEmail->bindValue(":email", $usuario->__get("email"));

			$querySelectEmail->execute();

			$linhasAfetadas = $querySelectEmail->rowCount();
			
			if ($linhasAfetadas  == 0) {

				$queryInsertUser = $this->conexaoBD->getPDO()->prepare("INSERT INTO usuario (nome, sobrenome, idade, sexo, email, senha) VALUES
				(:nome, :sobrenome, :idade, :sexo, :email, :senha)");

		
				$queryInsertUser->bindValue(":nome", $usuario->__get("nome"));
				$queryInsertUser->bindValue(":sobrenome", $usuario->__get("sobrenome"));
				$queryInsertUser->bindValue(":idade", $usuario->__get("idade"));
				$queryInsertUser->bindValue(":sexo", $usuario->__get("sexo"));
				$queryInsertUser->bindValue(":email", $usuario->__get("email"));
				$queryInsertUser->bindValue(":senha", $usuario->__get("senha"));


				
				$queryInsertUser->execute();

				echo "<script>alert('Usuário inserido com sucesso!  Agora inicie a sessão!');</script>";
				header("refresh:1; url=../html/index.php");
				
			
			}
			else{

				echo "<script>alert('ERRO     Esta conta de e-mail já está cadastrada!');</script>";
				header("refresh:5; url=../html/page_header.php");

			}

			$this->conexaoBD->desconectar();


		}

	
		function autenticarUsuario($usuario){

		$this->conexaoBD->conectar();

		$querySelectUser = $this->conexaoBD->getPDO()->prepare("SELECT email, senha FROM usuario WHERE email = :email and senha = :senha");

		$querySelectUser->bindValue(":email", $usuario->__get("email"));
		$querySelectUser->bindValue(":senha", $usuario->__get("senha"));

		$querySelectUser->execute();

		return $querySelectUser->rowCount();
		
		}

		function getID($usuario){

			$this->conexaoBD->conectar();
			$stm = $this->conexaoBD->getPDO();

			$querySelectId = $stm->prepare("SELECT id FROM usuario WHERE email = :email");
			$querySelectId->bindValue(":email", $usuario->__get("email"));


			$querySelectId->execute();
			$id;

			while ($linha = $querySelectId->fetch(PDO:: FETCH_ASSOC)) {

				$id = $linha["id"];		
			}

			$this->conexaoBD->desconectar();
			return $id;
		}

		function visualizar($usuario = ""){


			$this->conexaoBD->conectar();
			$stm = $this->conexaoBD->getPDO();

			if($usuario ==""){

				$querySelectUser = $stm->prepare("SELECT * FROM usuario");

				$querySelectUser->execute();
				
				while ($linha = $querySelectUser->fetch(PDO:: FETCH_ASSOC)) {

					//TODO: para fazer uma tabela aqui
					echo $linha["nome"] .", " .$linha["email"] ."<br/>";
				}
			}
			else{	
		
				//Consulta para obter a id do usuário passado no método
				$querySelectUser = $stm->prepare("SELECT * FROM usuario WHERE email = :email");
				
				$querySelectUser->bindValue(":email", $usuario->__get("email"));
				
				$querySelectUser->execute();

				while ($linha = $querySelectUser->fetch(PDO:: FETCH_ASSOC)) {

					//TODO: para fazer uma tabela aqui
					echo $linha["nome"] .", " .$linha["email"] ."<br/>";
				}

			}
			$this->conexaoBD->desconectar();

		}


		function alterarDados($usuario){

			$this->conexaoBD->conectar();
			$stm = $this->conexaoBD->getPDO();

			$queryUpdateUser = $stm->prepare("UPDATE usuario SET nome = :nome, sobrenome=:sobrenome, idade=:idade WHERE email = :email AND senha = :senha");

			$queryUpdateUser->bindValue(":nome", $usuario->__get("nome"));
			$queryUpdateUser->bindValue(":sobrenome", $usuario->__get("sobrenome"));
			$queryUpdateUser->bindValue(":idade", $usuario->__get("idade"));
			$queryUpdateUser->bindValue(":email", $usuario->__get("email"));
			$queryUpdateUser->bindValue(":senha", $usuario->__get("senha"));

			$queryUpdateUser->execute();

			$linhasAfetadas = $queryUpdateUser->rowCount();

			if($linhasAfetadas>0){

				//header("location: ../html/page_alterarDados.php");
				echo "<script>alert('Dados alterados com sucesso!');</script>";
				header("refresh:1; url=../html/page_alterarDados.php");
			}
			else{

				echo "<script>alert('Não foi possível alterar os dados!');</script>";
				header("refresh:1; url=../html/page_alterarDados.php");

			}

			$this->conexaoBD->desconectar();
		}

		
		function deletarUsuario($usuario, $id){

			$this->conexaoBD->conectar();
			$stm = $this->conexaoBD->getPDO();

			$queryDeleteUser = $stm->prepare("DELETE FROM usuario WHERE email = :email and senha = :senha
				and id = :id");
			$queryDeleteUser->bindValue(":email", $usuario->__get("email"));
			$queryDeleteUser->bindValue(":senha", $usuario->__get("senha"));
			$queryDeleteUser->bindValue(":id", $id);
			$queryDeleteUser->execute();

			if($queryDeleteUser->rowCount() > 0){

			echo "<script>alert('O usuário foi excluido com êxito!');</script>";
			header("refresh:1; url=../html/page_logout.php");	

			 

			}
				else{

					echo "<script>alert('Não foi possível excluir o usuário!');</script>";
					header("refresh:1; url=../html/page_alterarDados.php");	


				}
					

			$this->conexaoBD->desconectar();

		}

		

	}

	

	/*
	
	$user = new UsuarioBD();
	$user->alterarDados(new Usuario("Noel", "Said", 52, "M", "leondias1989@gmail.com", "abcd1234"));

	---------------------
	$usuario = new UsuarioBD();

	echo $usuario->getID(new Usuario(null, null, null, null, "trevor.vida_louca@yahoo.com.br", null));

	**/
	
 ?>
