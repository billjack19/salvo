
function gravarRegistro(){
	var campoFocus = "";
		 if(validation($("#descricao_destaque_itens").val() == "")) campoFocus = "descricao_destaque_itens";
	else if(validation($("#item_id").val() == "")) campoFocus = "item_id";
	else if(validation($("#configurar_site_id").val() == "")) campoFocus = "configurar_site_id";
	else if(validation($("#bool_ativo_destaque_itens").val() == "")) campoFocus = "bool_ativo_destaque_itens";


	else {
		$.ajax({
			url:'app/controllers/cadastro_destaque_itensController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'descricao_destaque_itens': $("#descricao_destaque_itens").val(),
				'item_id': $("#item_id").val(),
				'configurar_site_id': $("#configurar_site_id").val(),
				'data_atualizacao_destaque_itens': $("#data_atualizacao_destaque_itens").val(),
				'bool_ativo_destaque_itens': $("#bool_ativo_destaque_itens").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha ao Cadastrar!");
			else {
				toast.success("Cadastrado com sucesso!");
				$("#descricao_destaque_itens").val("");
				$("#data_atualizacao_destaque_itens").val("");
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
