
function gravarRegistro(){
	var campoFocus = "";
		 if(validation($("#titulo_cards").val() == "")) campoFocus = "titulo_cards";
	else if(validation($("#imagem_cards").val() == "")) campoFocus = "imagem_cards";
	else if(validation($("#sequencia_cards").val() == "")) campoFocus = "sequencia_cards";
	else if(validation($("#configurar_site_id").val() == "")) campoFocus = "configurar_site_id";
	else if(validation($("#bool_ativo_cards").val() == "")) campoFocus = "bool_ativo_cards";


	else {
		$.ajax({
			url:'app/controllers/cadastro_cardsController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'titulo_cards': $("#titulo_cards").val(),
				'descricao_cards': $("#descricao_cards").val(),
				'descricao_item_cards': $("#descricao_item_cards").val(),
				'imagem_cards': $("#imagem_cards").val(),
				'sequencia_cards': $("#sequencia_cards").val(),
				'configurar_site_id': $("#configurar_site_id").val(),
				'data_atualizacao_cards': $("#data_atualizacao_cards").val(),
				'bool_ativo_cards': $("#bool_ativo_cards").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha: "+data);
			else {
				toast.success("Cadastrado com sucesso!");
				$("#titulo_cards").val("");
				$("#descricao_cards").val("");
				$("#descricao_item_cards").val("");
				$("#imagem_cards").val("");
				$("#sequencia_cards").val("");
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
