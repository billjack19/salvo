
function gravarRegistro(){
	var campoFocus = "";
		 if(validation($("#nome_cliente_site").val() == "")) campoFocus = "nome_cliente_site";
	else if(validation($("#login_cliente_site").val() == "")) campoFocus = "login_cliente_site";
	else if(validation($("#senha_cliente_site").val() == "")) campoFocus = "senha_cliente_site";
	else if(validation($("#telefone_cliente_site").val() == "")) campoFocus = "telefone_cliente_site";
	else if(validation($("#bool_ativo_cliente_site").val() == "")) campoFocus = "bool_ativo_cliente_site";


	else {
		$.ajax({
			url:'app/controllers/cadastro_cliente_siteController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'nome_cliente_site': $("#nome_cliente_site").val(),
				'login_cliente_site': $("#login_cliente_site").val(),
				'senha_cliente_site': $("#senha_cliente_site").val(),
				'telefone_cliente_site': $("#telefone_cliente_site").val(),
				'celular_cliente_site': $("#celular_cliente_site").val(),
				'endereco_cliente_site': $("#endereco_cliente_site").val(),
				'numero_cliente_site': $("#numero_cliente_site").val(),
				'complemento_cliente_site': $("#complemento_cliente_site").val(),
				'bairro_cliente_site': $("#bairro_cliente_site").val(),
				'cidade_cliente_site': $("#cidade_cliente_site").val(),
				'estado_id': $("#estado_id").val(),
				'cep_cliente_site': $("#cep_cliente_site").val(),
				'bool_ativo_cliente_site': $("#bool_ativo_cliente_site").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha: "+data);
			else {
				toast.success("Cadastrado com sucesso!");
				$("#nome_cliente_site").val("");
				$("#login_cliente_site").val("");
				$("#senha_cliente_site").val("");
				$("#telefone_cliente_site").val("");
				$("#celular_cliente_site").val("");
				$("#endereco_cliente_site").val("");
				$("#numero_cliente_site").val("");
				$("#complemento_cliente_site").val("");
				$("#bairro_cliente_site").val("");
				$("#cidade_cliente_site").val("");
				$("#cep_cliente_site").val("");
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
