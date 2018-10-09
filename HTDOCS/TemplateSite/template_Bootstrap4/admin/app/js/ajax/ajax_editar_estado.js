
$(document).ready(function(){
	var id_estado = "";
	var descricao_estado = "";
	var sigla_estado = "";
	var bool_ativo_estado = "";

	var vetor = [];
	$.ajax({
		url:'app/controllers/funcoes_estadoController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_estado_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split(",");

		id_estado = vetor[0];
		
		descricao_estado = vetor[1];
		sigla_estado = vetor[2];
		bool_ativo_estado = vetor[3];
		
		$("#descricao_estado").val(descricao_estado);
		$("#sigla_estado").val(sigla_estado);
		$("#bool_ativo_estado").val(bool_ativo_estado);
		
		
	});
});


function atualizarrRegistro(){
	var campoFocus = "";
		 if(validation($("#descricao_estado").val() == "")) campoFocus = "descricao_estado";
	else if(validation($("#sigla_estado").val() == "")) campoFocus = "sigla_estado";
	else if(validation($("#bool_ativo_estado").val() == "")) campoFocus = "bool_ativo_estado";


	else {
		$.ajax({
			url:'app/controllers/atualiza_estadoController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_estado': $("#editar").val(),
				'descricao_estado': $("#descricao_estado").val(),
				'sigla_estado': $("#sigla_estado").val(),
				'bool_ativo_estado': $("#bool_ativo_estado").val()
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
