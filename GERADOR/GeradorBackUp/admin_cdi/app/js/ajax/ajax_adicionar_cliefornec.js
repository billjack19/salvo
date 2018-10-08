
function gravarRegistro(){
	var campoFocus = "";


	if(true) {
		$.ajax({
			url:'app/controllers/cadastro_cliefornecController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'CPF_CGC': $("#CPF_CGC").val(),
				'RAZAOSOCIAL': $("#RAZAOSOCIAL").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha: "+data);
			else {
				toast.success("Cadastrado com sucesso!");
				$("#CPF_CGC").val("");
				$("#RAZAOSOCIAL").val("");
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
