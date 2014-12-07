<?php 

	include 'ConectarBD.class.php';
	include "../entidades/Console.class.php";
	
	class ConsoleBD
	{

		private $conexao;
		
		function __construct()
		{
			$this->conexao = new ConectarBD();
		}

		function addConsole($console = ""){

			$this->conexao->conectar();
			$stm = $this->conexao->getPDO();

			$querySelectPlat = $stm->prepare("SELECT * FROM console WHERE nome = :nome");
			$querySelectPlat->bindValue(":nome", $console->__get("nome"));
			$querySelectPlat->execute();

			if($querySelectPlat->rowCount() == 0){

				$queryInsertPlat = $stm->prepare("INSERT INTO console (nome, midia, geracao, fabricante) 
					VALUES (:nome, :midia, :geracao, :fabricante)");

				$queryInsertPlat->bindValue(":nome", $console->__get("nome"));
				$queryInsertPlat->bindValue(":midia", $console->__get("midia"));
				$queryInsertPlat->bindValue(":geracao", $console->__get("geracao"));
				$queryInsertPlat->bindValue(":fabricante", $console->__get("fabricante"));

				$queryInsertPlat->execute();

				echo "<script>alert('Console cadastrado com sucesso!')</script>";
			}
			else
				echo "<script>alert('ERRO     Não foi possível cadastrar o console!')</script>";

			$this->conexao->desconectar();

		}

		function removerConsole($console){

			$this->conexao->conectar();
			$stm = $this->conexao->getPDO();

			$queryRemove = $stm->prepare("DELETE FROM console WHERE nome=:nome");
			$queryRemove->bindValue(":nome", $console->__get("nome"));

			$queryRemove->execute();

			if ($queryRemove->rowCount() > 0 ) {
				echo "<script>alert('Console Removido!')</script>";
			}
			else
				echo "<script>alert('Não foi possível remover o console!')</script>";

			$this->conexao->desconectar();
		}

		function alterarConsole($console){

			$this->conexao->conectar();
			$stm = $this->conexao->getPDO();

			$queryUpdate = $stm->prepare("UPDATE console SET midia=:midia, geracao=:geracao, fabricante = :fabricante
				WHERE nome = :nome");

			$queryUpdate->bindValue(":nome", $console->__get("nome") );
			$queryUpdate->bindValue(":midia",$console->__get("midia") );
			$queryUpdate->bindValue(":geracao",$console->__get("geracao") );
			$queryUpdate->bindValue(":fabricante", $console->__get("fabricante") );

			$queryUpdate->execute();

			if ($queryUpdate->rowCount()>0) {
				echo "<script>alert('Dados Alterados!')</script>";
			}
			else
				echo "<script>alert('ERRO     Não foi possível alterar os dados!')</script>";
			$this->conexao->desconectar();

		}

		function listarConsole($console =""){

			$this->conexao->conectar();
			$stm = $this->conexao->getPDO();


			if ($console == "") {
				$querySelect = $stm->prepare("SELECT * FROM console GROUP BY nome");

				$querySelect->execute();

				$tabela = "
						<div class = 'table_config_console'>
						
						<table border='1' width='80%'>
						<thead>
							<tr>
								<td>Nome</td>
								<td>Midia</td>
								<td>Geração</td>
								<td>Fabricante</td>


							</tr>
						</thead>

						<tfoot>
							<tr>
								<td colspan='4' rowspan = '2'>Total de Vídeo Games: " .$querySelect->rowCount()."</td>
							</tr>	
						</tfoot>";

				while ($linha = $querySelect->fetch(PDO::FETCH_ASSOC)) {


					$tabela.= "
							<tbody>
								<tr>
									<td>"  .$linha["nome"] ."</td>
									<td>"  .$linha["midia"] ."</td>
									<td>"  .$linha["geracao"] ."</td>
									<td>"  .$linha["fabricante"] ."</td>
								</tr>
								
							</tbody>";


				}

				$tabela.= "</table>
							 </div>";

				echo $tabela;

			}
			else{

				$querySelectConsole = $stm->prepare("SELECT * FROM console WHERE nome = :nome");	
				$querySelectConsole->bindValue(":nome", $console->__get("nome"));
				$querySelectConsole->execute();

				while ($linha = $querySelectConsole->fetch(PDO::FETCH_ASSOC)) {

					//TODO: fazer uma tabela em HTML aqui
					echo $linha["nome"] .", " .$linha["midia"] .", " .$linha["fabricante"] ."<br/>";
				}

			}



			$this->conexao->desconectar();
		}
	}



	/*

	$consoleDAO = new ConsoleBD();

	$console = new Console("Playstation 4", "Blu-Ray", 8, "Sony");
	$consoleDAO->addConsole($console);

	**/

	/*

	$consoleDAO = new ConsoleBD();

	$console = new Console("Playstation 4", "Blu-Ray", 8, "Sony");

	$consoleDAO->removerConsole($console);


	**/

	/*

	$consoleDAO = new ConsoleBD();

	$console = new Console("Xbox One", "Blu-Ray", 8, "Microsoft");

	$consoleDAO->alterarConsole($console);

	**/

	/*

	$consoleDAO = new ConsoleBD();

	$console = new Console("Xbox One", "Blu-Ray", 8, "Microsoft");

	$consoleDAO->listarConsole($console);

	**/



 ?>