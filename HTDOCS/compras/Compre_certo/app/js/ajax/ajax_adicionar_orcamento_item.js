
function gravarRegistro(){
	var campoFocus = "";
		 if($("#supermercado_id").val() == "") campoFocus = "supermercado_id";
	else if($("#item_id").val() == "") campoFocus = "item_id";
	else if($("#quantidade_orcamento_item").val() == "") campoFocus = "quantidade_orcamento_item";
	else if($("#preco_orcamento_item").val() == "") campoFocus = "preco_orcamento_item";
	else if($("#total_orcamento_item").val() == "") campoFocus = "total_orcamento_item";
	else if($("#data_atualizacao_orcamento_item").val() == "") campoFocus = "data_atualizacao_orcamento_item";
	else if($("#usuario_id").val() == "") campoFocus = "usuario_id";
	else if($("#bool_ativo_orcamento_item").val() == "") campoFocus = "bool_ativo_orcamento_item";


	else {
		$.ajax({
			url:'app/controllers/cadastro_orcamento_itemController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'supermercado_id': $("#supermercado_id").val(),
				'item_id': $("#item_id").val(),
				'marca_id': $("#marca_id").val(),
				'quantidade_orcamento_item': $("#quantidade_orcamento_item").val(),
				'preco_orcamento_item': $("#preco_orcamento_item").val(),
				'total_orcamento_item': $("#total_orcamento_item").val(),
				'orcamento_id': $("#orcamento_id").val(),
				'data_atualizacao_orcamento_item': $("#data_atualizacao_orcamento_item").val(),
				'usuario_id': $("#usuario_id").val(),
				'bool_ativo_orcamento_item': $("#bool_ativo_orcamento_item").val(),
				'areaDeAtuacao': $("#areaDeAtuacao").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha: "+data);
			else {
				toast.success("Cadastrado com sucesso!");
				$("#quantidade_orcamento_item").val("");
				$("#preco_orcamento_item").val("");
				$("#total_orcamento_item").val("");
			}
		});
	} 

	if (campoFocus != "") {
		document.getElementById(campoFocus).focus();
		toast.danger('Preencha no mínimo todos os campos obrigatórios!');
	}
}