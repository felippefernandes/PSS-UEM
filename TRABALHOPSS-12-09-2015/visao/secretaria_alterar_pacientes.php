<?php 
	session_start();
	if(isset($_SESSION['SECRETARIA'])){ 
	include "secretaria_topo.php"; 
		
	if( ( $_SERVER['REQUEST_METHOD'] == 'POST' and isset($_SESSION[$_SERVER['PHP_SELF'] ]) ) and ($_SESSION[$_SERVER['PHP_SELF'] ] == $_POST['confirmarAlteracao']) ) {

		//include "../controle/PacienteControle.php";
		//$paciente = new PacienteControle();
		//$listaPacientes = $paciente->inserir();
		echo "ok";
	} 	
	?>   

<div class="container">
    <h1>Alterar Paciente</h1>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  ">
      
      
        <form action="" method="post">
            <label for=""></label>
            <input type="text" class="form-control" 	name="nome"	id="nome" placeholder="Nome">

            <label for=""></label>
            <input type="email" class="form-control" 	name="email"	id="email" placeholder="Email">

            <label for=""></label>
            <input type="text" class="form-control" 	name="celular"	id="celular" placeholder="Celular">

            <label for=""></label>
            <input type="text" class="form-control" 	name="telefone"	id="telefone" placeholder="Tel. Residencial">

            <label for=""></label>
            <input type="text" class="form-control" 	name="data_nascimento"	id="data_nascimento" placeholder="Data de Nascimento">

            <label for=""></label>
            <input type="text" class="form-control" 	name="cpf"	id="cpf" placeholder="CPF">

            <label for=""></label>
            <input type="text" class="form-control" 	name="endereco"	id="endereco" placeholder="Endereço">

            <label for=""></label>
            <input type="text" class="form-control" 	name="convenio"	id="convenio" placeholder="Convênio">
            
            <label>Sexo:
                <input type="radio" name="sexo" id="sexo" value="homem" checked>
                Masculino 
                <input type="radio" name="sexo" id="sexo" value="mulher" >
                Feminino
            </label>
			
			<br><br>
			
			<button type="submit" class="btn btn-default" value='<?=$_SESSION[$_SERVER['PHP_SELF']] = substr(md5( time()),0,9);?>' name='confirmarAlteracao'>Confirmar Alteração</button>
        </form>
        </div>            
    </div>            
</div>            



<?php 
	include "secretaria_rodape.php"; 
	} else { header("Location: login"); }
?>
