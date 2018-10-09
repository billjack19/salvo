
function gravarRegistro(){
	var campoFocus = "";
		 if($("#titulo_adicional_site").val() == "") campoFocus = "titulo_adicional_site";
	else if($("#descricao_adicional_site").val() == "") campoFocus = "descricao_adicional_site";
	else if($("#imagem_adicional_site").val() == "") campoFocus = "imagem_adicional_site";
	else if($("#saiba_mais_id").val() == "") campoFocus = "saiba_mais_id";
	else if($("#usuario_id").val() == "") campoFocus = "usuario_id";
	else if($("#data_atualizacao_adicional_site").val() == "") campoFocus = "data_atualizacao_adicional_site";
	else if($("#bool_ativo_adicional_site").val() == "") campoFocus = "bool_ativo_adicional_site";


	else {
		$.ajax({
			url:'app/controllers/cadastro_adicional_siteController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'titulo_adicional_site': $("#titulo_adicional_site").val(),
				'descricao_adicional_site': $("#descricao_adicional_site").val(),
				'imagem_adicional_site': $("#imagem_adicional_site").val(),
				'saiba_mais_id': $("#saiba_mais_id").val(),
				'usuario_id': $("#usuario_id").val(),
				'data_atualizacao_adicional_site': $("#data_atualizacao_adicional_site").val(),
				'bool_ativo_adicional_site': $("#bool_ativo_adicional_site").val(),
				'areaDeAtuacao': $("#areaDeAtuacao").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha: "+data);
			else {
				toast.success("Cadastrado com sucesso!");
				$("#titulo_adicional_site").val("");
				$("#descricao_adicional_site").val("");
				$("#imagem_adicional_site").val("");
			}
		});
	} 

	if (campoFocus != "") {
		document.getElementById(campoFocus).focus();
		toast.danger('Preencha no mínimo todos os campos obrigatórios!');
	}
}