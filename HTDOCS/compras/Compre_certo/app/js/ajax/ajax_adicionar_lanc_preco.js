
function gravarRegistro(){
	var campoFocus = "";
		 if($("#supermercado_id").val() == "") campoFocus = "supermercado_id";
	else if($("#item_id").val() == "") campoFocus = "item_id";
	else if($("#preco_lanc_preco").val() == "") campoFocus = "preco_lanc_preco";
	else if($("#data_atualizacao_lanc_preco").val() == "") campoFocus = "data_atualizacao_lanc_preco";
	else if($("#usuario_id").val() == "") campoFocus = "usuario_id";
	else if($("#bool_ativo_lanc_preco").val() == "") campoFocus = "bool_ativo_lanc_preco";


	else {
		$.ajax({
			url:'app/controllers/cadastro_lanc_precoController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'supermercado_id': $("#supermercado_id").val(),
				'item_id': $("#item_id").val(),
				'marca_id': $("#marca_id").val(),
				'preco_lanc_preco': $("#preco_lanc_preco").val(),
				'data_atualizacao_lanc_preco': $("#data_atualizacao_lanc_preco").val(),
				'usuario_id': $("#usuario_id").val(),
				'bool_ativo_lanc_preco': $("#bool_ativo_lanc_preco").val(),
				'areaDeAtuacao': $("#areaDeAtuacao").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha: "+data);
			else {
				toast.success("Cadastrado com sucesso!");
				$("#preco_lanc_preco").val("");
			}
		});
	} 

	if (campoFocus != "") {
		document.getElementById(campoFocus).focus();
		toast.danger('Preencha no mínimo todos os campos obrigatórios!');
	}
}