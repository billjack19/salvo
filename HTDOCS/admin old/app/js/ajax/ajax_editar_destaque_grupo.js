
$(document).ready(function(){
	var id_destaque_grupo = "";
	var titulo_destaque_grupo = "";
	var grupo_id = "";
	var imagem_destaque_grupo = "";
	var descricao_destaque_grupo = "";
	var configurar_site_id = "";
	var data_atualizacao_destaque_grupo = "";
	var bool_ativo_destaque_grupo = "";

	var vetor = [];
	$.ajax({
		url:'app/controllers/funcoes_destaque_grupoController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_destaque_grupo_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split(",");

		id_destaque_grupo = vetor[0];
		
		titulo_destaque_grupo = vetor[1];
		grupo_id = vetor[2];
		imagem_destaque_grupo = vetor[3];
		descricao_destaque_grupo = vetor[4];
		configurar_site_id = vetor[5];
		data_atualizacao_destaque_grupo = vetor[6];
		bool_ativo_destaque_grupo = vetor[7];
		
		$("#titulo_destaque_grupo").val(titulo_destaque_grupo);
		$("#grupo_id").val(grupo_id);
		$("#imagem_destaque_grupo").val(imagem_destaque_grupo);
		$("#descricao_destaque_grupo").val(descricao_destaque_grupo);
		$("#configurar_site_id").val(configurar_site_id);
		$("#data_atualizacao_destaque_grupo").val(data_atualizacao_destaque_grupo);
		$("#bool_ativo_destaque_grupo").val(bool_ativo_destaque_grupo);
		
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
		$.ajax({
			url:'app/controllers/funcoes_configurar_siteController.php',
			type: 'POST',
			dataType: 'text',
			data: { 
				'pequisa_configurar_site_id': true,
				'id': configurar_site_id
			}
		}).done( function(data){
			vetor = data.split(",");
			$("#configurar_site_id-flexdatalist").val(vetor[1]);
			$("#configurar_site_id").val(parseInt(vetor[0]));
		});

		$("#configurar_site_id").val(configurar_site_id);
		
	});
});


function atualizarrRegistro(){
	var campoFocus = "";
		 if(validation($("#titulo_destaque_grupo").val() == "")) campoFocus = "titulo_destaque_grupo";
	else if(validation($("#grupo_id").val() == "")) campoFocus = "grupo_id";
	else if(validation($("#imagem_destaque_grupo").val() == "")) campoFocus = "imagem_destaque_grupo";
	else if(validation($("#configurar_site_id").val() == "")) campoFocus = "configurar_site_id";
	else if(validation($("#bool_ativo_destaque_grupo").val() == "")) campoFocus = "bool_ativo_destaque_grupo";


	else {
		$.ajax({
			url:'app/controllers/atualiza_destaque_grupoController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_destaque_grupo': $("#editar").val(),
				'titulo_destaque_grupo': $("#titulo_destaque_grupo").val(),
				'grupo_id': $("#grupo_id").val(),
				'imagem_destaque_grupo': $("#imagem_destaque_grupo").val(),
				'descricao_destaque_grupo': $("#descricao_destaque_grupo").val(),
				'configurar_site_id': $("#configurar_site_id").val(),
				'data_atualizacao_destaque_grupo': $("#data_atualizacao_destaque_grupo").val(),
				'bool_ativo_destaque_grupo': $("#bool_ativo_destaque_grupo").val()
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
