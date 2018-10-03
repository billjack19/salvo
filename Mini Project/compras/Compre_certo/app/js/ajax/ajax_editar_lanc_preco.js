
$(document).ready(function(){
	var id_lanc_preco = "";
	var supermercado_id = "";
	var item_id = "";
	var marca_id = "";
	var preco_lanc_preco = "";
	var data_atualizacao_lanc_preco = "";
	var usuario_id = "";
	var bool_ativo_lanc_preco = "";

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
		url:'app/controllers/funcoes_lanc_precoController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_lanc_preco_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split("{,}");

		id_lanc_preco = vetor[0];
		
		supermercado_id = vetor[1];
		item_id = vetor[2];
		marca_id = vetor[3];
		preco_lanc_preco = vetor[4];
		data_atualizacao_lanc_preco = vetor[5];
		usuario_id = vetor[6];
		bool_ativo_lanc_preco = vetor[7];
		
		$("#supermercado_id").val(supermercado_id);
		$("#item_id").val(item_id);
		$("#marca_id").val(marca_id);
		$("#preco_lanc_preco").val(preco_lanc_preco);
		$("#data_atualizacao_lanc_preco").val(data_atualizacao_lanc_preco);
		$("#usuario_id").val(usuario_id);
		$("#bool_ativo_lanc_preco").val(bool_ativo_lanc_preco);
		
		if(supermercado_id != 0){
			$.ajax({
				url:'app/controllers/funcoes_supermercadoController.php',
				type: 'POST',
				dataType: 'text',
				data: { 
					'pequisa_supermercado_id': true,
					'id': supermercado_id
				}
			}).done( function(data){
				vetor = data.split("{,}");
				combo_supermercado(supermercado_id, vetor[1]);
				// $("#supermercado_id-flexdatalist").val(vetor[1]);
				// $("#supermercado_id").val(parseInt(vetor[0]));
			});
			$("#supermercado_id").val(supermercado_id);
		}

		else combo_supermercado_NV();
		if(item_id != 0){
			$.ajax({
				url:'app/controllers/funcoes_itemController.php',
				type: 'POST',
				dataType: 'text',
				data: { 
					'pequisa_item_id': true,
					'id': item_id
				}
			}).done( function(data){
				vetor = data.split("{,}");
				combo_item(item_id, vetor[1]);
				// $("#item_id-flexdatalist").val(vetor[1]);
				// $("#item_id").val(parseInt(vetor[0]));
			});
			$("#item_id").val(item_id);
		}

		else combo_item_NV();
		if(marca_id != 0){
			$.ajax({
				url:'app/controllers/funcoes_marcaController.php',
				type: 'POST',
				dataType: 'text',
				data: { 
					'pequisa_marca_id': true,
					'id': marca_id
				}
			}).done( function(data){
				vetor = data.split("{,}");
				combo_marca(marca_id, vetor[1]);
				// $("#marca_id-flexdatalist").val(vetor[1]);
				// $("#marca_id").val(parseInt(vetor[0]));
			});
			$("#marca_id").val(marca_id);
		}

		else combo_marca_NV();
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
		 if($("#supermercado_id").val() == "") campoFocus = "supermercado_id";
	else if($("#item_id").val() == "") campoFocus = "item_id";
	else if($("#preco_lanc_preco").val() == "") campoFocus = "preco_lanc_preco";
	else if($("#data_atualizacao_lanc_preco").val() == "") campoFocus = "data_atualizacao_lanc_preco";
	else if($("#usuario_id").val() == "") campoFocus = "usuario_id";
	else if($("#bool_ativo_lanc_preco").val() == "") campoFocus = "bool_ativo_lanc_preco";


	else {
		$.ajax({
			url:'app/controllers/atualiza_lanc_precoController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_lanc_preco': $("#editar").val(),
				'supermercado_id': $("#supermercado_id").val(),
				'item_id': $("#item_id").val(),
				'marca_id': $("#marca_id").val(),
				'preco_lanc_preco': $("#preco_lanc_preco").val(),
				'data_atualizacao_lanc_preco': $("#data_atualizacao_lanc_preco").val(),
				'usuario_id': $("#usuario_id").val(),
				'bool_ativo_lanc_preco': $("#bool_ativo_lanc_preco").val(),
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