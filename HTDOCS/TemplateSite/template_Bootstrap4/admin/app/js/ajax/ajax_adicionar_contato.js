
function gravarRegistro(){
	var campoFocus = "";
		 if(validation($("#data_atualizacao_contato").val() == "")) campoFocus = "data_atualizacao_contato";


	else {
		$.ajax({
			url:'app/controllers/cadastro_contatoController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'NOME_EMPRESA_contato': $("#NOME_EMPRESA_contato").val(),
				'NOME_CIDADE_contato': $("#NOME_CIDADE_contato").val(),
				'ESTADO_contato': $("#ESTADO_contato").val(),
				'FONE_contato': $("#FONE_contato").val(),
				'FONE_APP_contato': $("#FONE_APP_contato").val(),
				'EMAIL_contato': $("#EMAIL_contato").val(),
				'sendusername_contato': $("#sendusername_contato").val(),
				'sendpassword_contato': $("#sendpassword_contato").val(),
				'smtpserver_contato': $("#smtpserver_contato").val(),
				'smtpserverport_contato': $("#smtpserverport_contato").val(),
				'MailFrom_contato': $("#MailFrom_contato").val(),
				'MailTo_contato': $("#MailTo_contato").val(),
				'MailCc_contato': $("#MailCc_contato").val(),
				'data_atualizacao_contato': $("#data_atualizacao_contato").val(),
				'bool_ativo_contato': $("#bool_ativo_contato").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha ao Cadastrar!");
			else {
				toast.success("Cadastrado com sucesso!");
				$("#NOME_EMPRESA_contato").val("");
				$("#NOME_CIDADE_contato").val("");
				$("#ESTADO_contato").val("");
				$("#FONE_contato").val("");
				$("#FONE_APP_contato").val("");
				$("#EMAIL_contato").val("");
				$("#sendusername_contato").val("");
				$("#sendpassword_contato").val("");
				$("#smtpserver_contato").val("");
				$("#smtpserverport_contato").val("");
				$("#MailFrom_contato").val("");
				$("#MailTo_contato").val("");
				$("#MailCc_contato").val("");
				$("#data_atualizacao_contato").val("");
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
