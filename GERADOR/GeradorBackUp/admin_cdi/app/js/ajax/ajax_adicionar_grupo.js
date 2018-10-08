
function gravarRegistro(){
	var campoFocus = "";
		 if(validation($("#descricao_grupo").val() == "")) campoFocus = "descricao_grupo";
	else if(validation($("#data_atualizacao_grupo").val() == "")) campoFocus = "data_atualizacao_grupo";
	else if(validation($("#bool_ativo_grupo").val() == "")) campoFocus = "bool_ativo_grupo";


	else {
		$.ajax({
			url:'app/controllers/cadastro_grupoController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'descricao_grupo': $("#descricao_grupo").val(),
				'data_atualizacao_grupo': $("#data_atualizacao_grupo").val(),
				'usuario_id': $("#usuario_id").val(),
				'bool_ativo_grupo': $("#bool_ativo_grupo").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha: "+data);
			else {
				toast.success("Cadastrado com sucesso!");
				$("#descricao_grupo").val("");
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
