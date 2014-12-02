<?php 



	/**
	*  Classe POJO para a entidade plataforma
	*/
	class Plataforma
	{
		
		
		private $nome;
		private $data_lancamento;

		function __construct($nome="", $data_lancamento="")
		{
			
			$this->nome = $nome;
			$this->data_lancamento = $data_lancamento;
		}

		function __get($atributo){

			return $this->$atributo;
		}

		function __set($atributo, $propriedade){

			$this->$atributo = $propriedade;
		}

		function __toString(){

			return "Nome: " .$this->nome ."<br/>Data de Lançamento: " .$this->data_lancamento;
		}
	}

?>