
$(document).ready(function(){
	var id_endereco_site = "";
	var descricao_endereco_site = "";
	var endereco_endereco_site = "";
	var numero_endereco_site = "";
	var complemento_endereco_site = "";
	var bairro_endereco_site = "";
	var cidade_endereco_site = "";
	var estado_id = "";
	var cep_endereco_site = "";
	var telefone_endereco_site = "";
	var celular_endereco_site = "";
	var email_endereco_site = "";
	var horario_funcionamento_endereco_site = "";
	var latitude_endereco_site = "";
	var longitude_endereco_site = "";
	var configurar_site_id = "";
	var data_atualizacao_endereco_site = "";
	var bool_ativo_endereco_site = "";

	var vetor = [];
	$.ajax({
		url:'app/controllers/funcoes_endereco_siteController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_endereco_site_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split(",");

		id_endereco_site = vetor[0];
		
		descricao_endereco_site = vetor[1];
		endereco_endereco_site = vetor[2];
		numero_endereco_site = vetor[3];
		complemento_endereco_site = vetor[4];
		bairro_endereco_site = vetor[5];
		cidade_endereco_site = vetor[6];
		estado_id = vetor[7];
		cep_endereco_site = vetor[8];
		telefone_endereco_site = vetor[9];
		celular_endereco_site = vetor[10];
		email_endereco_site = vetor[11];
		horario_funcionamento_endereco_site = vetor[12];
		latitude_endereco_site = vetor[13];
		longitude_endereco_site = vetor[14];
		configurar_site_id = vetor[15];
		data_atualizacao_endereco_site = vetor[16];
		bool_ativo_endereco_site = vetor[17];
		
		$("#descricao_endereco_site").val(descricao_endereco_site);
		$("#endereco_endereco_site").val(endereco_endereco_site);
		$("#numero_endereco_site").val(numero_endereco_site);
		$("#complemento_endereco_site").val(complemento_endereco_site);
		$("#bairro_endereco_site").val(bairro_endereco_site);
		$("#cidade_endereco_site").val(cidade_endereco_site);
		$("#estado_id").val(estado_id);
		$("#cep_endereco_site").val(cep_endereco_site);
		$("#telefone_endereco_site").val(telefone_endereco_site);
		$("#celular_endereco_site").val(celular_endereco_site);
		$("#email_endereco_site").val(email_endereco_site);
		$("#horario_funcionamento_endereco_site").val(horario_funcionamento_endereco_site);
		$("#latitude_endereco_site").val(latitude_endereco_site);
		$("#longitude_endereco_site").val(longitude_endereco_site);
		$("#configurar_site_id").val(configurar_site_id);
		$("#data_atualizacao_endereco_site").val(data_atualizacao_endereco_site);
		$("#bool_ativo_endereco_site").val(bool_ativo_endereco_site);
		
		$.ajax({
			url:'app/controllers/funcoes_estadoController.php',
			type: 'POST',
			dataType: 'text',
			data: { 
				'pequisa_estado_id': true,
				'id': estado_id
			}
		}).done( function(data){
			vetor = data.split(",");
			$("#estado_id-flexdatalist").val(vetor[1]);
			$("#estado_id").val(parseInt(vetor[0]));
		});

		$("#estado_id").val(estado_id);
		$.ajax({
			url:'app/controllers/funcoes_configurar_siteController.php',
			type: 'POST',
			dataType: 'text',
			data: { 
				'pequisa_configurar_site_id': true,
				'id': configurar_site_id
			}
		}).done( function(data){
			vetor = data.split(",");
			$("#configurar_site_id-flexdatalist").val(vetor[1]);
			$("#configurar_site_id").val(parseInt(vetor[0]));
		});

		$("#configurar_site_id").val(configurar_site_id);
		
	});
});


function atualizarrRegistro(){
	var campoFocus = "";
		 if(validation($("#descricao_endereco_site").val() == "")) campoFocus = "descricao_endereco_site";
	else if(validation($("#endereco_endereco_site").val() == "")) campoFocus = "endereco_endereco_site";
	else if(validation($("#numero_endereco_site").val() == "")) campoFocus = "numero_endereco_site";
	else if(validation($("#cidade_endereco_site").val() == "")) campoFocus = "cidade_endereco_site";
	else if(validation($("#estado_id").val() == "")) campoFocus = "estado_id";
	else if(validation($("#cep_endereco_site").val() == "")) campoFocus = "cep_endereco_site";
	else if(validation($("#telefone_endereco_site").val() == "")) campoFocus = "telefone_endereco_site";
	else if(validation($("#horario_funcionamento_endereco_site").val() == "")) campoFocus = "horario_funcionamento_endereco_site";
	else if(validation($("#latitude_endereco_site").val() == "")) campoFocus = "latitude_endereco_site";
	else if(validation($("#longitude_endereco_site").val() == "")) campoFocus = "longitude_endereco_site";
	else if(validation($("#configurar_site_id").val() == "")) campoFocus = "configurar_site_id";
	else if(validation($("#bool_ativo_endereco_site").val() == "")) campoFocus = "bool_ativo_endereco_site";


	else {
		$.ajax({
			url:'app/controllers/atualiza_endereco_siteController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_endereco_site': $("#editar").val(),
				'descricao_endereco_site': $("#descricao_endereco_site").val(),
				'endereco_endereco_site': $("#endereco_endereco_site").val(),
				'numero_endereco_site': $("#numero_endereco_site").val(),
				'complemento_endereco_site': $("#complemento_endereco_site").val(),
				'bairro_endereco_site': $("#bairro_endereco_site").val(),
				'cidade_endereco_site': $("#cidade_endereco_site").val(),
				'estado_id': $("#estado_id").val(),
				'cep_endereco_site': $("#cep_endereco_site").val(),
				'telefone_endereco_site': $("#telefone_endereco_site").val(),
				'celular_endereco_site': $("#celular_endereco_site").val(),
				'email_endereco_site': $("#email_endereco_site").val(),
				'horario_funcionamento_endereco_site': $("#horario_funcionamento_endereco_site").val(),
				'latitude_endereco_site': $("#latitude_endereco_site").val(),
				'longitude_endereco_site': $("#longitude_endereco_site").val(),
				'configurar_site_id': $("#configurar_site_id").val(),
				'data_atualizacao_endereco_site': $("#data_atualizacao_endereco_site").val(),
				'bool_ativo_endereco_site': $("#bool_ativo_endereco_site").val()
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
