
function gravarRegistro(){
	var campoFocus = "";
		 if(validation($("#descricao_orcamento").val() == "")) campoFocus = "descricao_orcamento";
	else if(validation($("#cliente_site_id").val() == "")) campoFocus = "cliente_site_id";
	else if(validation($("#bool_ativo_orcamento").val() == "")) campoFocus = "bool_ativo_orcamento";


	else {
		$.ajax({
			url:'app/controllers/cadastro_orcamentoController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'descricao_orcamento': $("#descricao_orcamento").val(),
				'cliente_site_id': $("#cliente_site_id").val(),
				'data_lanc_orcamento': $("#data_lanc_orcamento").val(),
				'bool_ativo_orcamento': $("#bool_ativo_orcamento").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha ao Cadastrar!");
			else {
				toast.success("Cadastrado com sucesso!");
				$("#descricao_orcamento").val("");
				$("#data_lanc_orcamento").val("");
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
