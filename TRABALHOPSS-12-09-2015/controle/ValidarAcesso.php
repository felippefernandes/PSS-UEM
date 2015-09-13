<?php
include "modelo/Conexao.php";

class ValidarAcesso {
		
		function validar($campoUsuario, $campoSenha){

			include "modelo/Funcionario.php";
			$usuario = new Funcionario();
					
			
			$usuario->setUsuario($campoUsuario);
			$usuario->setSenha(md5($campoSenha));
						
			if($usuario->validar()){					
				$_SESSION[strtoupper($usuario->getTipo())] = $usuario->getId();
				header("Location: ".$usuario->getTipo());
			} else {
				echo "<script type='text/javascript'>alert('Dados incorretos!');</script>";
			}

						
		}
		
		function logout(){
			session_destroy();
			header("Location:home");
		}
	
}


?>
