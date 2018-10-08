
$(document).ready(function(){
	var id_quem_somos = "";
	var titulo_quem_somos = "";
	var descricao_quem_somos = "";
	var imagem_quem_somos = "";
	var data_atualizacao_quem_somos = "";
	var bool_ativo_quem_somos = "";

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
		url:'app/controllers/funcoes_quem_somosController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_quem_somos_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split("{,}");

		id_quem_somos = vetor[0];
		
		titulo_quem_somos = vetor[1];
		descricao_quem_somos = vetor[2];
		imagem_quem_somos = vetor[3];
		data_atualizacao_quem_somos = vetor[4];
		bool_ativo_quem_somos = vetor[5];
		
		$("#titulo_quem_somos").val(titulo_quem_somos);
		$("#descricao_quem_somos").val(descricao_quem_somos);
		$("#imagem_quem_somos").val(imagem_quem_somos);
		$("#data_atualizacao_quem_somos").val(data_atualizacao_quem_somos);
		$("#bool_ativo_quem_somos").val(bool_ativo_quem_somos);
		
	});
});


function atualizarrRegistro(){
	var campoFocus = "";
		 if(validation($("#titulo_quem_somos").val() == "")) campoFocus = "titulo_quem_somos";
	else if(validation($("#descricao_quem_somos").val() == "")) campoFocus = "descricao_quem_somos";
	else if(validation($("#imagem_quem_somos").val() == "")) campoFocus = "imagem_quem_somos";
	else if(validation($("#data_atualizacao_quem_somos").val() == "")) campoFocus = "data_atualizacao_quem_somos";
	else if(validation($("#bool_ativo_quem_somos").val() == "")) campoFocus = "bool_ativo_quem_somos";


	else {
		$.ajax({
			url:'app/controllers/atualiza_quem_somosController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_quem_somos': $("#editar").val(),
				'titulo_quem_somos': $("#titulo_quem_somos").val(),
				'descricao_quem_somos': $("#descricao_quem_somos").val(),
				'imagem_quem_somos': $("#imagem_quem_somos").val(),
				'data_atualizacao_quem_somos': $("#data_atualizacao_quem_somos").val(),
				'bool_ativo_quem_somos': $("#bool_ativo_quem_somos").val()
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
