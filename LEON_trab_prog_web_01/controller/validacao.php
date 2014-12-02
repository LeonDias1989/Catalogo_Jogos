<?php

 	// *** este arquivo deve ser incluido em todas as páginas que são restritas
	// a usuários apenas autenticados

	// inicia a sessão
	session_start();
	// verifica se a sessão foi criada corretamente anteriormente
	// caso contrário redireciona para a página de login
	if(!isset($_SESSION["id"]))
		header("Location: login.php");
?>