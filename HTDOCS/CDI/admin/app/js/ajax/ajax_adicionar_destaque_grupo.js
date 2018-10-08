
function gravarRegistro(){
	var campoFocus = "";
		 if(validation($("#titulo_destaque_grupo").val() == "")) campoFocus = "titulo_destaque_grupo";
	else if(validation($("#grupo_id").val() == "")) campoFocus = "grupo_id";
	else if(validation($("#imagem_destaque_grupo").val() == "")) campoFocus = "imagem_destaque_grupo";
	else if(validation($("#configurar_site_id").val() == "")) campoFocus = "configurar_site_id";
	else if(validation($("#bool_ativo_destaque_grupo").val() == "")) campoFocus = "bool_ativo_destaque_grupo";


	else {
		$.ajax({
			url:'app/controllers/cadastro_destaque_grupoController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'titulo_destaque_grupo': $("#titulo_destaque_grupo").val(),
				'grupo_id': $("#grupo_id").val(),
				'imagem_destaque_grupo': $("#imagem_destaque_grupo").val(),
				'descricao_destaque_grupo': $("#descricao_destaque_grupo").val(),
				'configurar_site_id': $("#configurar_site_id").val(),
				'data_atualizacao_destaque_grupo': $("#data_atualizacao_destaque_grupo").val(),
				'bool_ativo_destaque_grupo': $("#bool_ativo_destaque_grupo").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha: "+data);
			else {
				toast.success("Cadastrado com sucesso!");
				$("#titulo_destaque_grupo").val("");
				$("#imagem_destaque_grupo").val("");
				$("#descricao_destaque_grupo").val("");
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
