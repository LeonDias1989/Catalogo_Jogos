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

				echo "<script>altert('Jogo Inserido com sucesso!')</script>";
			}

			else{

				echo "<script>altert('ERRO     Este jogo já existe!')</script>";
				
			}	
			

			$this->conexao->desconectar();
			
		}

		function visualizar($jogo =""){

			$this->conexao->conectar();
			$stm = $this->conexao->getPDO();

			if ($jogo == "") {
				$querySelectJogo = $stm->prepare("SELECT * FROM jogo GROUP BY nome");

				$querySelectJogo->execute();

				$tabela = "
						<div class = 'table_config'>
						<table border='1' width='80%'>
						<thead>
							<tr>
								<td>Nome</td>
								<td>Distribuidora</td>
								<td>Gênero</td>
								<td>Tenho</td>


							</tr>
						</thead>

						<tfoot>
							<tr>
								<td colspan='4' rowspan = '2'>Total de Jogos: " .$querySelectJogo->rowCount()."</td>	
									
							</tr>	
						</tfoot>";

				while ($linha = $querySelectJogo->fetch(PDO::FETCH_ASSOC)) {


					$tabela.= "
							<tbody>
								<tr>
									<td>"  .$linha["nome"] ."</td>
									<td>"  .$linha["distribuidora"] ."</td>
									<td>"  .$linha["genero"] ."</td>
									<td><input type='checkbox' value='" .$linha["id"] ."'></td>
								</tr>
								
							</tbody>";



					/*

					<table border="1">
						<thead>
							<tr>
								<td>Cabeçalho 1</td>
								<td>Cabeçalho 2</td>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<td>Rodapé 1</td>	
								<td>Rodapé 2</td>	
							</tr>	
						</tfoot>
						<tbody>
							<tr>
								<td>Linha 1 - Coluna 1</td>
								<td>Linha 1 - Coluna 2</td>
							</tr>
							<tr>
								<td>Linha 2 - Coluna 1</td>
								<td>Linha 2 - Coluna 2</td>
							</tr>
						</tbody>
					</table>

				**/

					//TODO: fazer uma tabela em HTML aqui

					//echo $linha["nome"] .", " .$linha["distribuidora"] .", " .$linha["genero"] ."<br/>";
				}

				$tabela.= "</table> </div>";

				echo $tabela;

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

		function alterarDados($jogo){

			$this->conexao->conectar();
			$stm = $this->conexao->getPDO();

			$queryUpdateGame = $stm->prepare("UPDATE jogo SET genero = :genero,  idioma = :idioma, faixa_etaria = :faixa_etaria
			WHERE nome = :nome");

			$queryUpdateGame->bindValue(":genero", $jogo->__get("genero"));
			$queryUpdateGame->bindValue(":idioma", $jogo->__get("idioma"));
			$queryUpdateGame->bindValue(":faixa_etaria", $jogo->__get("faixa_etaria"));
			$queryUpdateGame->bindValue(":nome", $jogo->__get("nome"));

			$queryUpdateGame->execute();

			
			if($queryUpdateGame->rowCount() > 0 ){ echo "Jogo Atualizado com sucesso!";}
			else
				echo "Não foi possível atualizar os dados do jogo!";

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