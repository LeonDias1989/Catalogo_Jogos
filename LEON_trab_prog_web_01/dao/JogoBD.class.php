<?php 

	include 'ConectarBD.class.php';
	include '../entidades/Jogo.class.php';

	class JogoBD
	{

		private $conexao;
		
		function __construct()
		{
			//iniciando a conexão no banco de dados
			$this->conexao = new ConectarBD();
		}


		

		function cadastrarJogo($jogo){

			$this->conexao->conectar();

			$querySelectJogo = $this->conexao->getPDO()->prepare("SELECT nome from jogo where nome = :nome");
			
			$querySelectJogo->bindValue(":nome", $jogo->__get("nome"));

			$querySelectJogo->execute();
			$linhasAfetadas = $querySelectJogo->rowCount();

			if ($linhasAfetadas == 0) {
				
				$queryInsertJogo = $this->conexao->getPDO()->prepare("INSERT INTO jogo (nome, distribuidora, genero, idioma, faixa_etaria)
				VALUES (:nome, :distribuidora, :genero, :idioma, :faixa_etaria)");

				$queryInsertJogo->bindValue(":nome", $jogo->__get("nome") );
				$queryInsertJogo->bindValue(":distribuidora", $jogo->__get("distribuidora"));
				$queryInsertJogo->bindValue(":genero", $jogo->__get("genero"));
				$queryInsertJogo->bindValue(":idioma", $jogo->__get("idioma"));
				$queryInsertJogo->bindValue(":faixa_etaria", $jogo->__get("faixa_etaria"));

				$queryInsertJogo->execute();

				echo "Jogo Inserido com sucesso ";

			}

			else{

				echo "Este jogo já existe!";
			}	
			

			$this->conexao->desconectar();
			
		}

		function visualizar($jogo =""){

			$this->conexao->conectar();
			$stm = $this->conexao->getPDO();

			if ($jogo == "") {
				$querySelectJogo = $stm->prepare("SELECT * FROM jogo");

				$querySelectJogo->execute();

				while ($linha = $querySelectJogo->fetch(PDO::FETCH_ASSOC)) {

					//TODO: fazer uma tabela em HTML aqui

					echo $linha["nome"] .", " .$linha["distribuidora"] .", " .$linha["genero"] ."<br/>";
				}

			}
			else{

				$querySelectJogo = $stm->prepare("SELECT * FROM jogo WHERE nome = :nome");	
				$querySelectJogo->bindValue(":nome", $jogo->__get("nome"));
				$querySelectJogo->execute();

				while ($linha = $querySelectJogo->fetch(PDO::FETCH_ASSOC)) {

					//TODO: fazer uma tabela em HTML aqui
					echo $linha["nome"] .", " .$linha["distribuidora"] .", " .$linha["genero"] ."<br/>";
				}

			}

			$this->conexao->desconectar();

		}

		function alterarIdioma($nomeJogo, $idiomaDepois){

			$this->conexao->conectar();
			$stm = $this->conexao->getPDO();

			$queryUpdateGame = $stm->prepare("UPDATE jogo SET idioma = :idiomaDepois WHERE nome = :nomeJogo");

			$queryUpdateGame->bindValue(":nomeJogo", $nomeJogo);
			$queryUpdateGame->bindValue(":idiomaDepois", $idiomaDepois);

			$queryUpdateGame->execute();

			$linhasAfetadas = $queryUpdateGame->rowCount();

			if ($linhasAfetadas > 0) {

				echo "Dados Alterados com Sucesso !";
			}
			else{

				echo "Não foi possível alterar o dado!";
			}
			$this->conexao->desconectar();	

		}

		function alterarGenero($nomeJogo, $generoDepois){

			$this->conexao->conectar();
			$stm = $this->conexao->getPDO();

			$queryUpdateGame = $stm->prepare("UPDATE jogo SET genero = :generoDepois WHERE nome = :nomeJogo");

			$queryUpdateGame->bindValue(":nomeJogo", $nomeJogo);
			$queryUpdateGame->bindValue(":generoDepois", $generoDepois);

			$queryUpdateGame->execute();

			$linhasAfetadas = $queryUpdateGame->rowCount();

			if ($linhasAfetadas > 0) {

				echo "Dados Alterados com Sucesso !";
			}
			else{

				echo "Não foi possível alterar o dado!";
			}
			$this->conexao->desconectar();	

		}

		function deletarJogo($jogo){

			$this->conexao->conectar();
			$stm = $this->conexao->getPDO();

			$queryDeleteGame = $stm->prepare("DELETE FROM jogo WHERE nome = :nome");

			$queryDeleteGame->bindValue(":nome", $jogo->__get("nome"));

			$queryDeleteGame->execute();

			if($queryDeleteGame->rowCount()>0){

				echo "O jogo foi excluido com êxito!";
			}
			else{
				echo "Não foi possível excluir este jogo !";
			}

			$this->conexao->desconectar();

		}
	}

 ?>