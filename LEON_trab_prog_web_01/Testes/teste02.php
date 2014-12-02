<?php 

	include '../ConectarBD.class.php';

	//Criando objeto para a conexão com o banco de dados
	$objetoConexao = new ConectarBD();

	//aplicando o método conectar
	$objetoConexao->conectar();

	echo "Conexão aberta com o banco de dados";

	//aplicando o método fecharConexao
	$objetoConexao->fecharConexao();

	echo "<br/><br/>Conexão com o banco de dados fechada";
	


 ?>