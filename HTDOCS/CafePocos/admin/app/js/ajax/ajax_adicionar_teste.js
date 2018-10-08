
function gravarRegistro(){
	var campoFocus = "";
		 if(validation($("#descricao_teste").val() == "")) campoFocus = "descricao_teste";
	else if(validation($("#data_atualizacao_teste").val() == "")) campoFocus = "data_atualizacao_teste";
	else if(validation($("#usuario_id").val() == "")) campoFocus = "usuario_id";
	else if(validation($("#bool_ativo_teste").val() == "")) campoFocus = "bool_ativo_teste";


	else {
		$.ajax({
			url:'app/controllers/cadastro_testeController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'descricao_teste': $("#descricao_teste").val(),
				'data_atualizacao_teste': $("#data_atualizacao_teste").val(),
				'usuario_id': $("#usuario_id").val(),
				'bool_ativo_teste': $("#bool_ativo_teste").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha ao Cadastrar!");
			else {
				toast.success("Cadastrado com sucesso!");
				$("#descricao_teste").val("");
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
