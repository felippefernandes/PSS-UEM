
function validateform() {
			
			quantidadeCampos = $(".obrigatorio").length;
			campos			 = $(".obrigatorio");
			var retornaFalso = false;
			
			for (i = 0; i < quantidadeCampos; i++) { 
				// caso seja um campo de input
				if(campos[i].value=="" || campos[i].value=="Preencher!"){
					campos[i].value="Preencher!";
					campos[i].style.backgroundColor= "#FF7F7F"; 
					campos[i].style.color= "#fff"; 
					campos[i].focus();
					retornaFalso = true;
				} 

				// caso seja um campo de list/menu
				if(campos[i].value==999999){
					campos[i].style.backgroundColor= "#FF7F7F"; 
					campos[i].style.color= "#fff"; 
					campos[i].focus();
					retornaFalso = true;
				} 
				
				// caso seja um campo FILE
				if(campos[i].value=="   Nenhum arquivo selecionado" ) {	
					$('.caixa_imput').css({"background-image":"url(visao/imput_personalizado/caixa2-b.png)", "color":"#AEAEAE"});
					$('.botaoBlock').css({"background-image":"url(visao/imput_personalizado/botao2-b.png)", "color":"#AEAEAE"});
					retornaFalso = true;
				}
				
			}
			
			if(retornaFalso){ 
				return (false); 
			}
			
}


// função para limpar os campos obrigatórios depois de sinalizados 
function limparCampoObrigatorio(campo) {
		// caso seja um campo de input
		if(campo.value=="Preencher!" || campo.value.substring(0,16)=="Email inválido: " || campo.value=="___.___.___-__" || campo.value=="____/__/__ __:__:__" || campo.value=="(__) ____-____" ){
				campo.value="";
				campo.style.backgroundColor= '#fff';
				campo.style.color= '#000' ;
		}
		
		// caso seja um campo de list/menu
		if(campo.value==999999 ){
				campo.style.backgroundColor= '#fff';
				campo.style.color= '#000' ;
		}
		
}

jQuery(function($){
   //$(".date").mask("99/99/9999",{placeholder:"mm/dd/yyyy"});
   $(".telefone").mask("(99) 9999-9999");
   $(".dataHora").mask("9999/99/99 99:99:99");
   $(".cpf").mask("999.999.999-99");
});


