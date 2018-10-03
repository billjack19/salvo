
$(document).ready(function(){
	var id_supermercado = "";
	var descricao_supermercado = "";
	var data_atualizacao_supermercado = "";
	var usuario_id = "";
	var bool_ativo_supermercado = "";

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
		url:'app/controllers/funcoes_supermercadoController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_supermercado_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split("{,}");

		id_supermercado = vetor[0];
		
		descricao_supermercado = vetor[1];
		data_atualizacao_supermercado = vetor[2];
		usuario_id = vetor[3];
		bool_ativo_supermercado = vetor[4];
		
		$("#descricao_supermercado").val(descricao_supermercado);
		$("#data_atualizacao_supermercado").val(data_atualizacao_supermercado);
		$("#usuario_id").val(usuario_id);
		$("#bool_ativo_supermercado").val(bool_ativo_supermercado);
		
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
		 if($("#descricao_supermercado").val() == "") campoFocus = "descricao_supermercado";
	else if($("#data_atualizacao_supermercado").val() == "") campoFocus = "data_atualizacao_supermercado";
	else if($("#usuario_id").val() == "") campoFocus = "usuario_id";
	else if($("#bool_ativo_supermercado").val() == "") campoFocus = "bool_ativo_supermercado";


	else {
		$.ajax({
			url:'app/controllers/atualiza_supermercadoController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_supermercado': $("#editar").val(),
				'descricao_supermercado': $("#descricao_supermercado").val(),
				'data_atualizacao_supermercado': $("#data_atualizacao_supermercado").val(),
				'usuario_id': $("#usuario_id").val(),
				'bool_ativo_supermercado': $("#bool_ativo_supermercado").val(),
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