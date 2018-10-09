
$(document).ready(function(){
	var id_site = "";
	var NOME_EMPRESA = "";
	var NOME_CIDADE = "";
	var ESTADO = "";
	var FONE = "";
	var FONE_APP = "";
	var EMAIL = "";
	var sendusername = "";
	var sendpassword = "";
	var smtpserver = "";
	var smtpserverport = "";
	var MailFrom = "";
	var MailTo = "";
	var MailCc = "";
	var bool_ativo_site = "";

	var vetor = [];
	$.ajax({
		url:'app/controllers/funcoesController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'editar': true,
			'id': $("#editar").val()
		}
	}).done( function(data){});

	$.ajax({
		url:'app/controllers/funcoes_siteController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_site_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split("{,}");

		id_site = vetor[0];
		
		NOME_EMPRESA = vetor[1];
		NOME_CIDADE = vetor[2];
		ESTADO = vetor[3];
		FONE = vetor[4];
		FONE_APP = vetor[5];
		EMAIL = vetor[6];
		sendusername = vetor[7];
		sendpassword = vetor[8];
		smtpserver = vetor[9];
		smtpserverport = vetor[10];
		MailFrom = vetor[11];
		MailTo = vetor[12];
		MailCc = vetor[13];
		bool_ativo_site = vetor[14];
		
		$("#NOME_EMPRESA").val(NOME_EMPRESA);
		$("#NOME_CIDADE").val(NOME_CIDADE);
		$("#ESTADO").val(ESTADO);
		$("#FONE").val(FONE);
		$("#FONE_APP").val(FONE_APP);
		$("#EMAIL").val(EMAIL);
		$("#sendusername").val(sendusername);
		$("#sendpassword").val(sendpassword);
		$("#smtpserver").val(smtpserver);
		$("#smtpserverport").val(smtpserverport);
		$("#MailFrom").val(MailFrom);
		$("#MailTo").val(MailTo);
		$("#MailCc").val(MailCc);
		$("#bool_ativo_site").val(bool_ativo_site);
		
	});
});


function atualizarrRegistro(){
	var campoFocus = "";


	if(true) {
		$.ajax({
			url:'app/controllers/atualiza_siteController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_site': $("#editar").val(),
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
			else 								toast.success("Atualizado com sucesso!");
		});
	} 

	if (campoFocus != "") {
		document.getElementById(campoFocus).focus();
		toast.danger('Preencha no mínimo todos os campos obrigatórios!');
	}
}