<?php

	require_once("Pessoa.php");
	class Medico  extends Pessoa {
		
		private $usuario;
		private $senha;
		private $consultas;
		
		public function getUsuario(){		 					return $this->usuario;				}
		public function setUsuario($usuario){		 			$this->usuario = $usuario;			}	
		
		public function getSenha(){								return $this->senha;				}
		public function setSenha($senha){	 					$this->senha = $senha;				}
		
		public function getConsultas(){							return $this->consultas;			}
		public function setConsultas($consultas){	 			$this->consultas = $consultas;		}


		public function validar($usuario){

			$resultado = mysql_query(" 	SELECT P.tipo, P.id, MS.login, MS.senha FROM pessoas P
										inner join medico_secretaria MS on MS.id_pessoa = P.id
										where MS.login='".$this->usuario."' and MS.senha='".$this->senha."' and P.tipo='medico' ");
			$contagen = mysql_num_rows($resultado);
			
			$linha = mysql_fetch_array($resultado);
			
			if($contagen!=0){
				return $linha['id'];
			} else {
				return false;
			}
		}

		
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