<?php 

	/**
	* Classe para a conexão com o banco de dados
	*/
	class ConectarBD
	{

		private $tipo= "mysql";
		private $host= "localhost";
		private $user= "root";
		private $pass = "";
		private $dbname = "catalogo_jogos";

		private $pdo = null;


		function conectar(){


			try{

				 $this->pdo = new PDO($this->tipo.
				                 ":host=".$this->host.
				                 ";dbname=".$this->dbname,
				                 $this->user,
				                 $this->pass);

			}catch(PDOExeption $e){

				echo $e->getMessage();
			}

		}

		function desconectar(){

			$this->pdo = null;
		}

		function getPDO($atributo="pdo"){

			return $this->$atributo;
		}

		

	}

 ?>