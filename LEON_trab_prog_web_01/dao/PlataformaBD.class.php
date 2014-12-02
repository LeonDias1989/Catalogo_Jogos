<?php 

	include 'ConectarBD.class.php';
	include '../entidades/Plataforma.class.php';
	
	class PlataformaBD
	{

		private $conexao;
		
		function __construct()
		{
			$this->conexao = new ConectarBD();
		}

		function addPlataforma($plataforma = ""){

			$this->conexao->conectar();
			$stm = $this->conexao->getPDO();

			$querySelectPlat = $stm->prepare("SELECT * FROM plataforma WHERE nome = :nome");
			$querySelectPlat->bindValue(":nome", $plataforma->__get("nome"));
			$querySelectPlat->execute();

			if($querySelectPlat->rowCount() == 0){

				$queryInsertPlat = $stm->prepare("INSERT INTO plataforma (nome, data_lancamento, geracao) VALUES (:nome, :data_lancamento, :geracao)");

				$queryInsertPlat->bindValue(":nome", $plataforma->__get("nome"));
				$queryInsertPlat->bindValue(":data_lancamento", $plataforma->__get("data_lancamento"));
				$queryInsertPlat->bindValue(":geracao", $plataforma->__get("geracao"));

				$queryInsertPlat->execute();

				echo "Plataforma cadastrada com sucesso!";
			}
			else
				echo "Esta plataforma já está cadastrada!";

			$this->conexao->desconectar();

		}
	}


 ?>