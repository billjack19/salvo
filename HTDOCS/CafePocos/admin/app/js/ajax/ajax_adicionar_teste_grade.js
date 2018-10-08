
function gravarRegistro(){
	var campoFocus = "";
		 if(validation($("#descricao_teste_grade").val() == "")) campoFocus = "descricao_teste_grade";
	else if(validation($("#teste_id").val() == "")) campoFocus = "teste_id";
	else if(validation($("#data_atualizacao_teste_grade").val() == "")) campoFocus = "data_atualizacao_teste_grade";
	else if(validation($("#usuario_id").val() == "")) campoFocus = "usuario_id";
	else if(validation($("#bool_ativo_teste_grade").val() == "")) campoFocus = "bool_ativo_teste_grade";


	else {
		$.ajax({
			url:'app/controllers/cadastro_teste_gradeController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'descricao_teste_grade': $("#descricao_teste_grade").val(),
				'teste_id': $("#teste_id").val(),
				'data_atualizacao_teste_grade': $("#data_atualizacao_teste_grade").val(),
				'usuario_id': $("#usuario_id").val(),
				'bool_ativo_teste_grade': $("#bool_ativo_teste_grade").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha ao Cadastrar!");
			else {
				toast.success("Cadastrado com sucesso!");
				$("#descricao_teste_grade").val("");
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
