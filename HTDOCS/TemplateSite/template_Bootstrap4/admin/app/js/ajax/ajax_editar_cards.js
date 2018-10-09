
$(document).ready(function(){
	var id_cards = "";
	var titulo_cards = "";
	var descricao_cards = "";
	var imagem_cards = "";
	var data_atualizacao_cards = "";
	var bool_ativo_cards = "";

	var vetor = [];
	$.ajax({
		url:'app/controllers/funcoes_cardsController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_cards_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split(",");

		id_cards = vetor[0];
		
		titulo_cards = vetor[1];
		descricao_cards = vetor[2];
		imagem_cards = vetor[3];
		data_atualizacao_cards = vetor[4];
		bool_ativo_cards = vetor[5];
		
		$("#titulo_cards").val(titulo_cards);
		$("#descricao_cards").val(descricao_cards);
		$("#imagem_cards").val(imagem_cards);
		$("#data_atualizacao_cards").val(data_atualizacao_cards);
		$("#bool_ativo_cards").val(bool_ativo_cards);
		
		
	});
});


function atualizarrRegistro(){
	var campoFocus = "";
		 if(validation($("#titulo_cards").val() == "")) campoFocus = "titulo_cards";
	else if(validation($("#imagem_cards").val() == "")) campoFocus = "imagem_cards";
	else if(validation($("#data_atualizacao_cards").val() == "")) campoFocus = "data_atualizacao_cards";
	else if(validation($("#bool_ativo_cards").val() == "")) campoFocus = "bool_ativo_cards";


	else {
		$.ajax({
			url:'app/controllers/atualiza_cardsController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_cards': $("#editar").val(),
				'titulo_cards': $("#titulo_cards").val(),
				'descricao_cards': $("#descricao_cards").val(),
				'imagem_cards': $("#imagem_cards").val(),
				'data_atualizacao_cards': $("#data_atualizacao_cards").val(),
				'bool_ativo_cards': $("#bool_ativo_cards").val()
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
