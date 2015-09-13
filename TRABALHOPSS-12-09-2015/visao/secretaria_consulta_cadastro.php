<?php 
	session_start();
	if(isset($_SESSION['SECRETARIA'])){ 
	include "secretaria_topo.php"; 
		
	if( ( $_SERVER['REQUEST_METHOD'] == 'POST' and isset($_SESSION[$_SERVER['PHP_SELF'] ]) ) and ($_SESSION[$_SERVER['PHP_SELF'] ] == $_POST['confirmarCadastroConsulta']) ) {
		
		include "../controle/ConsultaControle.php";
		$consulta = new ConsultaControle();
		$consulta->inserir($_POST['cpf'], $_POST['dataHora'], $_POST['medico']);
		
	} 	
	?>   

<div class="container">
    <h1>Cadastro de Consulta</h1>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  ">
      
      
        <form action="" method="post">
            <label for=""></label>
            <input type="text" class="form-control" 	name="cpf"	id="cpf" placeholder="CPF Paciente">

            <label for=""></label>
            <input type="datetime" class="form-control" 	name="dataHora"	id="dataHora" placeholder="Data e hota">
			
			<?php
				require_once("../controle/MedicoControle.php");
				$medico = new MedicoControle();
				$listaMedicos = $medico->listar();
			?>
            <select class="form-control" name='medico' placeholder="Médico">
            	<option>Selecione um Médico</option>
				<?php foreach($listaMedicos as $medico){ ?>
            	<option value='<?=$medico->getId();?>'><?=$medico->getNome();?></option>
				<?php } ?>
            </select>
			
			<br><br>
			
			<button type="submit" class="btn btn-default" value='<?=$_SESSION[$_SERVER['PHP_SELF']] = substr(md5( time()),0,9);?>' name='confirmarCadastroConsulta'>Confirmar Cadastro</button>
        </form>
        </div>            
    </div>            
</div>            



<?php 
	include "secretaria_rodape.php"; 
	} else { header("Location: login"); }
?>
