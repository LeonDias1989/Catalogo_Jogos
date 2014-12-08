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

				echo "<script>alert('Jogo Inserido com sucesso!');</script>";
				header("refresh:1; url=../html/page_addJogo.php");
			}

			else{

				echo "<script>alert('ERRO     Este jogo já existe!');</script>";
				header("refresh:1; url=../html/page_addJogo.php");
				
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
						<form action='../controller/cadastrar_jogo_usuario.php' method='post'>
						<input type='submit' value='Adicionar'>	
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
									<td><input type='checkbox' value='" .$linha["id"] ."' name='jogos[]'></td>
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

		function visualizarJogoUsuario($id){

			$this->conexao->conectar();
			$stm = $this->conexao->getPDO();

			$querySelect = $stm->prepare("SELECT jogo.id as id, nome, distribuidora, genero, idioma FROM jogo INNER JOIN jogo_usuario 
			WHERE jogo.id = jogo_usuario.id_jogoFK AND jogo_usuario.id_usuarioFK = :id  ORDER BY(jogo.nome)");

			$querySelect->bindValue(":id", $id);
			$querySelect->execute();

			if ($querySelect->rowCount() > 0 ) {

				$tabela = "
						<div class = 'table_config'>
						
						<form action='../controller/remover_jogo_usuario.php' method='post'>
						<label>Meus Jogos</label><br/><br/>
						<input type='submit' value='Remover'>	
						<table border='1' width='80%'>
						<thead>
							<tr>
								<td>Nome</td>
								<td>Distribuidora</td>
								<td>Gênero</td>
								<td>Idioma</td>
								<td>Excluir</td>

							</tr>
						</thead>

						<tfoot>
							<tr>
								<td colspan='5' rowspan = '2'>Total de Jogos: " .$querySelect->rowCount()."</td>
							</tr>	
						</tfoot>";

				while ($linha = $querySelect->fetch(PDO::FETCH_ASSOC)) {


					$tabela.= "
							<tbody>
								<tr>
									<td>"  .$linha["nome"] ."</td>
									<td>"  .$linha["distribuidora"] ."</td>
									<td>"  .$linha["genero"] ."</td>
									<td>"  .$linha["idioma"] ."</td>
									<td><input type='checkbox' value='" .$linha["id"] ."' name='jogos_usuario[]'></td>
								</tr>
								
							</tbody>";


				}

				$tabela.= "</table>
							<input type='submit' value='Remover'>	
							<br/><br/>
							<label>Caso queira remover, selecione o jogo na tabela</label>
							</form>
							 </div>";

				echo $tabela;
				
			}
			else{

				echo "Nenhum Resultado";
			}

			$this->conexao->desconectar();
		}

		function cadastrarJogoUsuario($idJogo, $idUsuario){

			$this->conexao->conectar();
			$stm = $this->conexao->getPDO();

			$queryInsertJogoUsuario = $stm->prepare("INSERT INTO jogo_usuario (id_usuarioFK, id_jogoFK)
				VALUES (:idUsuario, :idJogo)");

			$queryInsertJogoUsuario->bindValue(":idUsuario", $idUsuario);
			$queryInsertJogoUsuario->bindValue(":idJogo", $idJogo);

			$queryInsertJogoUsuario->execute();

			$total = $queryInsertJogoUsuario->rowCount();
			
			$this->conexao->desconectar();

			return $total;

		}

		function removerJogoUsuario($idJogo, $idUsuario){


			$this->conexao->conectar();
			$stm = $this->conexao->getPDO();

			$queryDeleteJogoUsuario = $stm->prepare("DELETE FROM jogo_usuario WHERE id_usuarioFK =:idUsuario AND id_jogoFK = :idJogo ");

			$queryDeleteJogoUsuario->bindValue(":idJogo", $idJogo);
			$queryDeleteJogoUsuario->bindValue(":idUsuario", $idUsuario);

			$queryDeleteJogoUsuario->execute();

			$total = $queryDeleteJogoUsuario->rowCount();
			
			$this->conexao->desconectar();

			return $total;



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