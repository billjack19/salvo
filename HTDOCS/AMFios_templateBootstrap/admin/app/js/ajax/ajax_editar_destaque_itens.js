
$(document).ready(function(){
	var id_destaque_itens = "";
	var descricao_destaque_itens = "";
	var item_id = "";
	var configurar_site_id = "";
	var data_atualizacao_destaque_itens = "";
	var bool_ativo_destaque_itens = "";

	var vetor = [];
	$.ajax({
		url:'app/controllers/funcoes_destaque_itensController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_destaque_itens_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split(",");

		id_destaque_itens = vetor[0];
		
		descricao_destaque_itens = vetor[1];
		item_id = vetor[2];
		configurar_site_id = vetor[3];
		data_atualizacao_destaque_itens = vetor[4];
		bool_ativo_destaque_itens = vetor[5];
		
		$("#descricao_destaque_itens").val(descricao_destaque_itens);
		$("#item_id").val(item_id);
		$("#configurar_site_id").val(configurar_site_id);
		$("#data_atualizacao_destaque_itens").val(data_atualizacao_destaque_itens);
		$("#bool_ativo_destaque_itens").val(bool_ativo_destaque_itens);
		
		$.ajax({
			url:'app/controllers/funcoes_itemController.php',
			type: 'POST',
			dataType: 'text',
			data: { 
				'pequisa_item_id': true,
				'id': item_id
			}
		}).done( function(data){
			vetor = data.split(",");
			$("#item_id-flexdatalist").val(vetor[1]);
			$("#item_id").val(parseInt(vetor[0]));
		});

		$("#item_id").val(item_id);
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
		 if(validation($("#descricao_destaque_itens").val() == "")) campoFocus = "descricao_destaque_itens";
	else if(validation($("#item_id").val() == "")) campoFocus = "item_id";
	else if(validation($("#configurar_site_id").val() == "")) campoFocus = "configurar_site_id";
	else if(validation($("#bool_ativo_destaque_itens").val() == "")) campoFocus = "bool_ativo_destaque_itens";


	else {
		$.ajax({
			url:'app/controllers/atualiza_destaque_itensController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_destaque_itens': $("#editar").val(),
				'descricao_destaque_itens': $("#descricao_destaque_itens").val(),
				'item_id': $("#item_id").val(),
				'configurar_site_id': $("#configurar_site_id").val(),
				'data_atualizacao_destaque_itens': $("#data_atualizacao_destaque_itens").val(),
				'bool_ativo_destaque_itens': $("#bool_ativo_destaque_itens").val()
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
