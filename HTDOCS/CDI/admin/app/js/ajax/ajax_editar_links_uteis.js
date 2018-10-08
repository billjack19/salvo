
$(document).ready(function(){
	var id_links_uteis = "";
	var descricao_links_uteis = "";
	var link_links_uteis = "";
	var data_atualizacao_links_uteis = "";
	var usuario_id = "";
	var bool_ativo_links_uteis = "";

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
		url:'app/controllers/funcoes_links_uteisController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_links_uteis_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split("{,}");

		id_links_uteis = vetor[0];
		
		descricao_links_uteis = vetor[1];
		link_links_uteis = vetor[2];
		data_atualizacao_links_uteis = vetor[3];
		usuario_id = vetor[4];
		bool_ativo_links_uteis = vetor[5];
		
		$("#descricao_links_uteis").val(descricao_links_uteis);
		$("#link_links_uteis").val(link_links_uteis);
		$("#data_atualizacao_links_uteis").val(data_atualizacao_links_uteis);
		$("#usuario_id").val(usuario_id);
		$("#bool_ativo_links_uteis").val(bool_ativo_links_uteis);
		
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
		 if(validation($("#descricao_links_uteis").val() == "")) campoFocus = "descricao_links_uteis";
	else if(validation($("#link_links_uteis").val() == "")) campoFocus = "link_links_uteis";
	else if(validation($("#data_atualizacao_links_uteis").val() == "")) campoFocus = "data_atualizacao_links_uteis";
	else if(validation($("#usuario_id").val() == "")) campoFocus = "usuario_id";
	else if(validation($("#bool_ativo_links_uteis").val() == "")) campoFocus = "bool_ativo_links_uteis";


	else {
		$.ajax({
			url:'app/controllers/atualiza_links_uteisController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_links_uteis': $("#editar").val(),
				'descricao_links_uteis': $("#descricao_links_uteis").val(),
				'link_links_uteis': $("#link_links_uteis").val(),
				'data_atualizacao_links_uteis': $("#data_atualizacao_links_uteis").val(),
				'usuario_id': $("#usuario_id").val(),
				'bool_ativo_links_uteis': $("#bool_ativo_links_uteis").val()
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
