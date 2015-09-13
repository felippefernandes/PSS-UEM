<?php

	class Pessoa {
		private $id;
		private $tipo;
		private $nome;
		private $email;
		private $telefoneRes;
		private $telefoneCel;
		private $dataNascimento;
		private $sexo;
		private $cpf;
		private $endereco;
		
		public function getId(){		 					return $this->id;							}
		public function setId($id){		 					$this->id = $id;							}	
		
		public function getTipo(){		 					return $this->tipo;							}
		public function setTipo($tipo){		 				$this->tipo = $tipo;						}	
		
		public function getNome(){							return $this->nome;							}
		public function setNome($nome){	 					$this->nome = $nome;						}
		
		public function getEmail(){		 					return $this->email;						}
		public function setEmail($email){					$this->email = $email;						}
		
		public function getTelefoneRes(){		 			return $this->telefoneRes;					}
		public function setTelefoneRes($telefoneRes){		$this->telefoneRes = $telefoneRes;			}
		
		public function getTelefoneCel(){		 			return $this->telefoneCel;					}
		public function setTelefoneCel($telefoneCel){		$this->telefoneCel = $telefoneCel;			}
		
		public function getDataNascimento(){		 		return $this->dataNascimento;				}
		public function setDataNascimento($dataNascimento){	$this->dataNascimento = $dataNascimento;	}
		
		public function getSexo(){		 					return $this->sexo;							}
		public function setSexo($sexo){						$this->sexo = $sexo;						}
		
		public function getCpf(){		 					return $this->cpf;							}
		public function setCpf($cpf){						$this->cpf = $cpf;							}
		
		public function getEndereco(){		 				return $this->endereco;						}
		public function setEndereco($endereco){				$this->endereco = $endereco;				}
		
		
		
	}
	
	
	

?>
