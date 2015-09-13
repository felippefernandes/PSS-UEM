<?php 
session_start();
if(isset($_SESSION['MEDICO'])){ 
include "medico_topo.php"; 


	require_once("../controle/ConsultaControle.php");
	$consulta = new ConsultaControle();
	
	$usuario = $_SESSION['MEDICO'];
	$listaConsultas = $consulta->listar($usuario);	
		
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
			<button type="submit" class="btn btn-default" value='' name='prontuario'  onclick="action='#'"  >Dados Adicionais</button>
			<button type="submit" class="btn btn-default" value='' name='prontuario'  onclick="action='#'"  >Prontuário</button>
			
			</div>

        </form>
		

</div>











<?php 
include "medico_rodape.php"; 

} else { header("Location: login"); }
