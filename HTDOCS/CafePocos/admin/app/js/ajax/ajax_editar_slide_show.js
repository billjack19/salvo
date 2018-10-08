
$(document).ready(function(){
	var id_slide_show = "";
	var titulo_slide_show = "";
	var descricao_slide_show = "";
	var imagem_slide_show = "";
	var configurar_site_id = "";
	var data_atualizacao_slide_show = "";
	var bool_ativo_slide_show = "";

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
		url:'app/controllers/funcoes_slide_showController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_slide_show_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split("{,}");

		id_slide_show = vetor[0];
		
		titulo_slide_show = vetor[1];
		descricao_slide_show = vetor[2];
		imagem_slide_show = vetor[3];
		configurar_site_id = vetor[4];
		data_atualizacao_slide_show = vetor[5];
		bool_ativo_slide_show = vetor[6];
		
		$("#titulo_slide_show").val(titulo_slide_show);
		$("#descricao_slide_show").val(descricao_slide_show);
		$("#imagem_slide_show").val(imagem_slide_show);
		$("#configurar_site_id").val(configurar_site_id);
		$("#data_atualizacao_slide_show").val(data_atualizacao_slide_show);
		$("#bool_ativo_slide_show").val(bool_ativo_slide_show);
		
		if(configurar_site_id != 0){
			$.ajax({
				url:'app/controllers/funcoes_configurar_siteController.php',
				type: 'POST',
				dataType: 'text',
				data: { 
					'pequisa_configurar_site_id': true,
					'id': configurar_site_id
				}
			}).done( function(data){
				vetor = data.split("{,}");
				combo_configurar_site(configurar_site_id, vetor[1]);
				// $("#configurar_site_id-flexdatalist").val(vetor[1]);
				// $("#configurar_site_id").val(parseInt(vetor[0]));
			});
			$("#configurar_site_id").val(configurar_site_id);
		}

		else combo_configurar_site_NV();
		
	});
});


function atualizarrRegistro(){
	var campoFocus = "";
		 if(validation($("#imagem_slide_show").val() == "")) campoFocus = "imagem_slide_show";
	else if(validation($("#configurar_site_id").val() == "")) campoFocus = "configurar_site_id";
	else if(validation($("#bool_ativo_slide_show").val() == "")) campoFocus = "bool_ativo_slide_show";


	else {
		$.ajax({
			url:'app/controllers/atualiza_slide_showController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_slide_show': $("#editar").val(),
				'titulo_slide_show': $("#titulo_slide_show").val(),
				'descricao_slide_show': $("#descricao_slide_show").val(),
				'imagem_slide_show': $("#imagem_slide_show").val(),
				'configurar_site_id': $("#configurar_site_id").val(),
				'data_atualizacao_slide_show': $("#data_atualizacao_slide_show").val(),
				'bool_ativo_slide_show': $("#bool_ativo_slide_show").val()
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
