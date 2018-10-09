
$(document).ready(function(){
	var id_contato = "";
	var NOME_EMPRESA_contato = "";
	var NOME_CIDADE_contato = "";
	var ESTADO_contato = "";
	var FONE_contato = "";
	var FONE_APP_contato = "";
	var EMAIL_contato = "";
	var sendusername_contato = "";
	var sendpassword_contato = "";
	var smtpserver_contato = "";
	var smtpserverport_contato = "";
	var MailFrom_contato = "";
	var MailTo_contato = "";
	var MailCc_contato = "";
	var data_atualizacao_contato = "";
	var bool_ativo_contato = "";

	var vetor = [];
	$.ajax({
		url:'app/controllers/funcoes_contatoController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_contato_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split(",");

		id_contato = vetor[0];
		
		NOME_EMPRESA_contato = vetor[1];
		NOME_CIDADE_contato = vetor[2];
		ESTADO_contato = vetor[3];
		FONE_contato = vetor[4];
		FONE_APP_contato = vetor[5];
		EMAIL_contato = vetor[6];
		sendusername_contato = vetor[7];
		sendpassword_contato = vetor[8];
		smtpserver_contato = vetor[9];
		smtpserverport_contato = vetor[10];
		MailFrom_contato = vetor[11];
		MailTo_contato = vetor[12];
		MailCc_contato = vetor[13];
		data_atualizacao_contato = vetor[14];
		bool_ativo_contato = vetor[15];
		
		$("#NOME_EMPRESA_contato").val(NOME_EMPRESA_contato);
		$("#NOME_CIDADE_contato").val(NOME_CIDADE_contato);
		$("#ESTADO_contato").val(ESTADO_contato);
		$("#FONE_contato").val(FONE_contato);
		$("#FONE_APP_contato").val(FONE_APP_contato);
		$("#EMAIL_contato").val(EMAIL_contato);
		$("#sendusername_contato").val(sendusername_contato);
		$("#sendpassword_contato").val(sendpassword_contato);
		$("#smtpserver_contato").val(smtpserver_contato);
		$("#smtpserverport_contato").val(smtpserverport_contato);
		$("#MailFrom_contato").val(MailFrom_contato);
		$("#MailTo_contato").val(MailTo_contato);
		$("#MailCc_contato").val(MailCc_contato);
		$("#data_atualizacao_contato").val(data_atualizacao_contato);
		$("#bool_ativo_contato").val(bool_ativo_contato);
		
		
	});
});


function atualizarrRegistro(){
	var campoFocus = "";
		 if(validation($("#data_atualizacao_contato").val() == "")) campoFocus = "data_atualizacao_contato";


	else {
		$.ajax({
			url:'app/controllers/atualiza_contatoController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_contato': $("#editar").val(),
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
			if (data != 1 && data != "1") 	toast.danger("Falha ao Atualizar!");
			else 								toast.success("Atualizado com sucesso!");
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
