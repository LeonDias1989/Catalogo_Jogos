<?php 


	/**
	* Classe POJO para a entidade usuário
	*/
	class Usuario
	{
		
				
		private $nome;
		private $sobrenome;
		private $idade;
		private $sexo;
		private $email;
		private $senha;


		public function __construct($nome="", $sobrenome="", $idade="", $sexo="", $email="", $senha=""){

			//iniciando os atributos da classe
			
			$this->nome = $nome;
			$this->sobrenome = $sobrenome;
			$this->idade = $idade;
			$this->sexo = $sexo;
			$this->email = $email;
			$this->senha = $senha;

		}

		//Iniciando Getters e Setters 
		function __get($atributo){

			return $this->$atributo;
		}

		function __set($atributo, $propriedade){

			$this->$atributo = $propriedade;
		}

		function __toString(){

			return "Nome: " .$this->nome ."<br/>Sobrenome: " .$this->sobrenome ."<br/>Email: " .$this->email;
		}

	}

 ?>