<?php
	if(isset($_POST['sair'])) {
		include "../controle/ValidarAcesso.php";
		$validarAcesso = new ValidarAcesso;
		$validarAcesso->logout();
	} 
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<!-- Jquery -->
<script src="visao/scriptsDeApoio/jquery.min.js"></script>

<!-- Bootstrap -->
<link rel="stylesheet" href="visao/bootstrap-3.3.5-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="visao/bootstrap-3.3.5-dist/css/bootstrap-theme.min.css">
<script src="visao/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<!-- Fim Bootstrap -->

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="visao/scriptsDeApoio/ie10-viewport-bug-workaround.js"></script>
    
<link rel="stylesheet" href="visao/estilo.css">

<!-- Apoio a elementos HTML5 e media queries no IE8 -->
<!--[if lt IE 9]>
  <script src="visao/scriptsDeApoio/html5shiv.min.js"></script>
  <script src="visao/scriptsDeApoio/respond.min.js"></script>
<![endif]-->


</head>

<body>

	<!-- Static navbar -->
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <a class="navbar-brand" >Secretária</a>
			</div>
			<div>
			  <ul class="nav navbar-nav">
				<li><a href="secretaria">Pacientes</a></li>
				<li><a href="secretaria_consultas">Consultas</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Relatórios<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">Celular</a></li>
						<li><a href="#">E-mail</a></li>
					</ul>
				</li>
				<!-- <li class="active"><a href="#">Sair</a></li> -->
				<li>
					<a href="#">
					<form action="" method="post">
						<button style='margin:-10px auto -8px auto'
						type="submit" 
						class="btn btn-default" name="sair" >Sair</button>
					</form>
					</a>
				</li>
			  </ul>
			  
			</div>
		  </div>
		</nav>		

