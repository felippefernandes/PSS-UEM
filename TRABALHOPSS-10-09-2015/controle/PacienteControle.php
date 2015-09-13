<?php
include "../modelo/Conexao.php";
	
	class PacienteControle {
		
		function listar(){

			require_once("../modelo/Paciente.php");
			$paciente = new Paciente();
			return $paciente->listar();
			
		}
		
		function inserir(){
			
			require_once("../modelo/Paciente.php");
			$paciente = new Paciente();
			//$paciente->setId($_POST['id']);
			$paciente->setTipo('paciente');
			$paciente->setNome($_POST['nome']);
			$paciente->setEmail($_POST['email']);
			$paciente->setTelefoneRes($_POST['telefone']);
			$paciente->setTelefoneCel($_POST['celular']);
			$paciente->setDataNascimento($_POST['data_nascimento']);
			$paciente->setSexo($_POST['sexo']);
			$paciente->setCpf($_POST['cpf']);
			$paciente->setEndereco($_POST['endereco']);
			$paciente->setProntuario(''); //sintoma, diagnóstico, prescrição
			$paciente->setConvenio($_POST['convenio']);
			$paciente->setConsultas(''); //lista de consultas
			$paciente->inserir();
			
			echo "<script>alert('Dados inseridos com sucesso!');</script>";
		}
			
		function remover($codigo){

			require_once("../modelo/Paciente.php");
			$paciente = new Paciente();
			
				if($paciente->remover($codigo)){
					echo "<script>alert('Dados removidos com sucesso!');</script>";
				} else {
					echo "<script>alert('Não foi possível remover! Verifique se existe consultas cadastradas para este paciente');</script>";
				}
			}

		
	}
?>