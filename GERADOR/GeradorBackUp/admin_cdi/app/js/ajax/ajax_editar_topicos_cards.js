
$(document).ready(function(){
	var id_topicos_cards = "";
	var descricao_topicos_cards = "";
	var cards_id = "";
	var data_atualizacao_topicos_cards = "";
	var usuario_id = "";
	var bool_ativo_topicos_cards = "";

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
		url:'app/controllers/funcoes_topicos_cardsController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_topicos_cards_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split("{,}");

		id_topicos_cards = vetor[0];
		
		descricao_topicos_cards = vetor[1];
		cards_id = vetor[2];
		data_atualizacao_topicos_cards = vetor[3];
		usuario_id = vetor[4];
		bool_ativo_topicos_cards = vetor[5];
		
		$("#descricao_topicos_cards").val(descricao_topicos_cards);
		$("#cards_id").val(cards_id);
		$("#data_atualizacao_topicos_cards").val(data_atualizacao_topicos_cards);
		$("#usuario_id").val(usuario_id);
		$("#bool_ativo_topicos_cards").val(bool_ativo_topicos_cards);
		
		if(cards_id != 0){
			$.ajax({
				url:'app/controllers/funcoes_cardsController.php',
				type: 'POST',
				dataType: 'text',
				data: { 
					'pequisa_cards_id': true,
					'id': cards_id
				}
			}).done( function(data){
				vetor = data.split("{,}");
				combo_cards(cards_id, vetor[1]);
				// $("#cards_id-flexdatalist").val(vetor[1]);
				// $("#cards_id").val(parseInt(vetor[0]));
			});
			$("#cards_id").val(cards_id);
		}

		else combo_cards_NV();
		if(usuario_id != 0){
			$.ajax({
				url:'app/controllers/funcoes_usuarioController.php',
				type: 'POST',
				dataType: 'text',
				data: { 
					'pequisa_usuario_id': true,
					'id': usuario_id
				}
			}).done( function(data){
				vetor = data.split("{,}");
				combo_usuario(usuario_id, vetor[1]);
				// $("#usuario_id-flexdatalist").val(vetor[1]);
				// $("#usuario_id").val(parseInt(vetor[0]));
			});
			$("#usuario_id").val(usuario_id);
		}

		else combo_usuario_NV();
	});
});


function atualizarrRegistro(){
	var campoFocus = "";
		 if(validation($("#descricao_topicos_cards").val() == "")) campoFocus = "descricao_topicos_cards";
	else if(validation($("#cards_id").val() == "")) campoFocus = "cards_id";
	else if(validation($("#data_atualizacao_topicos_cards").val() == "")) campoFocus = "data_atualizacao_topicos_cards";
	else if(validation($("#usuario_id").val() == "")) campoFocus = "usuario_id";
	else if(validation($("#bool_ativo_topicos_cards").val() == "")) campoFocus = "bool_ativo_topicos_cards";


	else {
		$.ajax({
			url:'app/controllers/atualiza_topicos_cardsController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_topicos_cards': $("#editar").val(),
				'descricao_topicos_cards': $("#descricao_topicos_cards").val(),
				'cards_id': $("#cards_id").val(),
				'data_atualizacao_topicos_cards': $("#data_atualizacao_topicos_cards").val(),
				'usuario_id': $("#usuario_id").val(),
				'bool_ativo_topicos_cards': $("#bool_ativo_topicos_cards").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha: "+data);
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
