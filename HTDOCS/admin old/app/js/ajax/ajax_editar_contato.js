
$(document).ready(function(){
	var id_contato = "";
	var DT_CONTATO = "";
	var NOME_CONTATO = "";
	var EMAIL_CONTATO = "";
	var TELEFONE_CONTATO = "";
	var ASSUNTO_CONTATO = "";
	var MENSAGEM_CONTATO = "";
	var ARQUIVO_CONTATO = "";
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
		
		DT_CONTATO = vetor[1];
		NOME_CONTATO = vetor[2];
		EMAIL_CONTATO = vetor[3];
		TELEFONE_CONTATO = vetor[4];
		ASSUNTO_CONTATO = vetor[5];
		MENSAGEM_CONTATO = vetor[6];
		ARQUIVO_CONTATO = vetor[7];
		bool_ativo_contato = vetor[8];
		
		$("#DT_CONTATO").val(DT_CONTATO);
		$("#NOME_CONTATO").val(NOME_CONTATO);
		$("#EMAIL_CONTATO").val(EMAIL_CONTATO);
		$("#TELEFONE_CONTATO").val(TELEFONE_CONTATO);
		$("#ASSUNTO_CONTATO").val(ASSUNTO_CONTATO);
		$("#MENSAGEM_CONTATO").val(MENSAGEM_CONTATO);
		$("#ARQUIVO_CONTATO").val(ARQUIVO_CONTATO);
		$("#bool_ativo_contato").val(bool_ativo_contato);
		
		
	});
});


function atualizarrRegistro(){
	var campoFocus = "";
		 if(validation($("#bool_ativo_contato").val() == "")) campoFocus = "bool_ativo_contato";


	else {
		$.ajax({
			url:'app/controllers/atualiza_contatoController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_contato': $("#editar").val(),
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
