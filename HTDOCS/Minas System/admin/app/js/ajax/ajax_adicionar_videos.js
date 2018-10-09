
function gravarRegistro(){
	var campoFocus = "";
		 if($("#descricao_videos").val() == "") campoFocus = "descricao_videos";
	else if($("#link_videos").val() == "") campoFocus = "link_videos";
	else if($("#data_atualizacao_videos").val() == "") campoFocus = "data_atualizacao_videos";
	else if($("#bool_ativo_videos").val() == "") campoFocus = "bool_ativo_videos";


	else {
		$.ajax({
			url:'app/controllers/cadastro_videosController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'descricao_videos': $("#descricao_videos").val(),
				'link_videos': $("#link_videos").val(),
				'data_atualizacao_videos': $("#data_atualizacao_videos").val(),
				'bool_ativo_videos': $("#bool_ativo_videos").val(),
				'areaDeAtuacao': $("#areaDeAtuacao").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha: "+data);
			else {
				toast.success("Cadastrado com sucesso!");
				$("#descricao_videos").val("");
				$("#link_videos").val("");
			}
		});
	} 

	if (campoFocus != "") {
		document.getElementById(campoFocus).focus();
		toast.danger('Preencha no mínimo todos os campos obrigatórios!');
	}
}