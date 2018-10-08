
$(document).ready(function(){
	var id_upload_arq = "";
	var descricao_upload_arq = "";
	var tipo_upload_arq = "";
	var data_atualizacaoupload_arq = "";
	var bool_ativo_upload_arq = "";

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
		url:'app/controllers/funcoes_upload_arqController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_upload_arq_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split("{,}");

		id_upload_arq = vetor[0];
		
		descricao_upload_arq = vetor[1];
		tipo_upload_arq = vetor[2];
		data_atualizacaoupload_arq = vetor[3];
		bool_ativo_upload_arq = vetor[4];
		
		$("#descricao_upload_arq").val(descricao_upload_arq);
		$("#tipo_upload_arq").val(tipo_upload_arq);
		$("#data_atualizacaoupload_arq").val(data_atualizacaoupload_arq);
		$("#bool_ativo_upload_arq").val(bool_ativo_upload_arq);
		
		
	});
});


function atualizarrRegistro(){
	var campoFocus = "";
		 if(validation($("#descricao_upload_arq").val() == "")) campoFocus = "descricao_upload_arq";
	else if(validation($("#tipo_upload_arq").val() == "")) campoFocus = "tipo_upload_arq";
	else if(validation($("#data_atualizacaoupload_arq").val() == "")) campoFocus = "data_atualizacaoupload_arq";
	else if(validation($("#bool_ativo_upload_arq").val() == "")) campoFocus = "bool_ativo_upload_arq";


	else {
		$.ajax({
			url:'app/controllers/atualiza_upload_arqController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_upload_arq': $("#editar").val(),
				'descricao_upload_arq': $("#descricao_upload_arq").val(),
				'tipo_upload_arq': $("#tipo_upload_arq").val(),
				'data_atualizacaoupload_arq': $("#data_atualizacaoupload_arq").val(),
				'bool_ativo_upload_arq': $("#bool_ativo_upload_arq").val()
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
