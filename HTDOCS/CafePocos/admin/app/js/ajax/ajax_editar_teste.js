
$(document).ready(function(){
	var id_teste = "";
	var descricao_teste = "";
	var data_atualizacao_teste = "";
	var usuario_id = "";
	var bool_ativo_teste = "";

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
		url:'app/controllers/funcoes_testeController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_teste_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split("{,}");

		id_teste = vetor[0];
		
		descricao_teste = vetor[1];
		data_atualizacao_teste = vetor[2];
		usuario_id = vetor[3];
		bool_ativo_teste = vetor[4];
		
		$("#descricao_teste").val(descricao_teste);
		$("#data_atualizacao_teste").val(data_atualizacao_teste);
		$("#usuario_id").val(usuario_id);
		$("#bool_ativo_teste").val(bool_ativo_teste);
		
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
		 if(validation($("#descricao_teste").val() == "")) campoFocus = "descricao_teste";
	else if(validation($("#data_atualizacao_teste").val() == "")) campoFocus = "data_atualizacao_teste";
	else if(validation($("#usuario_id").val() == "")) campoFocus = "usuario_id";
	else if(validation($("#bool_ativo_teste").val() == "")) campoFocus = "bool_ativo_teste";


	else {
		$.ajax({
			url:'app/controllers/atualiza_testeController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_teste': $("#editar").val(),
				'descricao_teste': $("#descricao_teste").val(),
				'data_atualizacao_teste': $("#data_atualizacao_teste").val(),
				'usuario_id': $("#usuario_id").val(),
				'bool_ativo_teste': $("#bool_ativo_teste").val()
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
