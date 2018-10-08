
function gravarRegistro(){
	var campoFocus = "";


	if(true) {
		$.ajax({
			url:'app/controllers/cadastro_siteController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'NOME_EMPRESA': $("#NOME_EMPRESA").val(),
				'NOME_CIDADE': $("#NOME_CIDADE").val(),
				'ESTADO': $("#ESTADO").val(),
				'FONE': $("#FONE").val(),
				'FONE_APP': $("#FONE_APP").val(),
				'EMAIL': $("#EMAIL").val(),
				'sendusername': $("#sendusername").val(),
				'sendpassword': $("#sendpassword").val(),
				'smtpserver': $("#smtpserver").val(),
				'smtpserverport': $("#smtpserverport").val(),
				'MailFrom': $("#MailFrom").val(),
				'MailTo': $("#MailTo").val(),
				'MailCc': $("#MailCc").val(),
				'bool_ativo_site': $("#bool_ativo_site").val(),
				'areaDeAtuacao': $("#areaDeAtuacao").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha: "+data);
			else {
				toast.success("Cadastrado com sucesso!");
				$("#NOME_EMPRESA").val("");
				$("#NOME_CIDADE").val("");
				$("#ESTADO").val("");
				$("#FONE").val("");
				$("#FONE_APP").val("");
				$("#EMAIL").val("");
				$("#sendusername").val("");
				$("#sendpassword").val("");
				$("#smtpserver").val("");
				$("#smtpserverport").val("");
				$("#MailFrom").val("");
				$("#MailTo").val("");
				$("#MailCc").val("");
			}
		});
	} 

	if (campoFocus != "") {
		document.getElementById(campoFocus).focus();
		toast.danger('Preencha no mínimo todos os campos obrigatórios!');
	}
}