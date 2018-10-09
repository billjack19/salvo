
function gravarRegistro(){
	var campoFocus = "";
		 if(validation($("#titulo_topicos_loja").val() == "")) campoFocus = "titulo_topicos_loja";
	else if(validation($("#descricao_topicos_loja").val() == "")) campoFocus = "descricao_topicos_loja";
	else if(validation($("#loja_id").val() == "")) campoFocus = "loja_id";
	else if(validation($("#data_atualizacao_topicos_loja").val() == "")) campoFocus = "data_atualizacao_topicos_loja";
	else if(validation($("#bool_ativo_topicos_loja").val() == "")) campoFocus = "bool_ativo_topicos_loja";


	else {
		$.ajax({
			url:'app/controllers/cadastro_topicos_lojaController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'titulo_topicos_loja': $("#titulo_topicos_loja").val(),
				'descricao_topicos_loja': $("#descricao_topicos_loja").val(),
				'loja_id': $("#loja_id").val(),
				'data_atualizacao_topicos_loja': $("#data_atualizacao_topicos_loja").val(),
				'bool_ativo_topicos_loja': $("#bool_ativo_topicos_loja").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha ao Cadastrar!");
			else {
				toast.success("Cadastrado com sucesso!");
				$("#titulo_topicos_loja").val("");
				$("#descricao_topicos_loja").val("");
				$("#data_atualizacao_topicos_loja").val("");
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
