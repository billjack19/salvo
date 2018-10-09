
function gravarRegistro(){
	var campoFocus = "";
		 if(validation($("#bool_ativo_contato").val() == "")) campoFocus = "bool_ativo_contato";


	else {
		$.ajax({
			url:'app/controllers/cadastro_contatoController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'DT_CONTATO': $("#DT_CONTATO").val(),
				'NOME_CONTATO': $("#NOME_CONTATO").val(),
				'EMAIL_CONTATO': $("#EMAIL_CONTATO").val(),
				'TELEFONE_CONTATO': $("#TELEFONE_CONTATO").val(),
				'ASSUNTO_CONTATO': $("#ASSUNTO_CONTATO").val(),
				'MENSAGEM_CONTATO': $("#MENSAGEM_CONTATO").val(),
				'ARQUIVO_CONTATO': $("#ARQUIVO_CONTATO").val(),
				'bool_ativo_contato': $("#bool_ativo_contato").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha ao Cadastrar!");
			else {
				toast.success("Cadastrado com sucesso!");
				$("#DT_CONTATO").val("");
				$("#NOME_CONTATO").val("");
				$("#EMAIL_CONTATO").val("");
				$("#TELEFONE_CONTATO").val("");
				$("#ASSUNTO_CONTATO").val("");
				$("#MENSAGEM_CONTATO").val("");
				$("#ARQUIVO_CONTATO").val("");
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
