
$(document).ready(function(){
	var id_cliente_site = "";
	var nome_cliente_site = "";
	var login_cliente_site = "";
	var telefone_cliente_site = "";
	var celular_cliente_site = "";
	var endereco_cliente_site = "";
	var numero_cliente_site = "";
	var complemento_cliente_site = "";
	var bairro_cliente_site = "";
	var cidade_cliente_site = "";
	var estado_id = "";
	var cep_cliente_site = "";
	var bool_ativo_cliente_site = "";

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
		url:'app/controllers/funcoes_cliente_siteController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_cliente_site_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split("{,}");

		id_cliente_site = vetor[0];
		
		nome_cliente_site = vetor[1];
		login_cliente_site = vetor[2];
		telefone_cliente_site = vetor[4];
		celular_cliente_site = vetor[5];
		endereco_cliente_site = vetor[6];
		numero_cliente_site = vetor[7];
		complemento_cliente_site = vetor[8];
		bairro_cliente_site = vetor[9];
		cidade_cliente_site = vetor[10];
		estado_id = vetor[11];
		cep_cliente_site = vetor[12];
		bool_ativo_cliente_site = vetor[13];
		
		$("#nome_cliente_site").val(nome_cliente_site);
		$("#login_cliente_site").val(login_cliente_site);
		$("#telefone_cliente_site").val(telefone_cliente_site);
		$("#celular_cliente_site").val(celular_cliente_site);
		$("#endereco_cliente_site").val(endereco_cliente_site);
		$("#numero_cliente_site").val(numero_cliente_site);
		$("#complemento_cliente_site").val(complemento_cliente_site);
		$("#bairro_cliente_site").val(bairro_cliente_site);
		$("#cidade_cliente_site").val(cidade_cliente_site);
		$("#estado_id").val(estado_id);
		$("#cep_cliente_site").val(cep_cliente_site);
		$("#bool_ativo_cliente_site").val(bool_ativo_cliente_site);
		
		if(estado_id != 0){
			$.ajax({
				url:'app/controllers/funcoes_estadoController.php',
				type: 'POST',
				dataType: 'text',
				data: { 
					'pequisa_estado_id': true,
					'id': estado_id
				}
			}).done( function(data){
				vetor = data.split("{,}");
				combo_estado(estado_id, vetor[1]);
				// $("#estado_id-flexdatalist").val(vetor[1]);
				// $("#estado_id").val(parseInt(vetor[0]));
			});
			$("#estado_id").val(estado_id);
		}

		else combo_estado_NV();
	});
});


function atualizarrRegistro(){
	var campoFocus = "";
		 if($("#nome_cliente_site").val() == "") campoFocus = "nome_cliente_site";
	else if($("#login_cliente_site").val() == "") campoFocus = "login_cliente_site";
	else if($("#senha_cliente_site").val() == "") campoFocus = "senha_cliente_site";
	else if($("#telefone_cliente_site").val() == "") campoFocus = "telefone_cliente_site";
	else if($("#bool_ativo_cliente_site").val() == "") campoFocus = "bool_ativo_cliente_site";


	else {
		$.ajax({
			url:'app/controllers/atualiza_cliente_siteController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_cliente_site': $("#editar").val(),
				'nome_cliente_site': $("#nome_cliente_site").val(),
				'login_cliente_site': $("#login_cliente_site").val(),
				'telefone_cliente_site': $("#telefone_cliente_site").val(),
				'celular_cliente_site': $("#celular_cliente_site").val(),
				'endereco_cliente_site': $("#endereco_cliente_site").val(),
				'numero_cliente_site': $("#numero_cliente_site").val(),
				'complemento_cliente_site': $("#complemento_cliente_site").val(),
				'bairro_cliente_site': $("#bairro_cliente_site").val(),
				'cidade_cliente_site': $("#cidade_cliente_site").val(),
				'estado_id': $("#estado_id").val(),
				'cep_cliente_site': $("#cep_cliente_site").val(),
				'bool_ativo_cliente_site': $("#bool_ativo_cliente_site").val(),
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