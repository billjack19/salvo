
$(document).ready(function(){
	var id_orcamento = "";
	var descricao_orcamento = "";
	var cliente_site_id = "";
	var data_lanc_orcamento = "";
	var bool_ativo_orcamento = "";

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
		url:'app/controllers/funcoes_orcamentoController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_orcamento_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split("{,}");

		id_orcamento = vetor[0];
		
		descricao_orcamento = vetor[1];
		cliente_site_id = vetor[2];
		data_lanc_orcamento = vetor[3];
		bool_ativo_orcamento = vetor[4];
		
		$("#descricao_orcamento").val(descricao_orcamento);
		$("#cliente_site_id").val(cliente_site_id);
		$("#data_lanc_orcamento").val(data_lanc_orcamento);
		$("#bool_ativo_orcamento").val(bool_ativo_orcamento);
		
		if(cliente_site_id != 0){
			$.ajax({
				url:'app/controllers/funcoes_cliente_siteController.php',
				type: 'POST',
				dataType: 'text',
				data: { 
					'pequisa_cliente_site_id': true,
					'id': cliente_site_id
				}
			}).done( function(data){
				vetor = data.split("{,}");
				combo_cliente_site(cliente_site_id, vetor[1]);
				// $("#cliente_site_id-flexdatalist").val(vetor[1]);
				// $("#cliente_site_id").val(parseInt(vetor[0]));
			});
			$("#cliente_site_id").val(cliente_site_id);
		}

		else combo_cliente_site_NV();
	});
});


function atualizarrRegistro(){
	var campoFocus = "";
		 if($("#descricao_orcamento").val() == "") campoFocus = "descricao_orcamento";
	else if($("#cliente_site_id").val() == "") campoFocus = "cliente_site_id";
	else if($("#bool_ativo_orcamento").val() == "") campoFocus = "bool_ativo_orcamento";


	else {
		$.ajax({
			url:'app/controllers/atualiza_orcamentoController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_orcamento': $("#editar").val(),
				'descricao_orcamento': $("#descricao_orcamento").val(),
				'cliente_site_id': $("#cliente_site_id").val(),
				'data_lanc_orcamento': $("#data_lanc_orcamento").val(),
				'bool_ativo_orcamento': $("#bool_ativo_orcamento").val(),
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