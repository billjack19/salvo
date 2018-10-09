
function gravarRegistro(){
	var campoFocus = "";
		 if($("#descricao_estado").val() == "") campoFocus = "descricao_estado";
	else if($("#sigla_estado").val() == "") campoFocus = "sigla_estado";
	else if($("#bool_ativo_estado").val() == "") campoFocus = "bool_ativo_estado";


	else {
		$.ajax({
			url:'app/controllers/cadastro_estadoController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'descricao_estado': $("#descricao_estado").val(),
				'sigla_estado': $("#sigla_estado").val(),
				'bool_ativo_estado': $("#bool_ativo_estado").val(),
				'areaDeAtuacao': $("#areaDeAtuacao").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha: "+data);
			else {
				toast.success("Cadastrado com sucesso!");
				$("#descricao_estado").val("");
				$("#sigla_estado").val("");
			}
		});
	} 

	if (campoFocus != "") {
		document.getElementById(campoFocus).focus();
		toast.danger('Preencha no mínimo todos os campos obrigatórios!');
	}
}