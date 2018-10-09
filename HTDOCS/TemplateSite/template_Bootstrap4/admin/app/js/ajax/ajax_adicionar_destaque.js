
function gravarRegistro(){
	var campoFocus = "";
		 if(validation($("#descricao_destaque").val() == "")) campoFocus = "descricao_destaque";
	else if(validation($("#grupo_id").val() == "")) campoFocus = "grupo_id";
	else if(validation($("#imagem_destaque").val() == "")) campoFocus = "imagem_destaque";
	else if(validation($("#data_atualizacao_destaque").val() == "")) campoFocus = "data_atualizacao_destaque";
	else if(validation($("#bool_ativo_destaque").val() == "")) campoFocus = "bool_ativo_destaque";


	else {
		$.ajax({
			url:'app/controllers/cadastro_destaqueController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'descricao_destaque': $("#descricao_destaque").val(),
				'grupo_id': $("#grupo_id").val(),
				'imagem_destaque': $("#imagem_destaque").val(),
				'data_atualizacao_destaque': $("#data_atualizacao_destaque").val(),
				'bool_ativo_destaque': $("#bool_ativo_destaque").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha ao Cadastrar!");
			else {
				toast.success("Cadastrado com sucesso!");
				$("#descricao_destaque").val("");
				$("#imagem_destaque").val("");
				$("#data_atualizacao_destaque").val("");
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
