
function gravarRegistro(){
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
	else if(validation($("#data_atualizacao_endereco_site").val() == "")) campoFocus = "data_atualizacao_endereco_site";
	else if(validation($("#bool_ativo_endereco_site").val() == "")) campoFocus = "bool_ativo_endereco_site";


	else {
		$.ajax({
			url:'app/controllers/cadastro_endereco_siteController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'descricao_endereco_site': $("#descricao_endereco_site").val(),
				'endereco_endereco_site': $("#endereco_endereco_site").val(),
				'numero_endereco_site': $("#numero_endereco_site").val(),
				'complemento_endereco_site': $("#complemento_endereco_site").val(),
				'cidade_endereco_site': $("#cidade_endereco_site").val(),
				'estado_id': $("#estado_id").val(),
				'cep_endereco_site': $("#cep_endereco_site").val(),
				'telefone_endereco_site': $("#telefone_endereco_site").val(),
				'celular_endereco_site': $("#celular_endereco_site").val(),
				'horario_funcionamento_endereco_site': $("#horario_funcionamento_endereco_site").val(),
				'latitude_endereco_site': $("#latitude_endereco_site").val(),
				'longitude_endereco_site': $("#longitude_endereco_site").val(),
				'data_atualizacao_endereco_site': $("#data_atualizacao_endereco_site").val(),
				'bool_ativo_endereco_site': $("#bool_ativo_endereco_site").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha ao Cadastrar!");
			else {
				toast.success("Cadastrado com sucesso!");
				$("#descricao_endereco_site").val("");
				$("#endereco_endereco_site").val("");
				$("#numero_endereco_site").val("");
				$("#complemento_endereco_site").val("");
				$("#cidade_endereco_site").val("");
				$("#cep_endereco_site").val("");
				$("#telefone_endereco_site").val("");
				$("#celular_endereco_site").val("");
				$("#horario_funcionamento_endereco_site").val("");
				$("#latitude_endereco_site").val("");
				$("#longitude_endereco_site").val("");
				$("#data_atualizacao_endereco_site").val("");
			}
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
