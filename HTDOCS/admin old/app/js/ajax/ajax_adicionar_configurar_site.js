
function gravarRegistro(){
	var campoFocus = "";
		 if(validation($("#titulo_configurar_site").val() == "")) campoFocus = "titulo_configurar_site";
	else if(validation($("#cor_pagina_configurar_site").val() == "")) campoFocus = "cor_pagina_configurar_site";
	else if(validation($("#contra_cor_pagina_configurar_site").val() == "")) campoFocus = "contra_cor_pagina_configurar_site";
	else if(validation($("#imagem_icone_configurar_site").val() == "")) campoFocus = "imagem_icone_configurar_site";
	else if(validation($("#imagem_logo_configurar_site").val() == "")) campoFocus = "imagem_logo_configurar_site";
	else if(validation($("#bool_ativo_configurar_site").val() == "")) campoFocus = "bool_ativo_configurar_site";


	else {
		$.ajax({
			url:'app/controllers/cadastro_configurar_siteController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'titulo_configurar_site': $("#titulo_configurar_site").val(),
				'cor_pagina_configurar_site': $("#cor_pagina_configurar_site").val(),
				'contra_cor_pagina_configurar_site': $("#contra_cor_pagina_configurar_site").val(),
				'imagem_icone_configurar_site': $("#imagem_icone_configurar_site").val(),
				'imagem_logo_configurar_site': $("#imagem_logo_configurar_site").val(),
				'data_atualizacao_configurar_site': $("#data_atualizacao_configurar_site").val(),
				'bool_ativo_configurar_site': $("#bool_ativo_configurar_site").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha ao Cadastrar!");
			else {
				toast.success("Cadastrado com sucesso!");
				$("#titulo_configurar_site").val("");
				$("#cor_pagina_configurar_site").val("");
				$("#contra_cor_pagina_configurar_site").val("");
				$("#imagem_icone_configurar_site").val("");
				$("#imagem_logo_configurar_site").val("");
				$("#data_atualizacao_configurar_site").val("");
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
