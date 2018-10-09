
function gravarRegistro(){
	var campoFocus = "";
		 if($("#titulo_cards").val() == "") campoFocus = "titulo_cards";
	else if($("#imagem_cards").val() == "") campoFocus = "imagem_cards";
	else if($("#configurar_site_id").val() == "") campoFocus = "configurar_site_id";
	else if($("#bool_ativo_cards").val() == "") campoFocus = "bool_ativo_cards";


	else {
		$.ajax({
			url:'app/controllers/cadastro_cardsController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'titulo_cards': $("#titulo_cards").val(),
				'descricao_cards': $("#descricao_cards").val(),
				'imagem_cards': $("#imagem_cards").val(),
				'configurar_site_id': $("#configurar_site_id").val(),
				'data_atualizacao_cards': $("#data_atualizacao_cards").val(),
				'bool_ativo_cards': $("#bool_ativo_cards").val(),
				'areaDeAtuacao': $("#areaDeAtuacao").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha: "+data);
			else {
				toast.success("Cadastrado com sucesso!");
				$("#titulo_cards").val("");
				$("#descricao_cards").val("");
				$("#imagem_cards").val("");
			}
		});
	} 

	if (campoFocus != "") {
		document.getElementById(campoFocus).focus();
		toast.danger('Preencha no mínimo todos os campos obrigatórios!');
	}
}