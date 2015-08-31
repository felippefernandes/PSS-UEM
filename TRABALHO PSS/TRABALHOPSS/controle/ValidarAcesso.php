<?php

class ValidarAcesso {
		
		function validar($campoTipo, $campoUsuario, $campoSenha){

			switch($campoTipo){
				case "medico": 		
					include "modelo/Medico.php";
					$usuario = new Medico();
					break;
					
				case "secretaria": 		
					include "modelo/Secretaria.php";
					$usuario = new Secretaria();
					break;
			}
			
			include "modelo/Conexao.php";
			$conexao = new Conexao();
			$cx = $conexao->conectar();
			
			$usuario->setUsuario($campoUsuario);
			$usuario->setSenha(md5($campoSenha));
			$usuario->setTipo($campoTipo);
						
			if($usuario->validar()){
					switch($usuario->getTipo()){
						case 'secretaria':
							$_SESSION['SECRETARIA'] = $usuario;
							header("Location: secretaria");
							break;
						case 'medico': 		
							$_SESSION['MEDICO'] = $usuario;
							header("Location:medico");
							break;
					}
			} else {
				echo "<script type='text/javascript'>alert('Dados incorretos!');</script>";
			}

			$conexao->desconectar($cx);

						
		}
		
		function logout(){
			session_destroy();
			header("Location:home");
		}
	
}

?>
