
$(document).ready(function(){
	var id_cliefornec_telefone = "";
	var Email = "";

	var vetor = [];
	$.ajax({
		url:'app/controllers/funcoesController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'editar': true,
			'id': $("#editar").val()
		}
	}).done( function(data){});


	$.ajax({
		url:'app/controllers/funcoes_cliefornec_telefoneController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_cliefornec_telefone_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split("{,}");

		id_cliefornec_telefone = vetor[0];
		
		Email = vetor[1];
		
		$("#Email").val(Email);
		
		
	});
});


function atualizarrRegistro(){
	var campoFocus = "";


	if(true) {
		$.ajax({
			url:'app/controllers/atualiza_cliefornec_telefoneController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_cliefornec_telefone': $("#editar").val(),
				'Email': $("#Email").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha ao Atualizar!");
			else 								toast.success("Atualizado com sucesso!");
		});
	} 

	if (campoFocus != "") {
		document.getElementById(campoFocus).focus();
		toast.danger('Preencha no mínimo todos os campos obrigatórios!');
	}
}

function validation(valor){
	if (valor == "") 	return false;
	else 				return true;
}
