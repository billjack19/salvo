
function gravarRegistro(){
	var campoFocus = "";
		 if(validation($("#descricao_saiba_mais").val() == "")) campoFocus = "descricao_saiba_mais";
	else if(validation($("#usuario_id").val() == "")) campoFocus = "usuario_id";
	else if(validation($("#data_atualizacao_saiba_mais").val() == "")) campoFocus = "data_atualizacao_saiba_mais";
	else if(validation($("#bool_ativo_saiba_mais").val() == "")) campoFocus = "bool_ativo_saiba_mais";


	else {
		$.ajax({
			url:'app/controllers/cadastro_saiba_maisController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'descricao_saiba_mais': $("#descricao_saiba_mais").val(),
				'usuario_id': $("#usuario_id").val(),
				'data_atualizacao_saiba_mais': $("#data_atualizacao_saiba_mais").val(),
				'bool_ativo_saiba_mais': $("#bool_ativo_saiba_mais").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha ao Cadastrar!");
			else {
				toast.success("Cadastrado com sucesso!");
				$("#descricao_saiba_mais").val("");
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
