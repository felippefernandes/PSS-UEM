<?php

	include "Pessoa.php";
	class Paciente extends Pessoa {
		
		private $prontuario;
		private $convenio;
		private $consultas;

		public function getProntuario(){				return $this->prontuario;			}
		public function setProntuario($prontuario){	$this->prontuario = $prontuario; 	}
		
		public function getConvenio(){				return $this->convenio;				}
		public function setConvenio($convenio){		$this->convenio = $convenio; 		}
		
		public function getConsultas(){				return $this->consultas;			}
		public function setConsultas($consultas){	$this->consultas = $consultas;	 	}

		
		public function listar(){

			$resultado = mysql_query(" 	SELECT P.id, P.tipo, P.nome, P.email, P.celular, P.telefone, P.data_nascimento, P.sexo, P.cpf, P.endereco, PC.id_pessoa, PC.convenio FROM pessoas P 
										inner join paciente PC on PC.id_pessoa = P.id
										where p.tipo = 'paciente'	
										");
										
			$lista = array();
			while($linha = mysql_fetch_array($resultado)){
					$paciente = new Paciente();
					$paciente->setId($linha['id']);
					$paciente->setTipo($linha['tipo']);
					$paciente->setNome($linha['nome']);
					$paciente->setEmail($linha['email']);
					$paciente->setTelefoneRes($linha['telefone']);
					$paciente->setTelefoneCel($linha['celular']);
					$paciente->setDataNascimento($linha['data_nascimento']);
					$paciente->setSexo($linha['sexo']);
					$paciente->setCpf($linha['cpf']);
					$paciente->setEndereco($linha['endereco']);
					//$paciente->setProntuario(''); //sintoma, diagnóstico, prescrição
					$paciente->setConvenio($linha['convenio']);
					//$paciente->setConsultas(''); //lista de consultas
					$lista[] = $paciente;					
			}
			return $lista;
		}

		public function buscaCpf($cpf){
			
			$resultado = mysql_query("SELECT id, cpf FROM `pessoas` WHERE cpf='".$cpf."' ");
			$linha = mysql_fetch_array($resultado);
			$this->setId($linha['id']);
			$this->setCpf($linha['cpf']);
			
		}

		public function verificaExistencia($cpf){
			
			$resultado = mysql_query("SELECT id, cpf FROM `pessoas` WHERE cpf='".$cpf."' ");
			if( mysql_num_rows($resultado) ){
				return 1;					
			} else {
				return 0;
			}
			
		}

		

		
		public function inserir(){
		
			$resultado = mysql_query(" 	INSERT INTO pessoas(tipo, nome, email, celular, telefone, data_nascimento, sexo, cpf, endereco) 
										VALUES 
										('".$this->getTipo()."', 
										'".$this->getNome()."', 
										'".$this->getEmail()."', 
										'".$this->getTelefoneCel()."', 
										'".$this->getTelefoneRes()."', 
										'".$this->getDataNascimento()."', 
										'".$this->getSexo()."',
										'".$this->getCpf()."',
										'".$this->getEmail()."');
										");
										
			$resultado = mysql_query(" 	INSERT INTO paciente(convenio, id_pessoa)
										values('".$this->getConvenio()."', (select LAST_INSERT_ID()));
										");
											
											
		}		

		public function alterar(){
		
			$resultado = mysql_query(" 	UPDATE pessoas P SET
											P.tipo='".$this->getTipo()."',
											P.nome='".$this->getNome()."',
											P.email='".$this->getEmail()."',
											P.celular='".$this->getTelefoneCel()."',
											P.telefone='".$this->getTelefoneRes()."',
											P.data_nascimento='".$this->getDataNascimento()."',
											P.sexo='".$this->getSexo()."', 
											P.cpf='".$this->getCpf()."', 
											P.endereco='".$this->getEndereco()."' 
											where P.id='".$this->getId()."' ");
											
											
		}		

		public function remover($codigo){
			try{
				if (!mysql_query("DELETE FROM  paciente  WHERE id_pessoa = '".$codigo."' ")){ throw new Exception(""); }
				mysql_query("DELETE FROM  pessoas   WHERE id 		= '".$codigo."' "); 
				$retorno = true;
			} catch(Exception $e){
				$retorno = false;
			} 
			
			
			
			
			
		}
		
		
	}
	

?>
