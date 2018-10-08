
function gravarRegistro(){
	var campoFocus = "";
		 if($("#data_atualizacao_orcamento").val() == "") campoFocus = "data_atualizacao_orcamento";
	else if($("#usuario_id").val() == "") campoFocus = "usuario_id";
	else if($("#bool_ativo_orcamento").val() == "") campoFocus = "bool_ativo_orcamento";


	else {
		$.ajax({
			url:'app/controllers/cadastro_orcamentoController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'emissao_orcamento': $("#emissao_orcamento").val(),
				'descricao_orcamento': $("#descricao_orcamento").val(),
				'data_atualizacao_orcamento': $("#data_atualizacao_orcamento").val(),
				'usuario_id': $("#usuario_id").val(),
				'bool_ativo_orcamento': $("#bool_ativo_orcamento").val(),
				'areaDeAtuacao': $("#areaDeAtuacao").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha: "+data);
			else {
				toast.success("Cadastrado com sucesso!");
				$("#descricao_orcamento").val("");
			}
		});
	} 

	if (campoFocus != "") {
		document.getElementById(campoFocus).focus();
		toast.danger('Preencha no mínimo todos os campos obrigatórios!');
	}
}