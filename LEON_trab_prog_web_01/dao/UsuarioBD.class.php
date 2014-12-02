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


				echo "Usuário inserido com sucesso!";
			
			}
			else{

				echo "Esta conta de e-mail já está cadastrada!";

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

		function alterarNome($email, $novoNome){

			$this->conexaoBD->conectar();
			$stm = $this->conexaoBD->getPDO();

			$queryUpdateUser = $stm->prepare("UPDATE usuario SET nome = :novoNome WHERE email = :email");

			$queryUpdateUser->bindValue(":novoNome", $novoNome);
			$queryUpdateUser->bindValue(":email", $email);

			$queryUpdateUser->execute();

			$linhasAfetadas = $queryUpdateUser->rowCount();

			if($linhasAfetadas>0){

				echo "Dado Alterado com sucesso!";
			}
			else{

				echo "Não foi possível alterar o dado!";

			}

			$this->conexaoBD->desconectar();
		}

		function alterarSobrenome($email, $novoNome){

			$this->conexaoBD->conectar();
			$stm = $this->conexaoBD->getPDO();

			$queryUpdateUser = $stm->prepare("UPDATE usuario SET sobrenome = :novoNome WHERE email = :email");

			$queryUpdateUser->bindValue(":novoNome", $novoNome);
			$queryUpdateUser->bindValue(":email", $email);

			$queryUpdateUser->execute();

			$linhasAfetadas = $queryUpdateUser->rowCount();

			if($linhasAfetadas>0){

				echo "Dado Alterado com sucesso!";
			}
			else{

				echo "Não foi possível alterar o dado!";

			}

			$this->conexaoBD->desconectar();
		}

		function alterarIdade($email, $idadeDepois){

			$this->conexaoBD->conectar();
			$stm = $this->conexaoBD->getPDO();

			$queryUpdateUser = $stm->prepare("UPDATE usuario SET idade = :idadeDepois WHERE email = :email");

			$queryUpdateUser->bindValue(":email", $email);
			$queryUpdateUser->bindValue(":idadeDepois", $idadeDepois);
			
			

			$queryUpdateUser->execute();

			$linhasAfetadas = $queryUpdateUser->rowCount();

			if($linhasAfetadas>0){

				echo "Dado Alterado com sucesso!";
			}
			else{

				echo "Não foi possível alterar o dado!";

			}

			$this->conexaoBD->desconectar();
		}

		function deletarUsuario($usuario){

			$this->conexaoBD->conectar();
			$stm = $this->conexaoBD->getPDO();

			$queryDeleteUser = $stm->prepare("DELETE FROM usuario WHERE email = :email");
			$queryDeleteUser->bindValue("email", $usuario->__get("email"));
			$queryDeleteUser->execute();

			if($queryDeleteUser->rowCount() > 0){ echo "O usuário foi excluido com êxito";}
				else
					echo "Não foi possível excluir o usuário!";

			$this->conexaoBD->desconectar();

		}

		

	}
	
 ?>
