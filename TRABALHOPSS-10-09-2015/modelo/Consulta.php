<?php

	class Consulta  {
		
		private $id;
		private $medico;
		private $paciente;
		private $dataHora;
		private $reconsulta;
		private $sintoma;
		private $diagnostico;
		private $receita;
		

		public function getId(){					return $this->id;					}
		public function setId($id){					$this->id = $id;				 	}
		
		public function getMedico(){				return $this->medico;				}
		public function setMedico($medico){			$this->medico = $medico; 			}
		
		public function getPaciente(){				return $this->paciente;				}
		public function setPaciente($paciente){		$this->paciente = $paciente;	 	}
		
		public function getDataHora(){				return $this->dataHora;				}
		public function setDataHora($dataHora){		$this->dataHora = $dataHora;	 	}

		public function getReconsulta(){			return $this->reconsulta;			}
		public function setReconsulta($reconsulta){	$this->reconsulta = $reconsulta; 	}

		public function getSintoma(){				return $this->sintoma;				}
		public function setSintoma($sintoma){		$this->sintoma = $sintoma; 			}

		public function getDiagnostico(){				return $this->diagnostico;					}
		public function setDiagnostico($diagnostico){	$this->diagnostico = $diagnostico; 			}

		public function getReceita(){				return $this->receita;				}
		public function setReceita($receita){		$this->receita = $receita; 			}

		
		public function listar($codigo){
			if($codigo==NULL){
			$resultado = mysql_query("SELECT * FROM consulta C 
									  inner join pessoas P on P.id = C.id_paciente 
									  order by data_consulta
									  ");
			} else {
			$resultado = mysql_query("SELECT * FROM consulta C 
									  inner join pessoas P on P.id = C.id_paciente 
									  where C.id_medico='".$codigo."'
									  order by data_consulta
									  ");
			}
										
			$lista = array();
			while($linha = mysql_fetch_array($resultado)){
					$consulta = new Consulta();
					$consulta->setId($linha['id_consulta']);
						$res = mysql_query("SELECT id, nome FROM pessoas WHERE id='".$linha['id_medico']."' ");
						$ln = mysql_fetch_array($res);
					$consulta->setMedico($ln['nome']);
					$consulta->setPaciente($linha['nome']);
					$consulta->setDataHora($linha['data_consulta']);
					$consulta->setReconsulta($linha['tipo_consulta']);
					//$consulta->setSintoma($linha['celular']);
					//$consulta->setDiagnostico($linha['data_nascimento']);
					//$consulta->setReceita($linha['data_nascimento']);
					$lista[] = $consulta;					
			}
			return $lista;
		}
		
		
		
		
		public function inserir($cpf, $dataHora, $medico){
										
			$resultado = mysql_query(" 	INSERT INTO consulta(id_paciente, id_medico, data_consulta) 
										VALUES 
										('".$cpf."', '".$medico."', '".$dataHora."');
										");
										
		}		

		
		
		
		/*
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
			mysql_query("DELETE FROM  paciente  WHERE id_pessoa = '".$codigo."' ");
			mysql_query("DELETE FROM  pessoas   WHERE id 		= '".$codigo."' ");
		}
		*/
		
	}
	

?>
