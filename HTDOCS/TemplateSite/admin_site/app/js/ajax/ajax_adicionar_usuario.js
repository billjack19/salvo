
function gravarRegistro(){
	var campoFocus = "";
		 if(validation($("#nome_usuario").val() == "")) campoFocus = "nome_usuario";
	else if(validation($("#login_usuario").val() == "")) campoFocus = "login_usuario";
	else if(validation($("#senha_usuario").val() == "")) campoFocus = "senha_usuario";
	else if(validation($("#nivel_acesso_usuario").val() == "")) campoFocus = "nivel_acesso_usuario";


	else {
		$.ajax({
			url:'app/controllers/cadastro_usuarioController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'nome_usuario': $("#nome_usuario").val(),
				'login_usuario': $("#login_usuario").val(),
				'senha_usuario': $("#senha_usuario").val(),
				'foto_usuario': $("#foto_usuario").val(),
				'nivel_acesso_usuario': $("#nivel_acesso_usuario").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha ao Cadastrar!");
			else {
				toast.success("Cadastrado com sucesso!");
				$("#nome_usuario").val("");
				$("#login_usuario").val("");
				$("#senha_usuario").val("");
				$("#foto_usuario").val("");
				$("#nivel_acesso_usuario").val("");
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
