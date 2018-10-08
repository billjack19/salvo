
$(document).ready(function(){
	var id_topicos_loja = "";
	var titulo_topicos_loja = "";
	var descricao_topicos_loja = "";
	var loja_id = "";
	var data_atualizacao_topicos_loja = "";
	var bool_ativo_topicos_loja = "";

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
		url:'app/controllers/funcoes_topicos_lojaController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_topicos_loja_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split("{,}");

		id_topicos_loja = vetor[0];
		
		titulo_topicos_loja = vetor[1];
		descricao_topicos_loja = vetor[2];
		loja_id = vetor[3];
		data_atualizacao_topicos_loja = vetor[4];
		bool_ativo_topicos_loja = vetor[5];
		
		$("#titulo_topicos_loja").val(titulo_topicos_loja);
		$("#descricao_topicos_loja").val(descricao_topicos_loja);
		$("#loja_id").val(loja_id);
		$("#data_atualizacao_topicos_loja").val(data_atualizacao_topicos_loja);
		$("#bool_ativo_topicos_loja").val(bool_ativo_topicos_loja);
		
		if(loja_id != 0){
			$.ajax({
				url:'app/controllers/funcoes_lojaController.php',
				type: 'POST',
				dataType: 'text',
				data: { 
					'pequisa_loja_id': true,
					'id': loja_id
				}
			}).done( function(data){
				vetor = data.split("{,}");
				combo_loja(loja_id, vetor[1]);
				// $("#loja_id-flexdatalist").val(vetor[1]);
				// $("#loja_id").val(parseInt(vetor[0]));
			});
			$("#loja_id").val(loja_id);
		}

		else combo_loja_NV();
	});
});


function atualizarrRegistro(){
	var campoFocus = "";
		 if(validation($("#titulo_topicos_loja").val() == "")) campoFocus = "titulo_topicos_loja";
	else if(validation($("#descricao_topicos_loja").val() == "")) campoFocus = "descricao_topicos_loja";
	else if(validation($("#loja_id").val() == "")) campoFocus = "loja_id";
	else if(validation($("#data_atualizacao_topicos_loja").val() == "")) campoFocus = "data_atualizacao_topicos_loja";
	else if(validation($("#bool_ativo_topicos_loja").val() == "")) campoFocus = "bool_ativo_topicos_loja";


	else {
		$.ajax({
			url:'app/controllers/atualiza_topicos_lojaController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_topicos_loja': $("#editar").val(),
				'titulo_topicos_loja': $("#titulo_topicos_loja").val(),
				'descricao_topicos_loja': $("#descricao_topicos_loja").val(),
				'loja_id': $("#loja_id").val(),
				'data_atualizacao_topicos_loja': $("#data_atualizacao_topicos_loja").val(),
				'bool_ativo_topicos_loja': $("#bool_ativo_topicos_loja").val()
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

function validation(valor){
	if (valor == "") 	return false;
	else 				return true;
}
