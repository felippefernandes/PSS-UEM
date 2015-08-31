<?php

	class MedicoControle {
		
		function listar(){

			require_once("../modelo/Conexao.php");
			$conexao = new Conexao();
			$cx = $conexao->conectar();
			
			require_once("../modelo/Medico.php");
			$medico = new Medico();
			return $medico->listar();
			
			//$conexao->desconectar($cx);
			
		}
		


		
	}
?>