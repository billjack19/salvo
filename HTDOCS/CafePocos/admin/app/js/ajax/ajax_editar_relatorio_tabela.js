
$(document).ready(function(){
	var id_relatorio_tabela = "";
	var descricao_relatorio_tabela = "";
	var data_atualizacao_relatorio_tabela = "";
	var bool_ativo_relatorio_tabela = "";

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
		url:'app/controllers/funcoes_relatorio_tabelaController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_relatorio_tabela_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split("{,}");

		id_relatorio_tabela = vetor[0];
		
		descricao_relatorio_tabela = vetor[1];
		data_atualizacao_relatorio_tabela = vetor[2];
		bool_ativo_relatorio_tabela = vetor[3];
		
		$("#descricao_relatorio_tabela").val(descricao_relatorio_tabela);
		$("#data_atualizacao_relatorio_tabela").val(data_atualizacao_relatorio_tabela);
		$("#bool_ativo_relatorio_tabela").val(bool_ativo_relatorio_tabela);
		
		
	});
});


function atualizarrRegistro(){
	var campoFocus = "";
		 if(validation($("#descricao_relatorio_tabela").val() == "")) campoFocus = "descricao_relatorio_tabela";
	else if(validation($("#data_atualizacao_relatorio_tabela").val() == "")) campoFocus = "data_atualizacao_relatorio_tabela";
	else if(validation($("#bool_ativo_relatorio_tabela").val() == "")) campoFocus = "bool_ativo_relatorio_tabela";


	else {
		$.ajax({
			url:'app/controllers/atualiza_relatorio_tabelaController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_relatorio_tabela': $("#editar").val(),
				'descricao_relatorio_tabela': $("#descricao_relatorio_tabela").val(),
				'data_atualizacao_relatorio_tabela': $("#data_atualizacao_relatorio_tabela").val(),
				'bool_ativo_relatorio_tabela': $("#bool_ativo_relatorio_tabela").val()
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
