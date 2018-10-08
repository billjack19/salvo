
$(document).ready(function(){
	var id_cliefornec = "";
	var CPF_CGC = "";
	var RAZAOSOCIAL = "";

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
		url:'app/controllers/funcoes_cliefornecController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_cliefornec_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split("{,}");

		id_cliefornec = vetor[0];
		
		CPF_CGC = vetor[1];
		RAZAOSOCIAL = vetor[2];
		
		$("#CPF_CGC").val(CPF_CGC);
		$("#RAZAOSOCIAL").val(RAZAOSOCIAL);
		
	});
});


function atualizarrRegistro(){
	var campoFocus = "";


	if(true) {
		$.ajax({
			url:'app/controllers/atualiza_cliefornecController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_cliefornec': $("#editar").val(),
				'CPF_CGC': $("#CPF_CGC").val(),
				'RAZAOSOCIAL': $("#RAZAOSOCIAL").val()
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
