
$(document).ready(function(){
	var id_slide_show = "";
	var titulo_slide_show = "";
	var descricao_slide_show = "";
	var imagem_slide_show = "";
	var data_atualizacao_slide_show = "";
	var bool_ativo_slide_show = "";

	var vetor = [];
	$.ajax({
		url:'app/controllers/funcoes_slide_showController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_slide_show_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split(",");

		id_slide_show = vetor[0];
		
		titulo_slide_show = vetor[1];
		descricao_slide_show = vetor[2];
		imagem_slide_show = vetor[3];
		data_atualizacao_slide_show = vetor[4];
		bool_ativo_slide_show = vetor[5];
		
		$("#titulo_slide_show").val(titulo_slide_show);
		$("#descricao_slide_show").val(descricao_slide_show);
		$("#imagem_slide_show").val(imagem_slide_show);
		$("#data_atualizacao_slide_show").val(data_atualizacao_slide_show);
		$("#bool_ativo_slide_show").val(bool_ativo_slide_show);
		
		
	});
});


function atualizarrRegistro(){
	var campoFocus = "";
		 if(validation($("#imagem_slide_show").val() == "")) campoFocus = "imagem_slide_show";
	else if(validation($("#data_atualizacao_slide_show").val() == "")) campoFocus = "data_atualizacao_slide_show";
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
