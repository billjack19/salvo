
$(document).ready(function(){
	var id_contato = "";
	var nome_contato = "";
	var email_contato = "";
	var telefone_contato = "";
	var assunto_contato = "";
	var mensagem_contato = "";
	var usuario_id = "";
	var data_atualizacao_contato = "";
	var bool_ativo_contato = "";

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
		url:'app/controllers/funcoes_contatoController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_contato_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split("{,}");

		id_contato = vetor[0];
		
		nome_contato = vetor[1];
		email_contato = vetor[2];
		telefone_contato = vetor[3];
		assunto_contato = vetor[4];
		mensagem_contato = vetor[5];
		usuario_id = vetor[6];
		data_atualizacao_contato = vetor[7];
		bool_ativo_contato = vetor[8];
		
		$("#nome_contato").val(nome_contato);
		$("#email_contato").val(email_contato);
		$("#telefone_contato").val(telefone_contato);
		$("#assunto_contato").val(assunto_contato);
		$("#mensagem_contato").val(mensagem_contato);
		$("#usuario_id").val(usuario_id);
		$("#data_atualizacao_contato").val(data_atualizacao_contato);
		$("#bool_ativo_contato").val(bool_ativo_contato);
		
		if(usuario_id != 0){
			$.ajax({
				url:'app/controllers/funcoes_usuarioController.php',
				type: 'POST',
				dataType: 'text',
				data: { 
					'pequisa_usuario_id': true,
					'id': usuario_id
				}
			}).done( function(data){
				vetor = data.split("{,}");
				combo_usuario(usuario_id, vetor[1]);
				// $("#usuario_id-flexdatalist").val(vetor[1]);
				// $("#usuario_id").val(parseInt(vetor[0]));
			});
			$("#usuario_id").val(usuario_id);
		}

		else combo_usuario_NV();
	});
});


function atualizarrRegistro(){
	var campoFocus = "";
		 if(validation($("#nome_contato").val() == "")) campoFocus = "nome_contato";
	else if(validation($("#usuario_id").val() == "")) campoFocus = "usuario_id";
	else if(validation($("#data_atualizacao_contato").val() == "")) campoFocus = "data_atualizacao_contato";
	else if(validation($("#bool_ativo_contato").val() == "")) campoFocus = "bool_ativo_contato";


	else {
		$.ajax({
			url:'app/controllers/atualiza_contatoController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_contato': $("#editar").val(),
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
			if (data != 1 && data != "1") 	toast.danger("Falha: "+data);
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
