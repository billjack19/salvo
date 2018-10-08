
$(document).ready(function(){
	var id_adicional_site = "";
	var titulo_adicional_site = "";
	var descricao_adicional_site = "";
	var imagem_adicional_site = "";
	var saiba_mais_id = "";
	var usuario_id = "";
	var data_atualizacao_adicional_site = "";
	var bool_ativo_adicional_site = "";

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
		url:'app/controllers/funcoes_adicional_siteController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_adicional_site_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split("{,}");

		id_adicional_site = vetor[0];
		
		titulo_adicional_site = vetor[1];
		descricao_adicional_site = vetor[2];
		imagem_adicional_site = vetor[3];
		saiba_mais_id = vetor[4];
		usuario_id = vetor[5];
		data_atualizacao_adicional_site = vetor[6];
		bool_ativo_adicional_site = vetor[7];
		
		$("#titulo_adicional_site").val(titulo_adicional_site);
		$("#descricao_adicional_site").val(descricao_adicional_site);
		$("#imagem_adicional_site").val(imagem_adicional_site);
		$("#saiba_mais_id").val(saiba_mais_id);
		$("#usuario_id").val(usuario_id);
		$("#data_atualizacao_adicional_site").val(data_atualizacao_adicional_site);
		$("#bool_ativo_adicional_site").val(bool_ativo_adicional_site);
		
		if(saiba_mais_id != 0){
			$.ajax({
				url:'app/controllers/funcoes_saiba_maisController.php',
				type: 'POST',
				dataType: 'text',
				data: { 
					'pequisa_saiba_mais_id': true,
					'id': saiba_mais_id
				}
			}).done( function(data){
				vetor = data.split("{,}");
				combo_saiba_mais(saiba_mais_id, vetor[1]);
				// $("#saiba_mais_id-flexdatalist").val(vetor[1]);
				// $("#saiba_mais_id").val(parseInt(vetor[0]));
			});
			$("#saiba_mais_id").val(saiba_mais_id);
		}

		else combo_saiba_mais_NV();
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
		 if(validation($("#titulo_adicional_site").val() == "")) campoFocus = "titulo_adicional_site";
	else if(validation($("#descricao_adicional_site").val() == "")) campoFocus = "descricao_adicional_site";
	else if(validation($("#imagem_adicional_site").val() == "")) campoFocus = "imagem_adicional_site";
	else if(validation($("#saiba_mais_id").val() == "")) campoFocus = "saiba_mais_id";
	else if(validation($("#usuario_id").val() == "")) campoFocus = "usuario_id";
	else if(validation($("#data_atualizacao_adicional_site").val() == "")) campoFocus = "data_atualizacao_adicional_site";
	else if(validation($("#bool_ativo_adicional_site").val() == "")) campoFocus = "bool_ativo_adicional_site";


	else {
		$.ajax({
			url:'app/controllers/atualiza_adicional_siteController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_adicional_site': $("#editar").val(),
				'titulo_adicional_site': $("#titulo_adicional_site").val(),
				'descricao_adicional_site': $("#descricao_adicional_site").val(),
				'imagem_adicional_site': $("#imagem_adicional_site").val(),
				'saiba_mais_id': $("#saiba_mais_id").val(),
				'usuario_id': $("#usuario_id").val(),
				'data_atualizacao_adicional_site': $("#data_atualizacao_adicional_site").val(),
				'bool_ativo_adicional_site': $("#bool_ativo_adicional_site").val()
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
