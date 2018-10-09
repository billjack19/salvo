
$(document).ready(function(){
	var id_loja = "";
	var titulo_loja = "";
	var descricao_loja = "";
	var imagem_loja = "";
	var configurar_site_id = "";
	var data_atualizacao_loja = "";
	var bool_ativo_loja = "";

	var vetor = [];
	$.ajax({
		url:'app/controllers/funcoes_lojaController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_loja_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split(",");

		id_loja = vetor[0];
		
		titulo_loja = vetor[1];
		descricao_loja = vetor[2];
		imagem_loja = vetor[3];
		configurar_site_id = vetor[4];
		data_atualizacao_loja = vetor[5];
		bool_ativo_loja = vetor[6];
		
		$("#titulo_loja").val(titulo_loja);
		$("#descricao_loja").val(descricao_loja);
		$("#imagem_loja").val(imagem_loja);
		$("#configurar_site_id").val(configurar_site_id);
		$("#data_atualizacao_loja").val(data_atualizacao_loja);
		$("#bool_ativo_loja").val(bool_ativo_loja);
		
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
		 if(validation($("#titulo_loja").val() == "")) campoFocus = "titulo_loja";
	else if(validation($("#configurar_site_id").val() == "")) campoFocus = "configurar_site_id";
	else if(validation($("#bool_ativo_loja").val() == "")) campoFocus = "bool_ativo_loja";


	else {
		$.ajax({
			url:'app/controllers/atualiza_lojaController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_loja': $("#editar").val(),
				'titulo_loja': $("#titulo_loja").val(),
				'descricao_loja': $("#descricao_loja").val(),
				'imagem_loja': $("#imagem_loja").val(),
				'configurar_site_id': $("#configurar_site_id").val(),
				'data_atualizacao_loja': $("#data_atualizacao_loja").val(),
				'bool_ativo_loja': $("#bool_ativo_loja").val()
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
