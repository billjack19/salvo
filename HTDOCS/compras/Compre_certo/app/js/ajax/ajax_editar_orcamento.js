
$(document).ready(function(){
	var id_orcamento = "";
	var emissao_orcamento = "";
	var descricao_orcamento = "";
	var data_atualizacao_orcamento = "";
	var usuario_id = "";
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
		
		emissao_orcamento = vetor[1];
		descricao_orcamento = vetor[2];
		data_atualizacao_orcamento = vetor[3];
		usuario_id = vetor[4];
		bool_ativo_orcamento = vetor[5];
		
		$("#emissao_orcamento").val(emissao_orcamento);
		$("#descricao_orcamento").val(descricao_orcamento);
		$("#data_atualizacao_orcamento").val(data_atualizacao_orcamento);
		$("#usuario_id").val(usuario_id);
		$("#bool_ativo_orcamento").val(bool_ativo_orcamento);
		
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
		 if($("#data_atualizacao_orcamento").val() == "") campoFocus = "data_atualizacao_orcamento";
	else if($("#usuario_id").val() == "") campoFocus = "usuario_id";
	else if($("#bool_ativo_orcamento").val() == "") campoFocus = "bool_ativo_orcamento";


	else {
		$.ajax({
			url:'app/controllers/atualiza_orcamentoController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_orcamento': $("#editar").val(),
				'emissao_orcamento': $("#emissao_orcamento").val(),
				'descricao_orcamento': $("#descricao_orcamento").val(),
				'data_atualizacao_orcamento': $("#data_atualizacao_orcamento").val(),
				'usuario_id': $("#usuario_id").val(),
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