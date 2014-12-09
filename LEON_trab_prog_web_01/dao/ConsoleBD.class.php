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
				header("refresh:1; url=../html/page_addConsole.php");
			}
			else{

				echo "<script>alert('ERRO     Não foi possível cadastrar o console!')</script>";
				header("refresh:1; url=../html/page_addConsole.php");
			}
				

			$this->conexao->desconectar();

		}


		function visualizar($console =""){

			$this->conexao->conectar();
			$stm = $this->conexao->getPDO();

			if ($console == "") {
				$querySelect = $stm->prepare("SELECT * FROM console GROUP BY nome");

				$querySelect->execute();

				$tabela = "
						<div class = 'table_config'>
						<form action='../controller/cadastrar_console_usuario.php' method='post'>
						<input type='submit' value='Adicionar'>	
						<table border='1' width='80%'>
						<thead>
							<tr>
								<td>Nome</td>
								<td>Midia</td>
								<td>Geração</td>
								<td>Tenho</td>


							</tr>
						</thead>

						<tfoot>
							<tr>
								<td colspan='4' rowspan = '2'>Total de Console: " .$querySelect->rowCount()."</td>
							</tr>	
						</tfoot>";

				while ($linha = $querySelect->fetch(PDO::FETCH_ASSOC)) {


					$tabela.= "
							<tbody>
								<tr>
									<td>"  .$linha["nome"] ."</td>
									<td>"  .$linha["midia"] ."</td>
									<td>"  .$linha["geracao"] ."</td>
									<td><input type='checkbox' value='" .$linha["id"] ."' name='consoles[]'></td>
								</tr>
								
							</tbody>";


				}

				$tabela.= "</table>
							<input type='submit' value='Adicionar'>	
							</form>
							 </div>";

				echo $tabela;

			}
			else{

				$querySelect = $stm->prepare("SELECT * FROM console WHERE nome = :nome");	
				$querySelect->bindValue(":nome", $console->__get("nome"));
				$querySelect->execute();

				while ($linha = $querySelect->fetch(PDO::FETCH_ASSOC)) {

					//TODO: fazer uma tabela em HTML aqui
					echo $linha["nome"] .", " .$linha["midia"] .", " .$linha["geracao"] ."<br/>";
				}

			}

			$this->conexao->desconectar();

		}

		function visualizarConsoleUsuario($id){

			$this->conexao->conectar();
			$stm = $this->conexao->getPDO();

			$querySelect = $stm->prepare("SELECT console.id as id, nome, midia, geracao, fabricante FROM console INNER JOIN console_usuario 
			WHERE console.id = console_usuario.id_consoleFK AND console_usuario.id_usuarioFK = :id  ORDER BY(console.nome)");

			$querySelect->bindValue(":id", $id);
			$querySelect->execute();

			if ($querySelect->rowCount() > 0 ) {

				$tabela = "
						<div class = 'table_config'>
						
						<form action='../controller/remover_console_usuario.php' method='post'>
						<label>Vídeo-Games</label><br/><br/>
						<input type='submit' value='Remover'>	
						<table border='1' width='80%'>
						<thead>
							<tr>
								<td>Nome</td>
								<td>Mídia</td>
								<td>Geração</td>
								<td>Fabricante</td>
								<td>Excluir</td>
								
							</tr>
						</thead>

						<tfoot>
							<tr>
								<td colspan='5' rowspan = '2'>Total de Consoles: " .$querySelect->rowCount()."</td>
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
									<td><input type='checkbox' value='" .$linha["id"] ."' name='console_usuario[]'></td>
								</tr>
								
							</tbody>";


				}

				$tabela.= "</table>
							<input type='submit' value='Remover'>	
							<br/><br/>
							<label>Caso queira remover, selecione o console na tabela</label>
							</form>
							 </div>";

				echo $tabela;
				
			}
			else{

				echo "Meus Consoles: Nenhum Resultado";
			}

			$this->conexao->desconectar();
		}


		function cadastrarConsoleUsuario($idConsole, $idUsuario){

			$this->conexao->conectar();
			$stm = $this->conexao->getPDO();

			$queryInsert = $stm->prepare("INSERT INTO console_usuario (id_usuarioFK, id_consoleFK)
				VALUES (:idUsuario, :idConsole)");

			$queryInsert->bindValue(":idUsuario", $idUsuario);
			$queryInsert->bindValue(":idConsole", $idConsole);

			$queryInsert->execute();

			$total = $queryInsert->rowCount();
			
			$this->conexao->desconectar();

			return $total;

		}

		function removerConsoleUsuario($idConsole, $idUsuario){


			$this->conexao->conectar();
			$stm = $this->conexao->getPDO();

			$queryDelete = $stm->prepare("DELETE FROM console_usuario WHERE id_usuarioFK =:idUsuario AND id_consoleFK = :idConsole ");

			$queryDelete->bindValue(":idUsuario", $idUsuario);
			$queryDelete->bindValue(":idConsole", $idConsole);

			$queryDelete->execute();

			$total = $queryDelete->rowCount();
			
			$this->conexao->desconectar();

			return $total;



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