<?php
include "../modelo/Conexao.php";

	class MedicoControle {
		
		function listar(){
			
			require_once("../modelo/Medico.php");
			$medico = new Medico();
			return $medico->listar();
			
			
		}
		


		
	}
?>