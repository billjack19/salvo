
function gravarRegistro(){
	var campoFocus = "";
		 if($("#descricao_supermercado").val() == "") campoFocus = "descricao_supermercado";
	else if($("#data_atualizacao_supermercado").val() == "") campoFocus = "data_atualizacao_supermercado";
	else if($("#usuario_id").val() == "") campoFocus = "usuario_id";
	else if($("#bool_ativo_supermercado").val() == "") campoFocus = "bool_ativo_supermercado";


	else {
		$.ajax({
			url:'app/controllers/cadastro_supermercadoController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'descricao_supermercado': $("#descricao_supermercado").val(),
				'data_atualizacao_supermercado': $("#data_atualizacao_supermercado").val(),
				'usuario_id': $("#usuario_id").val(),
				'bool_ativo_supermercado': $("#bool_ativo_supermercado").val(),
				'areaDeAtuacao': $("#areaDeAtuacao").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha: "+data);
			else {
				toast.success("Cadastrado com sucesso!");
				$("#descricao_supermercado").val("");
			}
		});
	} 

	if (campoFocus != "") {
		document.getElementById(campoFocus).focus();
		toast.danger('Preencha no mínimo todos os campos obrigatórios!');
	}
}