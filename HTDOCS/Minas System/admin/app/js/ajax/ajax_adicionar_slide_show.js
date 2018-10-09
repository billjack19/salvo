
function gravarRegistro(){
	var campoFocus = "";
		 if($("#imagem_slide_show").val() == "") campoFocus = "imagem_slide_show";
	else if($("#configurar_site_id").val() == "") campoFocus = "configurar_site_id";
	else if($("#bool_ativo_slide_show").val() == "") campoFocus = "bool_ativo_slide_show";


	else {
		$.ajax({
			url:'app/controllers/cadastro_slide_showController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'titulo_slide_show': $("#titulo_slide_show").val(),
				'descricao_slide_show': $("#descricao_slide_show").val(),
				'imagem_slide_show': $("#imagem_slide_show").val(),
				'configurar_site_id': $("#configurar_site_id").val(),
				'data_atualizacao_slide_show': $("#data_atualizacao_slide_show").val(),
				'bool_ativo_slide_show': $("#bool_ativo_slide_show").val(),
				'areaDeAtuacao': $("#areaDeAtuacao").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha: "+data);
			else {
				toast.success("Cadastrado com sucesso!");
				$("#titulo_slide_show").val("");
				$("#descricao_slide_show").val("");
				$("#imagem_slide_show").val("");
			}
		});
	} 

	if (campoFocus != "") {
		document.getElementById(campoFocus).focus();
		toast.danger('Preencha no mínimo todos os campos obrigatórios!');
	}
}