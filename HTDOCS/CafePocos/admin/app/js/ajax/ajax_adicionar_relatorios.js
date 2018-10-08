
function gravarRegistro(){
	var campoFocus = "";
		 if(validation($("#tabela_relatorios").val() == "")) campoFocus = "tabela_relatorios";
	else if(validation($("#colunas_relatorios").val() == "")) campoFocus = "colunas_relatorios";
	else if(validation($("#data_atualizacao_relatorios").val() == "")) campoFocus = "data_atualizacao_relatorios";
	else if(validation($("#usuario_id").val() == "")) campoFocus = "usuario_id";
	else if(validation($("#bool_ativo_relatorios").val() == "")) campoFocus = "bool_ativo_relatorios";


	else {
		$.ajax({
			url:'app/controllers/cadastro_relatoriosController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'tabela_relatorios': $("#tabela_relatorios").val(),
				'colunas_relatorios': $("#colunas_relatorios").val(),
				'data_atualizacao_relatorios': $("#data_atualizacao_relatorios").val(),
				'usuario_id': $("#usuario_id").val(),
				'bool_ativo_relatorios': $("#bool_ativo_relatorios").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha ao Cadastrar!");
			else {
				toast.success("Cadastrado com sucesso!");
				$("#tabela_relatorios").val("");
				$("#colunas_relatorios").val("");
				$("#data_atualizacao_relatorios").val("");
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
