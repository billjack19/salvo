
function gravarRegistro(){
	var campoFocus = "";
		 if(validation($("#descricao_topicos_cards").val() == "")) campoFocus = "descricao_topicos_cards";
	else if(validation($("#cards_id").val() == "")) campoFocus = "cards_id";
	else if(validation($("#data_atualizacao_topicos_cards").val() == "")) campoFocus = "data_atualizacao_topicos_cards";
	else if(validation($("#usuario_id").val() == "")) campoFocus = "usuario_id";
	else if(validation($("#bool_ativo_topicos_cards").val() == "")) campoFocus = "bool_ativo_topicos_cards";


	else {
		$.ajax({
			url:'app/controllers/cadastro_topicos_cardsController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'descricao_topicos_cards': $("#descricao_topicos_cards").val(),
				'cards_id': $("#cards_id").val(),
				'data_atualizacao_topicos_cards': $("#data_atualizacao_topicos_cards").val(),
				'usuario_id': $("#usuario_id").val(),
				'bool_ativo_topicos_cards': $("#bool_ativo_topicos_cards").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha: "+data);
			else {
				toast.success("Cadastrado com sucesso!");
				$("#descricao_topicos_cards").val("");
			}
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
