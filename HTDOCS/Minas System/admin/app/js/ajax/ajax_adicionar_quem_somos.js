
function gravarRegistro(){
	var campoFocus = "";
		 if($("#titulo_quem_somos").val() == "") campoFocus = "titulo_quem_somos";
	else if($("#descricao_quem_somos").val() == "") campoFocus = "descricao_quem_somos";
	else if($("#imagem_quem_somos").val() == "") campoFocus = "imagem_quem_somos";
	else if($("#data_atualizacao_quem_somos").val() == "") campoFocus = "data_atualizacao_quem_somos";
	else if($("#bool_ativo_quem_somos").val() == "") campoFocus = "bool_ativo_quem_somos";


	else {
		$.ajax({
			url:'app/controllers/cadastro_quem_somosController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'titulo_quem_somos': $("#titulo_quem_somos").val(),
				'descricao_quem_somos': $("#descricao_quem_somos").val(),
				'imagem_quem_somos': $("#imagem_quem_somos").val(),
				'data_atualizacao_quem_somos': $("#data_atualizacao_quem_somos").val(),
				'bool_ativo_quem_somos': $("#bool_ativo_quem_somos").val(),
				'areaDeAtuacao': $("#areaDeAtuacao").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha: "+data);
			else {
				toast.success("Cadastrado com sucesso!");
				$("#titulo_quem_somos").val("");
				$("#descricao_quem_somos").val("");
				$("#imagem_quem_somos").val("");
			}
		});
	} 

	if (campoFocus != "") {
		document.getElementById(campoFocus).focus();
		toast.danger('Preencha no mínimo todos os campos obrigatórios!');
	}
}