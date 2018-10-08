
$(document).ready(function(){
	var id_cliefornec_telefone = "";
	var Telefone = "";
	var EMail = "";

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
		
		Telefone = vetor[1];
		EMail = vetor[2];
		
		$("#Telefone").val(Telefone);
		$("#EMail").val(EMail);
		
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
				'Telefone': $("#Telefone").val(),
				'EMail': $("#EMail").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha: "+data);
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
