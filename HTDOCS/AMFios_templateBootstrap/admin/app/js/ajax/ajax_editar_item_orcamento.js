
$(document).ready(function(){
	var id_item_orcamento = "";
	var data_lanc_item_orcamento = "";
	var orcamento_id = "";
	var item_id = "";
	var quantidade_item_orcamento = "";
	var total_item_orcamento = "";
	var bool_ativo_item_orcamento = "";

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
		url:'app/controllers/funcoes_item_orcamentoController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_item_orcamento_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split("{,}");

		id_item_orcamento = vetor[0];
		
		data_lanc_item_orcamento = vetor[1];
		orcamento_id = vetor[2];
		item_id = vetor[3];
		quantidade_item_orcamento = vetor[4];
		total_item_orcamento = vetor[5];
		bool_ativo_item_orcamento = vetor[6];
		
		$("#data_lanc_item_orcamento").val(data_lanc_item_orcamento);
		$("#orcamento_id").val(orcamento_id);
		$("#item_id").val(item_id);
		$("#quantidade_item_orcamento").val(quantidade_item_orcamento);
		$("#total_item_orcamento").val(total_item_orcamento);
		$("#bool_ativo_item_orcamento").val(bool_ativo_item_orcamento);
		
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
	});
});


function atualizarrRegistro(){
	var campoFocus = "";
		 if($("#data_lanc_item_orcamento").val() == "") campoFocus = "data_lanc_item_orcamento";
	else if($("#orcamento_id").val() == "") campoFocus = "orcamento_id";
	else if($("#item_id").val() == "") campoFocus = "item_id";
	else if($("#quantidade_item_orcamento").val() == "") campoFocus = "quantidade_item_orcamento";
	else if($("#total_item_orcamento").val() == "") campoFocus = "total_item_orcamento";


	else {
		$.ajax({
			url:'app/controllers/atualiza_item_orcamentoController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_item_orcamento': $("#editar").val(),
				'data_lanc_item_orcamento': $("#data_lanc_item_orcamento").val(),
				'orcamento_id': $("#orcamento_id").val(),
				'item_id': $("#item_id").val(),
				'quantidade_item_orcamento': $("#quantidade_item_orcamento").val(),
				'total_item_orcamento': $("#total_item_orcamento").val(),
				'bool_ativo_item_orcamento': $("#bool_ativo_item_orcamento").val(),
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