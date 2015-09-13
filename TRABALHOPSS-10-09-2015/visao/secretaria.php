<?php 
	session_start();
	if(isset($_SESSION['SECRETARIA'])){ 
	include "secretaria_topo.php"; 

	include "../controle/PacienteControle.php";
	$paciente = new PacienteControle();
	
	if( ( $_SERVER['REQUEST_METHOD'] == 'POST' and isset($_SESSION[$_SERVER['PHP_SELF'] ]) ) and ($_SESSION[$_SERVER['PHP_SELF'] ] == $_POST['remover']) ) {
		if(isset($_POST['paciente'])){
			$paciente->remover($_POST['paciente']);
		}
	} 	

	$listaPacientes = $paciente->listar();	

?>   
      
<div class="container">
    <h1>Pacientes</h1>
		
		<form action="" method="post">
			
			<hr>
			<?php foreach($listaPacientes as $paciente){ ?>
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12" ><input type="radio" value='<?=$paciente->getId();?>' name='paciente'></div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" ><?=$paciente->getNome();?></div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" ><?=$paciente->getEmail();?></div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" ><?=$paciente->getTelefoneCel();?></div>
			</div>
            <hr>
			<?php } ?>
                        
            <?php $dadosPaciente = serialize($paciente);?>
            <div class="col-xs-12 ">
			<button type="submit" class="btn btn-default" value='' name='alterarPaciente'  onclick="action='secretaria_alterar_pacientes'" disabled >Alterar</button>
			<button type="submit" class="btn btn-default" value='<?=$_SESSION[$_SERVER['PHP_SELF']] = substr(md5( time()),0,9);?>' name='remover' >Remover</button>
			<a href="secretaria_cadastro_pacientes" class="btn btn-default">Cadastrar Novo Paciente</a>
			
			</div>

        </form>
        
        
      </div>
    </div>

<?php 
	include "secretaria_rodape.php"; 
	} else { header("Location: login"); } 
?>