
$(document).ready(function(){
	var id_destaque = "";
	var descricao_destaque = "";
	var grupo_id = "";
	var imagem_destaque = "";
	var data_atualizacao_destaque = "";
	var bool_ativo_destaque = "";

	var vetor = [];
	$.ajax({
		url:'app/controllers/funcoes_destaqueController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_destaque_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split(",");

		id_destaque = vetor[0];
		
		descricao_destaque = vetor[1];
		grupo_id = vetor[2];
		imagem_destaque = vetor[3];
		data_atualizacao_destaque = vetor[4];
		bool_ativo_destaque = vetor[5];
		
		$("#descricao_destaque").val(descricao_destaque);
		$("#grupo_id").val(grupo_id);
		$("#imagem_destaque").val(imagem_destaque);
		$("#data_atualizacao_destaque").val(data_atualizacao_destaque);
		$("#bool_ativo_destaque").val(bool_ativo_destaque);
		
		$.ajax({
			url:'app/controllers/funcoes_grupoController.php',
			type: 'POST',
			dataType: 'text',
			data: { 
				'pequisa_grupo_id': true,
				'id': grupo_id
			}
		}).done( function(data){
			vetor = data.split(",");
			$("#grupo_id-flexdatalist").val(vetor[1]);
			$("#grupo_id").val(parseInt(vetor[0]));
		});

		$("#grupo_id").val(grupo_id);
		
	});
});


function atualizarrRegistro(){
	var campoFocus = "";
		 if(validation($("#descricao_destaque").val() == "")) campoFocus = "descricao_destaque";
	else if(validation($("#grupo_id").val() == "")) campoFocus = "grupo_id";
	else if(validation($("#imagem_destaque").val() == "")) campoFocus = "imagem_destaque";
	else if(validation($("#data_atualizacao_destaque").val() == "")) campoFocus = "data_atualizacao_destaque";
	else if(validation($("#bool_ativo_destaque").val() == "")) campoFocus = "bool_ativo_destaque";


	else {
		$.ajax({
			url:'app/controllers/atualiza_destaqueController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_destaque': $("#editar").val(),
				'descricao_destaque': $("#descricao_destaque").val(),
				'grupo_id': $("#grupo_id").val(),
				'imagem_destaque': $("#imagem_destaque").val(),
				'data_atualizacao_destaque': $("#data_atualizacao_destaque").val(),
				'bool_ativo_destaque': $("#bool_ativo_destaque").val()
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
