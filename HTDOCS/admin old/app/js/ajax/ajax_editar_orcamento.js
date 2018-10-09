
$(document).ready(function(){
	var id_orcamento = "";
	var descricao_orcamento = "";
	var cliente_site_id = "";
	var data_lanc_orcamento = "";
	var bool_ativo_orcamento = "";

	var vetor = [];
	$.ajax({
		url:'app/controllers/funcoes_orcamentoController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_orcamento_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split(",");

		id_orcamento = vetor[0];
		
		descricao_orcamento = vetor[1];
		cliente_site_id = vetor[2];
		data_lanc_orcamento = vetor[3];
		bool_ativo_orcamento = vetor[4];
		
		$("#descricao_orcamento").val(descricao_orcamento);
		$("#cliente_site_id").val(cliente_site_id);
		$("#data_lanc_orcamento").val(data_lanc_orcamento);
		$("#bool_ativo_orcamento").val(bool_ativo_orcamento);
		
		$.ajax({
			url:'app/controllers/funcoes_cliente_siteController.php',
			type: 'POST',
			dataType: 'text',
			data: { 
				'pequisa_cliente_site_id': true,
				'id': cliente_site_id
			}
		}).done( function(data){
			vetor = data.split(",");
			$("#cliente_site_id-flexdatalist").val(vetor[1]);
			$("#cliente_site_id").val(parseInt(vetor[0]));
		});

		$("#cliente_site_id").val(cliente_site_id);
		
	});
});


function atualizarrRegistro(){
	var campoFocus = "";
		 if(validation($("#descricao_orcamento").val() == "")) campoFocus = "descricao_orcamento";
	else if(validation($("#cliente_site_id").val() == "")) campoFocus = "cliente_site_id";
	else if(validation($("#bool_ativo_orcamento").val() == "")) campoFocus = "bool_ativo_orcamento";


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
				'bool_ativo_orcamento': $("#bool_ativo_orcamento").val()
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
