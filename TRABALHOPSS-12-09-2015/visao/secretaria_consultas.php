<?php 
	session_start();
	if(isset($_SESSION['SECRETARIA'])){ 
	include "secretaria_topo.php"; 

	include "../controle/ConsultaControle.php";
	$consulta = new ConsultaControle();
	
	/*
	if( ( $_SERVER['REQUEST_METHOD'] == 'POST' and isset($_SESSION[$_SERVER['PHP_SELF'] ]) ) and ($_SESSION[$_SERVER['PHP_SELF'] ] == $_POST['remover']) ) {
		if(isset($_POST['paciente'])){
			$paciente->remover($_POST['paciente']);
		}
	} 	
	*/
	
	$listaConsultas = $consulta->listar("");	

?>   
      
<div class="container">
    <h1>Consultas</h1>
		
		<form action="" method="post">
			
			<hr>
			<?php foreach($listaConsultas as $consulta){ ?>
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12" ><input type="radio" value='<?=$consulta->getId();?>' name='consulta'></div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" ><?=$consulta->getPaciente();?></div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >Dr(a) <?=$consulta->getMedico();?></div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" ><?=$consulta->getDataHora();?></div>
			</div>
            <hr>
			<?php } ?>
                        
            <div class="col-xs-12 ">
			<button type="submit" class="btn btn-default" value='' name='alterarConsulta'  onclick="action='#'" disabled >Alterar</button>
			<button type="submit" class="btn btn-default" value='<?=$_SESSION[$_SERVER['PHP_SELF']] = substr(md5( time()),0,9);?>' name='remover' disabled>Remover</button>
			<a href="secretaria_consulta_cadastro" class="btn btn-default" >Cadastrar Consulta</a>
			
			</div>

        </form>
        
        
      </div>
    </div>

<?php 
	include "secretaria_rodape.php"; 
	} else { header("Location: login"); } 
?>