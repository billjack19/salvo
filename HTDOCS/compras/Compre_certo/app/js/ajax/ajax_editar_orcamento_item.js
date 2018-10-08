
$(document).ready(function(){
	var id_orcamento_item = "";
	var supermercado_id = "";
	var item_id = "";
	var marca_id = "";
	var quantidade_orcamento_item = "";
	var preco_orcamento_item = "";
	var total_orcamento_item = "";
	var orcamento_id = "";
	var data_atualizacao_orcamento_item = "";
	var usuario_id = "";
	var bool_ativo_orcamento_item = "";

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
		url:'app/controllers/funcoes_orcamento_itemController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_orcamento_item_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split("{,}");

		id_orcamento_item = vetor[0];
		
		supermercado_id = vetor[1];
		item_id = vetor[2];
		marca_id = vetor[3];
		quantidade_orcamento_item = vetor[4];
		preco_orcamento_item = vetor[5];
		total_orcamento_item = vetor[6];
		orcamento_id = vetor[7];
		data_atualizacao_orcamento_item = vetor[8];
		usuario_id = vetor[9];
		bool_ativo_orcamento_item = vetor[10];
		
		$("#supermercado_id").val(supermercado_id);
		$("#item_id").val(item_id);
		$("#marca_id").val(marca_id);
		$("#quantidade_orcamento_item").val(quantidade_orcamento_item);
		$("#preco_orcamento_item").val(preco_orcamento_item);
		$("#total_orcamento_item").val(total_orcamento_item);
		$("#orcamento_id").val(orcamento_id);
		$("#data_atualizacao_orcamento_item").val(data_atualizacao_orcamento_item);
		$("#usuario_id").val(usuario_id);
		$("#bool_ativo_orcamento_item").val(bool_ativo_orcamento_item);
		
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
		if(orcamento_id != 0){
			$.ajax({
				url:'app/controllers/funcoes_orcamentoController.php',
				type: 'POST',
				dataType: 'text',
				data: { 
					'pequisa_orcamento_id': true,
					'id': orcamento_id
				}
			}).done( function(data){
				vetor = data.split("{,}");
				combo_orcamento(orcamento_id, vetor[1]);
				// $("#orcamento_id-flexdatalist").val(vetor[1]);
				// $("#orcamento_id").val(parseInt(vetor[0]));
			});
			$("#orcamento_id").val(orcamento_id);
		}

		else combo_orcamento_NV();
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
	else if($("#quantidade_orcamento_item").val() == "") campoFocus = "quantidade_orcamento_item";
	else if($("#preco_orcamento_item").val() == "") campoFocus = "preco_orcamento_item";
	else if($("#total_orcamento_item").val() == "") campoFocus = "total_orcamento_item";
	else if($("#data_atualizacao_orcamento_item").val() == "") campoFocus = "data_atualizacao_orcamento_item";
	else if($("#usuario_id").val() == "") campoFocus = "usuario_id";
	else if($("#bool_ativo_orcamento_item").val() == "") campoFocus = "bool_ativo_orcamento_item";


	else {
		$.ajax({
			url:'app/controllers/atualiza_orcamento_itemController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_orcamento_item': $("#editar").val(),
				'supermercado_id': $("#supermercado_id").val(),
				'item_id': $("#item_id").val(),
				'marca_id': $("#marca_id").val(),
				'quantidade_orcamento_item': $("#quantidade_orcamento_item").val(),
				'preco_orcamento_item': $("#preco_orcamento_item").val(),
				'total_orcamento_item': $("#total_orcamento_item").val(),
				'orcamento_id': $("#orcamento_id").val(),
				'data_atualizacao_orcamento_item': $("#data_atualizacao_orcamento_item").val(),
				'usuario_id': $("#usuario_id").val(),
				'bool_ativo_orcamento_item': $("#bool_ativo_orcamento_item").val(),
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