
function gravarRegistro(){
	var campoFocus = "";
		 if($("#descricao_orcamento").val() == "") campoFocus = "descricao_orcamento";
	else if($("#cliente_site_id").val() == "") campoFocus = "cliente_site_id";
	else if($("#bool_ativo_orcamento").val() == "") campoFocus = "bool_ativo_orcamento";


	else {
		$.ajax({
			url:'app/controllers/cadastro_orcamentoController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'descricao_orcamento': $("#descricao_orcamento").val(),
				'cliente_site_id': $("#cliente_site_id").val(),
				'data_lanc_orcamento': $("#data_lanc_orcamento").val(),
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