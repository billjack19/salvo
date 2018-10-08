
function gravarRegistro(){
	var campoFocus = "";
		 if(validation($("#nome_contato").val() == "")) campoFocus = "nome_contato";
	else if(validation($("#usuario_id").val() == "")) campoFocus = "usuario_id";
	else if(validation($("#data_atualizacao_contato").val() == "")) campoFocus = "data_atualizacao_contato";
	else if(validation($("#bool_ativo_contato").val() == "")) campoFocus = "bool_ativo_contato";


	else {
		$.ajax({
			url:'app/controllers/cadastro_contatoController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'nome_contato': $("#nome_contato").val(),
				'email_contato': $("#email_contato").val(),
				'telefone_contato': $("#telefone_contato").val(),
				'assunto_contato': $("#assunto_contato").val(),
				'mensagem_contato': $("#mensagem_contato").val(),
				'usuario_id': $("#usuario_id").val(),
				'data_atualizacao_contato': $("#data_atualizacao_contato").val(),
				'bool_ativo_contato': $("#bool_ativo_contato").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha ao Cadastrar!");
			else {
				toast.success("Cadastrado com sucesso!");
				$("#nome_contato").val("");
				$("#email_contato").val("");
				$("#telefone_contato").val("");
				$("#assunto_contato").val("");
				$("#mensagem_contato").val("");
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
