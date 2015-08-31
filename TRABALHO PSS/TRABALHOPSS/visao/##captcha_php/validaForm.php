<?php

	function gerarCodigo(){
		$codigoCaptcha = substr(md5( time()) ,0,9);
		return $_SESSION['captcha'] = $codigoCaptcha;
	}
	
	function validaForm(){
		if( $_SERVER['REQUEST_METHOD'] == 'POST'){
			if($_SESSION['captcha'] == $_POST['submit']){
		
				echo $_POST['submit']."<br>";
				echo $_SESSION['captcha']."<br>";
		
			}
		}
	}
	
	
?>