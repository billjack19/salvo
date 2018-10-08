
$(document).ready(function(){
	var id_relatorios = "";
	var tabela_relatorios = "";
	var colunas_relatorios = "";
	var data_atualizacao_relatorios = "";
	var usuario_id = "";
	var bool_ativo_relatorios = "";

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
		url:'app/controllers/funcoes_relatoriosController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_relatorios_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split("{,}");

		id_relatorios = vetor[0];
		
		tabela_relatorios = vetor[1];
		colunas_relatorios = vetor[2];
		data_atualizacao_relatorios = vetor[3];
		usuario_id = vetor[4];
		bool_ativo_relatorios = vetor[5];
		
		$("#tabela_relatorios").val(tabela_relatorios);
		$("#colunas_relatorios").val(colunas_relatorios);
		$("#data_atualizacao_relatorios").val(data_atualizacao_relatorios);
		$("#usuario_id").val(usuario_id);
		$("#bool_ativo_relatorios").val(bool_ativo_relatorios);
		
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
		 if(validation($("#tabela_relatorios").val() == "")) campoFocus = "tabela_relatorios";
	else if(validation($("#colunas_relatorios").val() == "")) campoFocus = "colunas_relatorios";
	else if(validation($("#data_atualizacao_relatorios").val() == "")) campoFocus = "data_atualizacao_relatorios";
	else if(validation($("#usuario_id").val() == "")) campoFocus = "usuario_id";
	else if(validation($("#bool_ativo_relatorios").val() == "")) campoFocus = "bool_ativo_relatorios";


	else {
		$.ajax({
			url:'app/controllers/atualiza_relatoriosController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_relatorios': $("#editar").val(),
				'tabela_relatorios': $("#tabela_relatorios").val(),
				'colunas_relatorios': $("#colunas_relatorios").val(),
				'data_atualizacao_relatorios': $("#data_atualizacao_relatorios").val(),
				'usuario_id': $("#usuario_id").val(),
				'bool_ativo_relatorios': $("#bool_ativo_relatorios").val()
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
