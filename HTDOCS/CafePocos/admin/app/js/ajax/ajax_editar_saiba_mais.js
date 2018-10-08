
$(document).ready(function(){
	var id_saiba_mais = "";
	var descricao_saiba_mais = "";
	var usuario_id = "";
	var data_atualizacao_saiba_mais = "";
	var bool_ativo_saiba_mais = "";

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
		url:'app/controllers/funcoes_saiba_maisController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_saiba_mais_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split("{,}");

		id_saiba_mais = vetor[0];
		
		descricao_saiba_mais = vetor[1];
		usuario_id = vetor[2];
		data_atualizacao_saiba_mais = vetor[3];
		bool_ativo_saiba_mais = vetor[4];
		
		$("#descricao_saiba_mais").val(descricao_saiba_mais);
		$("#usuario_id").val(usuario_id);
		$("#data_atualizacao_saiba_mais").val(data_atualizacao_saiba_mais);
		$("#bool_ativo_saiba_mais").val(bool_ativo_saiba_mais);
		
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
		 if(validation($("#descricao_saiba_mais").val() == "")) campoFocus = "descricao_saiba_mais";
	else if(validation($("#usuario_id").val() == "")) campoFocus = "usuario_id";
	else if(validation($("#data_atualizacao_saiba_mais").val() == "")) campoFocus = "data_atualizacao_saiba_mais";
	else if(validation($("#bool_ativo_saiba_mais").val() == "")) campoFocus = "bool_ativo_saiba_mais";


	else {
		$.ajax({
			url:'app/controllers/atualiza_saiba_maisController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_saiba_mais': $("#editar").val(),
				'descricao_saiba_mais': $("#descricao_saiba_mais").val(),
				'usuario_id': $("#usuario_id").val(),
				'data_atualizacao_saiba_mais': $("#data_atualizacao_saiba_mais").val(),
				'bool_ativo_saiba_mais': $("#bool_ativo_saiba_mais").val()
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
