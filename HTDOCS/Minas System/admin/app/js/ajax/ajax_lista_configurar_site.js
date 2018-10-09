
$(document).ready(function(){
	zerarTabelaGrade();
	buscar_configurar_site();
});

function buscar_configurar_site(){
	
	var id_configurar_site = "";
	var titulo_configurar_site = "";
	var titulo_menu_configurar_site = "";
	var cor_pagina_configurar_site = "";
	var contra_cor_pagina_configurar_site = "";
	var imagem_icone_configurar_site = "";
	var imagem_logo_configurar_site = "";
	var data_atualizacao_configurar_site = "";
	var bool_ativo_configurar_site = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroConfigurar_site = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var numeroRegAtual = 1;
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	$("#conteudoConfigurar_site").html("Carregando...");
	$.ajax({
		url:'app/controllers/funcoes_configurar_siteController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_configurar_site': true,
			'filtro': $("#pesquisa_configurar_site").val()
		}
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroConfigurar_site += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroConfigurar_site += "<br>";

			telaCadastroConfigurar_site += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_configurar_site = subvetor[0];
				titulo_configurar_site = subvetor[1];
				titulo_menu_configurar_site = subvetor[2];
				cor_pagina_configurar_site = subvetor[3];
				contra_cor_pagina_configurar_site = subvetor[4];
				imagem_icone_configurar_site = subvetor[5];
				imagem_logo_configurar_site = subvetor[6];
				data_atualizacao_configurar_site = subvetor[7];
				bool_ativo_configurar_site = subvetor[8];
				

				if (bool_ativo_configurar_site == 1) { 
					desabilitar = "";
					icone_ativo = "<i class=\"fa fa-check\" aria-hidden=\"true\"></i>";
					cor_ativo = "#0f0;";
					valorAtivo = 0;
				} else {
					desabilitar = "disabled";
					cor_ativo = "#f00;";
					icone_ativo = "<i class=\"fa fa-times\" aria-hidden=\"true\"></i>";
					valorAtivo = 1;
				}

				tabelaViewBody += 		"<tr>";
				tabelaViewBody +=			"<td align='center'>";
				tabelaViewBody +=				"<a href='principal.php#!editar_configurar_site' style='color: #f0ad4e;' data-id='"+id_configurar_site+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_configurar_site+"'>";
				tabelaViewBody += 				"<a href='#!configurar_site' style='color: "+cor_ativo+"' data-id='"+id_configurar_site+"' onclick=\"excluir(this , 'configurar_site', "+bool_ativo_configurar_site+", 'configurar_site')\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody +=			"<td align='center'>";
				tabelaViewBody +=				numeroRegAtual;
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+titulo_configurar_site+"</td>";
				tabelaViewBody += 			"<td>"+titulo_menu_configurar_site+"</td>";
				tabelaViewBody += 			"<td>"+cor_pagina_configurar_site+"</td>";
				tabelaViewBody += 			"<td>"+contra_cor_pagina_configurar_site+"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='app/upload/img/"+imagem_icone_configurar_site+"' target='_blank'>";
				tabelaViewBody += 					"<img src='app/upload/img/"+imagem_icone_configurar_site+"' style='max-height: 500px; max-width: 15%;'>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody += 			"</td>";
				if($("#n_acs_cards_configurar_site").val() == 1 || $("#n_acs_cards_configurar_site").val() == "1") {
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='principal.php#!grade_cards-configurar_site' style='color: green' data-id='"+id_configurar_site+"' onclick=\"grade(this , 'configurar_site', 'cards')\" title='Cards'>";
				tabelaViewBody += 					"<i class=\"fa fa-plus\" aria-hidden=\"true\"></i>";
				tabelaViewBody +=  				"</a>";
				tabelaViewBody +=  			"</td>";
				}
				if($("#n_acs_destaque_grupo_configurar_site").val() == 1 || $("#n_acs_destaque_grupo_configurar_site").val() == "1") {
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='principal.php#!grade_destaque_grupo-configurar_site' style='color: green' data-id='"+id_configurar_site+"' onclick=\"grade(this , 'configurar_site', 'destaque_grupo')\" title='Destaque Grupo'>";
				tabelaViewBody += 					"<i class=\"fa fa-plus\" aria-hidden=\"true\"></i>";
				tabelaViewBody +=  				"</a>";
				tabelaViewBody +=  			"</td>";
				}
				if($("#n_acs_endereco_site_configurar_site").val() == 1 || $("#n_acs_endereco_site_configurar_site").val() == "1") {
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='principal.php#!grade_endereco_site-configurar_site' style='color: green' data-id='"+id_configurar_site+"' onclick=\"grade(this , 'configurar_site', 'endereco_site')\" title='Endereço Site'>";
				tabelaViewBody += 					"<i class=\"fa fa-plus\" aria-hidden=\"true\"></i>";
				tabelaViewBody +=  				"</a>";
				tabelaViewBody +=  			"</td>";
				}
				if($("#n_acs_slide_show_configurar_site").val() == 1 || $("#n_acs_slide_show_configurar_site").val() == "1") {
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='principal.php#!grade_slide_show-configurar_site' style='color: green' data-id='"+id_configurar_site+"' onclick=\"grade(this , 'configurar_site', 'slide_show')\" title='Slide Show'>";
				tabelaViewBody += 					"<i class=\"fa fa-plus\" aria-hidden=\"true\"></i>";
				tabelaViewBody +=  				"</a>";
				tabelaViewBody +=  			"</td>";
				}
				if($("#n_acs_loja_configurar_site").val() == 1 || $("#n_acs_loja_configurar_site").val() == "1") {
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='principal.php#!grade_loja-configurar_site' style='color: green' data-id='"+id_configurar_site+"' onclick=\"grade(this , 'configurar_site', 'loja')\" title='Loja'>";
				tabelaViewBody += 					"<i class=\"fa fa-plus\" aria-hidden=\"true\"></i>";
				tabelaViewBody +=  				"</a>";
				tabelaViewBody +=  			"</td>";
				}
				tabelaViewBody += 		"</tr>";

				numeroRegAtual++;
				accesskeyEditar = "";
			}
			telaCadastroConfigurar_site += 	"<table class='table'>";
			telaCadastroConfigurar_site += 		"<tr bgcolor='white'>";
			telaCadastroConfigurar_site += 			"<td><b>Editar</b></td>";
			telaCadastroConfigurar_site += 			"<td><b>Ativo</b></td>";
			telaCadastroConfigurar_site += 			"<td><b>N°</b></td>";
			telaCadastroConfigurar_site += 			"<td><b>Titulo</b></td>";
			telaCadastroConfigurar_site += 			"<td><b>Titulo Menu</b></td>";
			telaCadastroConfigurar_site += 			"<td><b>Cor Pagina</b></td>";
			telaCadastroConfigurar_site += 			"<td><b>Contra Cor Pagina</b></td>";
			telaCadastroConfigurar_site += 			"<td><b>Imagem Icone</b></td>";
			if($("#n_acs_cards_configurar_site").val() == 1 || $("#n_acs_cards_configurar_site").val() == "1") {
			telaCadastroConfigurar_site += 			"<td><b>Cards</b></td>";
			}
			if($("#n_acs_destaque_grupo_configurar_site").val() == 1 || $("#n_acs_destaque_grupo_configurar_site").val() == "1") {
			telaCadastroConfigurar_site += 			"<td><b>Destaque Grupo</b></td>";
			}
			if($("#n_acs_endereco_site_configurar_site").val() == 1 || $("#n_acs_endereco_site_configurar_site").val() == "1") {
			telaCadastroConfigurar_site += 			"<td><b>Endereço Site</b></td>";
			}
			if($("#n_acs_slide_show_configurar_site").val() == 1 || $("#n_acs_slide_show_configurar_site").val() == "1") {
			telaCadastroConfigurar_site += 			"<td><b>Slide Show</b></td>";
			}
			if($("#n_acs_loja_configurar_site").val() == 1 || $("#n_acs_loja_configurar_site").val() == "1") {
			telaCadastroConfigurar_site += 			"<td><b>Loja</b></td>";
			}
			telaCadastroConfigurar_site += 		"</tr>";
			telaCadastroConfigurar_site +=		tabelaViewBody;
			telaCadastroConfigurar_site += 	"</table>";
		}
		telaCadastroConfigurar_site += "</div>";
		$("#conteudoConfigurar_site").html(telaCadastroConfigurar_site);
		for (var i = 0; i < acumularFunctionId.length; i++) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i], "");
		}
	});
}
