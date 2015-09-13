<?php
	
	$host  = "localhost"; 	 
	$user  = "root"; 					 
	$pass  = ""; 						
	$banco = "clinica_medica"; 	
	$conexao = mysql_connect($host, $user, $pass) or die (mysql_error());
	mysql_select_db($banco);
		
?>