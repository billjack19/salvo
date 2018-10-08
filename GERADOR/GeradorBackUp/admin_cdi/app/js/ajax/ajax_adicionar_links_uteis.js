
function gravarRegistro(){
	var campoFocus = "";
		 if(validation($("#descricao_links_uteis").val() == "")) campoFocus = "descricao_links_uteis";
	else if(validation($("#link_links_uteis").val() == "")) campoFocus = "link_links_uteis";
	else if(validation($("#data_atualizacao_links_uteis").val() == "")) campoFocus = "data_atualizacao_links_uteis";
	else if(validation($("#usuario_id").val() == "")) campoFocus = "usuario_id";
	else if(validation($("#bool_ativo_links_uteis").val() == "")) campoFocus = "bool_ativo_links_uteis";


	else {
		$.ajax({
			url:'app/controllers/cadastro_links_uteisController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'descricao_links_uteis': $("#descricao_links_uteis").val(),
				'link_links_uteis': $("#link_links_uteis").val(),
				'data_atualizacao_links_uteis': $("#data_atualizacao_links_uteis").val(),
				'usuario_id': $("#usuario_id").val(),
				'bool_ativo_links_uteis': $("#bool_ativo_links_uteis").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha: "+data);
			else {
				toast.success("Cadastrado com sucesso!");
				$("#descricao_links_uteis").val("");
				$("#link_links_uteis").val("");
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
