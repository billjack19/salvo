
$(document).ready(function(){
	var id_item = "";
	var descricao_item = "";
	var descricao_site_item = "";
	var unidade_medida_item = "";
	var imagem_item = "";
	var grupo_id = "";
	var usuario_id = "";
	var bool_ativo_item = "";

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
		url:'app/controllers/funcoes_itemController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_item_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split("{,}");

		id_item = vetor[0];
		
		descricao_item = vetor[1];
		descricao_site_item = vetor[2];
		unidade_medida_item = vetor[3];
		imagem_item = vetor[4];
		grupo_id = vetor[5];
		usuario_id = vetor[6];
		bool_ativo_item = vetor[7];
		
		$("#descricao_item").val(descricao_item);
		$("#descricao_site_item").val(descricao_site_item);
		$("#unidade_medida_item").val(unidade_medida_item);
		$("#imagem_item").val(imagem_item);
		$("#grupo_id").val(grupo_id);
		$("#usuario_id").val(usuario_id);
		$("#bool_ativo_item").val(bool_ativo_item);
		
		if(grupo_id != 0){
			$.ajax({
				url:'app/controllers/funcoes_grupoController.php',
				type: 'POST',
				dataType: 'text',
				data: { 
					'pequisa_grupo_id': true,
					'id': grupo_id
				}
			}).done( function(data){
				vetor = data.split("{,}");
				combo_grupo(grupo_id, vetor[1]);
				// $("#grupo_id-flexdatalist").val(vetor[1]);
				// $("#grupo_id").val(parseInt(vetor[0]));
			});
			$("#grupo_id").val(grupo_id);
		}

		else combo_grupo_NV();
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
		 if($("#descricao_item").val() == "") campoFocus = "descricao_item";
	else if($("#imagem_item").val() == "") campoFocus = "imagem_item";
	else if($("#usuario_id").val() == "") campoFocus = "usuario_id";
	else if($("#bool_ativo_item").val() == "") campoFocus = "bool_ativo_item";


	else {
		$.ajax({
			url:'app/controllers/atualiza_itemController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_item': $("#editar").val(),
				'descricao_item': $("#descricao_item").val(),
				'descricao_site_item': $("#descricao_site_item").val(),
				'unidade_medida_item': $("#unidade_medida_item").val(),
				'imagem_item': $("#imagem_item").val(),
				'grupo_id': $("#grupo_id").val(),
				'usuario_id': $("#usuario_id").val(),
				'bool_ativo_item': $("#bool_ativo_item").val(),
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