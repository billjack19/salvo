
function gravarRegistro(){
	var campoFocus = "";
		 if($("#titulo_loja").val() == "") campoFocus = "titulo_loja";
	else if($("#configurar_site_id").val() == "") campoFocus = "configurar_site_id";
	else if($("#bool_ativo_loja").val() == "") campoFocus = "bool_ativo_loja";


	else {
		$.ajax({
			url:'app/controllers/cadastro_lojaController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'titulo_loja': $("#titulo_loja").val(),
				'descricao_loja': $("#descricao_loja").val(),
				'imagem_loja': $("#imagem_loja").val(),
				'configurar_site_id': $("#configurar_site_id").val(),
				'data_atualizacao_loja': $("#data_atualizacao_loja").val(),
				'bool_ativo_loja': $("#bool_ativo_loja").val(),
				'areaDeAtuacao': $("#areaDeAtuacao").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha: "+data);
			else {
				toast.success("Cadastrado com sucesso!");
				$("#titulo_loja").val("");
				$("#descricao_loja").val("");
				$("#imagem_loja").val("");
			}
		});
	} 

	if (campoFocus != "") {
		document.getElementById(campoFocus).focus();
		toast.danger('Preencha no mínimo todos os campos obrigatórios!');
	}
}