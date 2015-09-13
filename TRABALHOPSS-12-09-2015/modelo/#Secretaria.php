<?php
	include "Pessoa.php";
	class Secretaria extends Pessoa  {
		
		private $usuario;
		private $senha;
		
		public function getUsuario(){		 					return $this->usuario;				}
		public function setUsuario($usuario){		 			$this->usuario = $usuario;			}	
		
		public function getSenha(){								return $this->senha;				}
		public function setSenha($senha){	 					$this->senha = $senha;				}
		

		public function validar(){

			$resultado = mysql_query(" 	SELECT P.tipo, P.id, MS.login, MS.senha FROM pessoas P
										inner join medico_secretaria MS on MS.id_pessoa = P.id
										where MS.login='".$this->usuario."' and MS.senha='".$this->senha."' and P.tipo='secretaria' ");
			$contagen = mysql_num_rows($resultado);
			if($contagen!=0){
				return true;
			} else {
				return false;
			}
		}

		
	}

?>