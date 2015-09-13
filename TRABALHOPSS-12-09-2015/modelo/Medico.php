<?php

	require_once("Funcionario.php");
	class Medico  extends Funcionario {
		
		private $consultas;
		
		public function getConsultas(){							return $this->consultas;			}
		public function setConsultas($consultas){	 			$this->consultas = $consultas;		}



		
		public function listar(){

		$resultado = mysql_query("SELECT P.id, P.tipo, P.nome FROM pessoas P where p.tipo = 'medico'");
			$lista = array();
			while($linha = mysql_fetch_array($resultado)){
					$medico = new Medico();
					$medico->setId($linha['id']);
					$medico->setNome($linha['nome']);
					$lista[] = $medico;					
			}
			return $lista;
			
		}


		}

?>