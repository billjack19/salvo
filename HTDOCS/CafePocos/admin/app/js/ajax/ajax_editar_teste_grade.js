
$(document).ready(function(){
	var id_teste_grade = "";
	var descricao_teste_grade = "";
	var teste_id = "";
	var data_atualizacao_teste_grade = "";
	var usuario_id = "";
	var bool_ativo_teste_grade = "";

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
		url:'app/controllers/funcoes_teste_gradeController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_teste_grade_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split("{,}");

		id_teste_grade = vetor[0];
		
		descricao_teste_grade = vetor[1];
		teste_id = vetor[2];
		data_atualizacao_teste_grade = vetor[3];
		usuario_id = vetor[4];
		bool_ativo_teste_grade = vetor[5];
		
		$("#descricao_teste_grade").val(descricao_teste_grade);
		$("#teste_id").val(teste_id);
		$("#data_atualizacao_teste_grade").val(data_atualizacao_teste_grade);
		$("#usuario_id").val(usuario_id);
		$("#bool_ativo_teste_grade").val(bool_ativo_teste_grade);
		
		if(teste_id != 0){
			$.ajax({
				url:'app/controllers/funcoes_testeController.php',
				type: 'POST',
				dataType: 'text',
				data: { 
					'pequisa_teste_id': true,
					'id': teste_id
				}
			}).done( function(data){
				vetor = data.split("{,}");
				combo_teste(teste_id, vetor[1]);
				// $("#teste_id-flexdatalist").val(vetor[1]);
				// $("#teste_id").val(parseInt(vetor[0]));
			});
			$("#teste_id").val(teste_id);
		}

		else combo_teste_NV();
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
		 if(validation($("#descricao_teste_grade").val() == "")) campoFocus = "descricao_teste_grade";
	else if(validation($("#teste_id").val() == "")) campoFocus = "teste_id";
	else if(validation($("#data_atualizacao_teste_grade").val() == "")) campoFocus = "data_atualizacao_teste_grade";
	else if(validation($("#usuario_id").val() == "")) campoFocus = "usuario_id";
	else if(validation($("#bool_ativo_teste_grade").val() == "")) campoFocus = "bool_ativo_teste_grade";


	else {
		$.ajax({
			url:'app/controllers/atualiza_teste_gradeController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_teste_grade': $("#editar").val(),
				'descricao_teste_grade': $("#descricao_teste_grade").val(),
				'teste_id': $("#teste_id").val(),
				'data_atualizacao_teste_grade': $("#data_atualizacao_teste_grade").val(),
				'usuario_id': $("#usuario_id").val(),
				'bool_ativo_teste_grade': $("#bool_ativo_teste_grade").val()
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
