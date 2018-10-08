
function gravarRegistro(){
	var campoFocus = "";
		 if(validation($("#data_lanc_item_orcamento").val() == "")) campoFocus = "data_lanc_item_orcamento";
	else if(validation($("#orcamento_id").val() == "")) campoFocus = "orcamento_id";
	else if(validation($("#item_id").val() == "")) campoFocus = "item_id";
	else if(validation($("#quantidade_item_orcamento").val() == "")) campoFocus = "quantidade_item_orcamento";
	else if(validation($("#total_item_orcamento").val() == "")) campoFocus = "total_item_orcamento";


	else {
		$.ajax({
			url:'app/controllers/cadastro_item_orcamentoController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'data_lanc_item_orcamento': $("#data_lanc_item_orcamento").val(),
				'orcamento_id': $("#orcamento_id").val(),
				'item_id': $("#item_id").val(),
				'quantidade_item_orcamento': $("#quantidade_item_orcamento").val(),
				'total_item_orcamento': $("#total_item_orcamento").val(),
				'bool_ativo_item_orcamento': $("#bool_ativo_item_orcamento").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha: "+data);
			else {
				toast.success("Cadastrado com sucesso!");
				$("#quantidade_item_orcamento").val("");
				$("#total_item_orcamento").val("");
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
