<?php
include "../modelo/Conexao.php";

	class ConsultaControle {
		
		function listar($codigo){

			require_once("../modelo/Consulta.php");
			$consulta = new Consulta();
			return $consulta->listar($codigo);
			
		}
		
		function inserir($cpf, $dataHora, $medico){
			
			require_once("../modelo/Paciente.php");
			$paciente = new Paciente();

			if( !$paciente->verificaExistencia($cpf) ){
				echo "<script>alert('Paciente não localizado');</script>";
			} else {
				require_once("../modelo/Consulta.php");
				$paciente->buscaCpf($cpf);

				$consulta = new Consulta();
				$consulta->inserir($paciente->getId(), $dataHora, $medico);
				echo "<script>alert('Consulta cadastrada com sucesso!');</script>";
			}
			
		}
		
		
		
		/*
			
		function remover($codigo){
		
			require_once("../modelo/Paciente.php");
			$paciente = new Paciente();
			$paciente->remover($codigo);

			echo "<script>alert('Dados removidos com sucesso!');</script>";

			}

		*/
		
	}
?>