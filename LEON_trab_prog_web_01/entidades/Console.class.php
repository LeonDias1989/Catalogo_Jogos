<?php 

	class Console{
		
		
		private $nome;
		private $midia;
		private $geracao;
		private $fabricante;

		function __construct($nome="", $midia="", $geracao="", $fabricante="")
		{
			
			$this->nome = $nome;
			$this->midia = $midia;
			$this->geracao = $geracao;
			$this->fabricante = $fabricante;
		}

		function __get($atributo){

			return $this->$atributo;
		}

		function __set($atributo, $propriedade){

			$this->$atributo = $propriedade;
		}

	}

?>