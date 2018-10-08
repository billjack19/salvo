
function gravarRegistro(){
	var campoFocus = "";
		 if(validation($("#bool_ativo_cliefornec").val() == "")) campoFocus = "bool_ativo_cliefornec";


	else {
		$.ajax({
			url:'app/controllers/cadastro_cliefornecController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'CPF_CGC': $("#CPF_CGC").val(),
				'RAZAOSOCIAL': $("#RAZAOSOCIAL").val(),
				'NOMEFANTASIA': $("#NOMEFANTASIA").val(),
				'senha_site': $("#senha_site").val(),
				'bool_ativo_cliefornec': $("#bool_ativo_cliefornec").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha ao Cadastrar!");
			else {
				toast.success("Cadastrado com sucesso!");
				$("#CPF_CGC").val("");
				$("#RAZAOSOCIAL").val("");
				$("#NOMEFANTASIA").val("");
				$("#senha_site").val("");
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
