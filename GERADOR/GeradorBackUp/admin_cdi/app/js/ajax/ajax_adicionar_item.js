
function gravarRegistro(){
	var campoFocus = "";
		 if(validation($("#descricao_item").val() == "")) campoFocus = "descricao_item";
	else if(validation($("#imagem_item").val() == "")) campoFocus = "imagem_item";
	else if(validation($("#usuario_id").val() == "")) campoFocus = "usuario_id";
	else if(validation($("#bool_ativo_item").val() == "")) campoFocus = "bool_ativo_item";


	else {
		$.ajax({
			url:'app/controllers/cadastro_itemController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'descricao_item': $("#descricao_item").val(),
				'descricao_site_item': $("#descricao_site_item").val(),
				'unidade_medida_item': $("#unidade_medida_item").val(),
				'imagem_item': $("#imagem_item").val(),
				'grupo_id': $("#grupo_id").val(),
				'usuario_id': $("#usuario_id").val(),
				'bool_ativo_item': $("#bool_ativo_item").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha: "+data);
			else {
				toast.success("Cadastrado com sucesso!");
				$("#descricao_item").val("");
				$("#descricao_site_item").val("");
				$("#unidade_medida_item").val("");
				$("#imagem_item").val("");
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
