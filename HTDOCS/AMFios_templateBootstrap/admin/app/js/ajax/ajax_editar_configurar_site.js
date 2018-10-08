
$(document).ready(function(){
	var id_configurar_site = "";
	var titulo_configurar_site = "";
	var cor_pagina_configurar_site = "";
	var contra_cor_pagina_configurar_site = "";
	var imagem_icone_configurar_site = "";
	var imagem_logo_configurar_site = "";
	var data_atualizacao_configurar_site = "";
	var bool_ativo_configurar_site = "";

	var vetor = [];
	$.ajax({
		url:'app/controllers/funcoesController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'editar': true,
			'id': $("#editar").val()
		}
	}).done( function(data){});

	$.ajax({
		url:'app/controllers/funcoes_configurar_siteController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_configurar_site_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split("{,}");

		id_configurar_site = vetor[0];
		
		titulo_configurar_site = vetor[1];
		cor_pagina_configurar_site = vetor[2];
		contra_cor_pagina_configurar_site = vetor[3];
		imagem_icone_configurar_site = vetor[4];
		imagem_logo_configurar_site = vetor[5];
		data_atualizacao_configurar_site = vetor[6];
		bool_ativo_configurar_site = vetor[7];
		
		$("#titulo_configurar_site").val(titulo_configurar_site);
		$("#cor_pagina_configurar_site").val(cor_pagina_configurar_site);
		$("#contra_cor_pagina_configurar_site").val(contra_cor_pagina_configurar_site);
		$("#imagem_icone_configurar_site").val(imagem_icone_configurar_site);
		$("#imagem_logo_configurar_site").val(imagem_logo_configurar_site);
		$("#data_atualizacao_configurar_site").val(data_atualizacao_configurar_site);
		$("#bool_ativo_configurar_site").val(bool_ativo_configurar_site);
		
	});
});


function atualizarrRegistro(){
	var campoFocus = "";
		 if($("#titulo_configurar_site").val() == "") campoFocus = "titulo_configurar_site";
	else if($("#cor_pagina_configurar_site").val() == "") campoFocus = "cor_pagina_configurar_site";
	else if($("#contra_cor_pagina_configurar_site").val() == "") campoFocus = "contra_cor_pagina_configurar_site";
	else if($("#imagem_icone_configurar_site").val() == "") campoFocus = "imagem_icone_configurar_site";
	else if($("#imagem_logo_configurar_site").val() == "") campoFocus = "imagem_logo_configurar_site";
	else if($("#bool_ativo_configurar_site").val() == "") campoFocus = "bool_ativo_configurar_site";


	else {
		$.ajax({
			url:'app/controllers/atualiza_configurar_siteController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_configurar_site': $("#editar").val(),
				'titulo_configurar_site': $("#titulo_configurar_site").val(),
				'cor_pagina_configurar_site': $("#cor_pagina_configurar_site").val(),
				'contra_cor_pagina_configurar_site': $("#contra_cor_pagina_configurar_site").val(),
				'imagem_icone_configurar_site': $("#imagem_icone_configurar_site").val(),
				'imagem_logo_configurar_site': $("#imagem_logo_configurar_site").val(),
				'data_atualizacao_configurar_site': $("#data_atualizacao_configurar_site").val(),
				'bool_ativo_configurar_site': $("#bool_ativo_configurar_site").val(),
				'areaDeAtuacao': $("#areaDeAtuacao").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha: "+data);
			else 								toast.success("Atualizado com sucesso!");
		});
	} 

	if (campoFocus != "") {
		document.getElementById(campoFocus).focus();
		toast.danger('Preencha no mínimo todos os campos obrigatórios!');
	}
}