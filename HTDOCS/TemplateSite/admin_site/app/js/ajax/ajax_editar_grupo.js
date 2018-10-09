
$(document).ready(function(){
	var id_grupo = "";
	var descricao_grupo = "";
	var data_atualizacao_grupo = "";
	var usuario_id = "";
	var bool_ativo_grupo = "";

	var vetor = [];
	$.ajax({
		url:'app/controllers/funcoes_grupoController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_grupo_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split(",");

		id_grupo = vetor[0];
		
		descricao_grupo = vetor[1];
		data_atualizacao_grupo = vetor[2];
		usuario_id = vetor[3];
		bool_ativo_grupo = vetor[4];
		
		$("#descricao_grupo").val(descricao_grupo);
		$("#data_atualizacao_grupo").val(data_atualizacao_grupo);
		$("#usuario_id").val(usuario_id);
		$("#bool_ativo_grupo").val(bool_ativo_grupo);
		
		$.ajax({
			url:'app/controllers/funcoes_usuarioController.php',
			type: 'POST',
			dataType: 'text',
			data: { 
				'pequisa_usuario_id': true,
				'id': usuario_id
			}
		}).done( function(data){
			vetor = data.split(",");
			$("#usuario_id-flexdatalist").val(vetor[1]);
			$("#usuario_id").val(parseInt(vetor[0]));
		});

		$("#usuario_id").val(usuario_id);
		
	});
});


function atualizarrRegistro(){
	var campoFocus = "";
		 if(validation($("#descricao_grupo").val() == "")) campoFocus = "descricao_grupo";
	else if(validation($("#data_atualizacao_grupo").val() == "")) campoFocus = "data_atualizacao_grupo";
	else if(validation($("#bool_ativo_grupo").val() == "")) campoFocus = "bool_ativo_grupo";


	else {
		$.ajax({
			url:'app/controllers/atualiza_grupoController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_grupo': $("#editar").val(),
				'descricao_grupo': $("#descricao_grupo").val(),
				'data_atualizacao_grupo': $("#data_atualizacao_grupo").val(),
				'usuario_id': $("#usuario_id").val(),
				'bool_ativo_grupo': $("#bool_ativo_grupo").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha ao Atualizar!");
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
