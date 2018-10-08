
function gravarRegistro(){
	var campoFocus = "";


	if(true) {
		$.ajax({
			url:'app/controllers/cadastro_cliefornec_telefoneController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'Telefone': $("#Telefone").val(),
				'EMail': $("#EMail").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha: "+data);
			else {
				toast.success("Cadastrado com sucesso!");
				$("#Telefone").val("");
				$("#EMail").val("");
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
