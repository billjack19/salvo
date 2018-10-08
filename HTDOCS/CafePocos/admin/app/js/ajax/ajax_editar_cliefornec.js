
$(document).ready(function(){
	var id_cliefornec = "";
	var CPF_CGC = "";
	var RAZAOSOCIAL = "";
	var NOMEFANTASIA = "";
	var senha_site = "";
	var bool_ativo_cliefornec = "";

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
		NOMEFANTASIA = vetor[3];
		senha_site = vetor[4];
		bool_ativo_cliefornec = vetor[5];
		
		$("#CPF_CGC").val(CPF_CGC);
		$("#RAZAOSOCIAL").val(RAZAOSOCIAL);
		$("#NOMEFANTASIA").val(NOMEFANTASIA);
		$("#senha_site").val(senha_site);
		$("#bool_ativo_cliefornec").val(bool_ativo_cliefornec);
		
		
	});
});


function atualizarrRegistro(){
	var campoFocus = "";
		 if(validation($("#bool_ativo_cliefornec").val() == "")) campoFocus = "bool_ativo_cliefornec";


	else {
		$.ajax({
			url:'app/controllers/atualiza_cliefornecController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_cliefornec': $("#editar").val(),
				'CPF_CGC': $("#CPF_CGC").val(),
				'RAZAOSOCIAL': $("#RAZAOSOCIAL").val(),
				'NOMEFANTASIA': $("#NOMEFANTASIA").val(),
				'senha_site': $("#senha_site").val(),
				'bool_ativo_cliefornec': $("#bool_ativo_cliefornec").val()
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
