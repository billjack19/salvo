
$(document).ready(function(){
	var id_marca = "";
	var descricao_marca = "";
	var data_atualizacao_marca = "";
	var usuario_id = "";
	var bool_ativo_marca = "";

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
		url:'app/controllers/funcoes_marcaController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_marca_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split("{,}");

		id_marca = vetor[0];
		
		descricao_marca = vetor[1];
		data_atualizacao_marca = vetor[2];
		usuario_id = vetor[3];
		bool_ativo_marca = vetor[4];
		
		$("#descricao_marca").val(descricao_marca);
		$("#data_atualizacao_marca").val(data_atualizacao_marca);
		$("#usuario_id").val(usuario_id);
		$("#bool_ativo_marca").val(bool_ativo_marca);
		
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
		 if($("#descricao_marca").val() == "") campoFocus = "descricao_marca";
	else if($("#data_atualizacao_marca").val() == "") campoFocus = "data_atualizacao_marca";
	else if($("#usuario_id").val() == "") campoFocus = "usuario_id";
	else if($("#bool_ativo_marca").val() == "") campoFocus = "bool_ativo_marca";


	else {
		$.ajax({
			url:'app/controllers/atualiza_marcaController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_marca': $("#editar").val(),
				'descricao_marca': $("#descricao_marca").val(),
				'data_atualizacao_marca': $("#data_atualizacao_marca").val(),
				'usuario_id': $("#usuario_id").val(),
				'bool_ativo_marca': $("#bool_ativo_marca").val(),
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