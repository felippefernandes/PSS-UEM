<?php
	session_start();
	if( ( $_SERVER['REQUEST_METHOD'] == 'POST' and isset($_SESSION[$_SERVER['PHP_SELF'] ]) ) and ($_SESSION[$_SERVER['PHP_SELF'] ] == $_POST['submit']) ) {

		include "controle/ValidarAcesso.php";
		$validarAcesso = new ValidarAcesso;
		$validarAcesso->validar($_POST['tipo'], $_POST['usuario'], $_POST['senha']);

	} 
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<!-- Bootstrap -->
<link rel="stylesheet" href="visao/bootstrap-3.3.5-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="visao/bootstrap-3.3.5-dist/css/bootstrap-theme.min.css">
<script src="visao/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<!-- fim Bootstrap -->

<!-- Estilos personalizados da página -->
<link rel="stylesheet" href="visao/estilo.css">

<!-- validações 
<script src="visao/scriptsDeApoio/jquery.maskedinput.js"></script>
<script src="visao/scriptsDeApoio/validacoes.js"></script>
-->
<body>
    <div class="container" id="login">
        <h1>Clinica Médica</h1>
    
        <div class="row">
          <div class="col-xs-12  ">
            <form action="" method="post" onSubmit="return validateform();">
                <select class="form-control" placeholder="Estado" name="tipo" >
                    <option value="medico">Médico</option>
                    <option value="secretaria">Secretária</option>
                </select>
                
                <label for=""></label>
                <input type="text" class="form-control obrigatorio" onClick="limparCampoObrigatorio(this);" name="usuario" 	id="" placeholder="Usuário">
    
                <label for=""></label>
                <input type="password" class="form-control obrigatorio" onClick="limparCampoObrigatorio(this);" name="senha" id="" placeholder="Senha">

                <br>
                <button type="submit" class="btn btn-default" name="submit" value="<?=$_SESSION[$_SERVER['PHP_SELF']] = substr(md5( time()),0,9);?>">Acessar</button>
            </form>
            
          </div>
        </div>
    
    </div>
</body>
</html>
<?php //session_destroy();?> 
