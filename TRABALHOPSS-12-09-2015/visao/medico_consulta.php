<?php 
session_start();
if(isset($_SESSION['MEDICO'])){ 
include "medico_topo.php"; 

	if( $_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['botaoConsulta']) ) {

		require_once("../controle/ConsultaControle.php");
		$consultaControle = new ConsultaControle();
		$consulta = $consultaControle->buscaConsulta($_POST['consulta']);

		require_once("../controle/PacienteControle.php");
		$pacienteControle = new PacienteControle();
		$paciente = $pacienteControle->buscaPaciente($consulta->getPaciente());		

	} 



	if( $_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['botaoFinalizaConsulta']) ) {
	
		require_once("../controle/ConsultaControle.php");
		$consultaControle = new ConsultaControle();
		$consulta = $consultaControle->alterarConsulta();

		require_once("../controle/PacienteControle.php");
		$pacienteControle = new PacienteControle();
		$paciente = $pacienteControle->alteraPaciente();		

	} 
	
?>


<div class="container">
    <h1>Consulta com Paciente</h1>
	
        <form action="" method="post">
            <input type="hidden" class="form-control" 	id="" name='codigoConsulta' value='<?=$consulta->getId();?>' >
            <input type="hidden" class="form-control" 	id="" name='codigoPaciente' value='<?=$paciente->getId();?>' >

            <label for="nome">Nome</label>
            <input type="text" class="form-control" 	id="" placeholder="Nome" value='<?=$paciente->getNome();?>' disabled >

			<label for="">Fuma</label>
            <input type="text" class="form-control" 	id="" name='fuma' value='<?=$paciente->getFuma();?>'>

			<label for="">Bebe</label>
            <input type="text" class="form-control" 	id="" name='bebe' value='<?=$paciente->getBebe();?>'>

			<label for="">Colesterol</label>
            <input type="text" class="form-control" 	id="" name='colesterol' value='<?=$paciente->getColesterol();?>'>

            <label for="">Doenças Cardiacas</label>
            <textarea class="form-control" rows="3" name='doencasCardiacas' ><?=$paciente->getDoencasCardiacas();?></textarea>
            
            <label for="">Cirurgias</label>
            <textarea class="form-control" rows="3" name='cirurgias' ><?=$paciente->getCirurgias();?></textarea>
            
            <label for="">Alergias</label>
            <textarea class="form-control" rows="3" name='alergias' ><?=$paciente->getAlergias();?></textarea>


            <label for="">Sintomas</label>
            <textarea class="form-control" rows="3" name='sintomas' ><?=$consulta->getSintoma();?></textarea>

            <label for="">Diagnóstico</label>
            <textarea class="form-control" rows="3" name='diagnostico' ><?=$consulta->getDiagnostico();?></textarea>

            <label for="">Receita</label>
            <textarea class="form-control" rows="3" name='receita' ><?=$consulta->getReceita();?></textarea>
			
			<br>
			<div class="col-xs-12 ">
			<button type="submit" class="btn btn-default" value='' name='botaoFinalizaConsulta'  >Finalizar Consulta</button>
			</div>

		
			</form>
		

</div>
<br><br><br>










<?php 
include "medico_rodape.php"; 

} else { header("Location: login"); }
