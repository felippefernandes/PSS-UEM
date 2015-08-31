<?php

	class Conexao {
	
		private $host  = "localhost"; 	 
		private $user  = "root"; 					 
		private $pass  = ""; 						
		private $banco = "clinica_medica"; 	
		
		public function conectar(){
			$conexao = mysql_connect($this->host, $this->user, $this->pass) or die (mysql_error());
			mysql_select_db($this->banco);
			return $conexao;
		}
		
		public function desconectar($conexao){
			mysql_close($conexao);
		}
		
	
	}

?>