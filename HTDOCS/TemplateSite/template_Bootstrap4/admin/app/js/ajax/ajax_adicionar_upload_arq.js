
function gravarRegistro(){
	var campoFocus = "";
		 if(validation($("#descricao_upload_arq").val() == "")) campoFocus = "descricao_upload_arq";
	else if(validation($("#tipo_upload_arq").val() == "")) campoFocus = "tipo_upload_arq";
	else if(validation($("#data_atualizacaoupload_arq").val() == "")) campoFocus = "data_atualizacaoupload_arq";
	else if(validation($("#bool_ativo_upload_arq").val() == "")) campoFocus = "bool_ativo_upload_arq";


	else {
		$.ajax({
			url:'app/controllers/cadastro_upload_arqController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'descricao_upload_arq': $("#descricao_upload_arq").val(),
				'tipo_upload_arq': $("#tipo_upload_arq").val(),
				'data_atualizacaoupload_arq': $("#data_atualizacaoupload_arq").val(),
				'bool_ativo_upload_arq': $("#bool_ativo_upload_arq").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha ao Cadastrar!");
			else {
				toast.success("Cadastrado com sucesso!");
				$("#descricao_upload_arq").val("");
				$("#tipo_upload_arq").val("");
				$("#data_atualizacaoupload_arq").val("");
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
