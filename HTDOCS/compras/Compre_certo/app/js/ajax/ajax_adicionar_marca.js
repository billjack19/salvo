
function gravarRegistro(){
	var campoFocus = "";
		 if($("#descricao_marca").val() == "") campoFocus = "descricao_marca";
	else if($("#data_atualizacao_marca").val() == "") campoFocus = "data_atualizacao_marca";
	else if($("#usuario_id").val() == "") campoFocus = "usuario_id";
	else if($("#bool_ativo_marca").val() == "") campoFocus = "bool_ativo_marca";


	else {
		$.ajax({
			url:'app/controllers/cadastro_marcaController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'descricao_marca': $("#descricao_marca").val(),
				'data_atualizacao_marca': $("#data_atualizacao_marca").val(),
				'usuario_id': $("#usuario_id").val(),
				'bool_ativo_marca': $("#bool_ativo_marca").val(),
				'areaDeAtuacao': $("#areaDeAtuacao").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha: "+data);
			else {
				toast.success("Cadastrado com sucesso!");
				$("#descricao_marca").val("");
			}
		});
	} 

	if (campoFocus != "") {
		document.getElementById(campoFocus).focus();
		toast.danger('Preencha no mínimo todos os campos obrigatórios!');
	}
}