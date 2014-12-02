<?php 
	/**
	*  Classe POJO para a entidade jogo
	*/
	class Jogo
	{

		
		private $nome;
		private $distribuidora;
		private $genero;
		private $idioma;
		private $faixa_etaria;
				
		function __construct($nome="", $distribuidora="", $genero="", $idioma="", $faixa_etaria="")
		{
			
			$this->nome = $nome;
			$this->distribuidora = $distribuidora;
			$this->genero = $genero;
			$this->idioma = $idioma;
			$this->faixa_etaria = $faixa_etaria;
			
		}

		function __get($atributo){

			return $this->$atributo;
		}

		function __set($atributo, $propriedade){

			$this->$atributo = $propriedade;
		}

		function __toString(){

			return "Nome: " .$this->nome ."<br/>Gênero: " .$this->genero ."<br/>Idioma: " .$this->idioma
			."<br/>distribuidora: " .$this->distribuidora;
		}
	}

 ?>