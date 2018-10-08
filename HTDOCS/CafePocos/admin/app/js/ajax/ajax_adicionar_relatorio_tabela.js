
function gravarRegistro(){
	var campoFocus = "";
		 if(validation($("#descricao_relatorio_tabela").val() == "")) campoFocus = "descricao_relatorio_tabela";
	else if(validation($("#data_atualizacao_relatorio_tabela").val() == "")) campoFocus = "data_atualizacao_relatorio_tabela";
	else if(validation($("#bool_ativo_relatorio_tabela").val() == "")) campoFocus = "bool_ativo_relatorio_tabela";


	else {
		$.ajax({
			url:'app/controllers/cadastro_relatorio_tabelaController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'descricao_relatorio_tabela': $("#descricao_relatorio_tabela").val(),
				'data_atualizacao_relatorio_tabela': $("#data_atualizacao_relatorio_tabela").val(),
				'bool_ativo_relatorio_tabela': $("#bool_ativo_relatorio_tabela").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha ao Cadastrar!");
			else {
				toast.success("Cadastrado com sucesso!");
				$("#descricao_relatorio_tabela").val("");
				$("#data_atualizacao_relatorio_tabela").val("");
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
