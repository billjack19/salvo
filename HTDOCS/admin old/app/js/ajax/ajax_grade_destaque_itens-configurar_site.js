
$(document).ready(function(){
	
	var id_destaque_itens = "";
	var descricao_destaque_itens = "";
	var item_id = "";
	var configurar_site_id = "";
	var data_atualizacao_destaque_itens = "";
	var bool_ativo_destaque_itens = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroDestaque_itens = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var simOUnao = "";

	var grades = document.getElementsByName("grade");
	var id_tabela_primaria = 0;
	for (var i = grades.length - 1; i >= 0; i--) {
		if ($(grades[i]).data("p") == "configurar_site" && $(grades[i]).data("g") == "destaque_itens") {
			id_tabela_primaria = $(grades[i]).val();
			if (id_tabela_primaria == 0)
				window.location.assign("principal.php#!configurar_site");
			else {
				$.ajax({
					url:'app/controllers/funcoes_configurar_siteController.php',
					type: 'POST',
					dataType: 'text',
					data: {
						'pequisa_configurar_site_id': true,
						'id': id_tabela_primaria
					}
				}).done( function(data){
					// console.log("funcoes_configurar_siteController: "+data);
					vetor = data.split(",");
					document.getElementById('nomeConfigurar_site').innerHTML = vetor[1];
				});
			}
		}
	}


	$.ajax({
		url:'app/controllers/funcoes_destaque_itensController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_destaque_itens_grade': true,
			'tabela': "configurar_site",
			'id': id_tabela_primaria
		}
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split(",");
		if (subvetor[1] == undefined) {
			telaCadastroDestaque_itens += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroDestaque_itens += "<br>";

			telaCadastroDestaque_itens += "<div class='bloco2'>";

			// var vetor = data.split("[]");
			// var subvetor = [];
			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(",");

				
				id_destaque_itens = subvetor[0];
				descricao_destaque_itens = subvetor[1];
				item_id = subvetor[2];
				configurar_site_id = subvetor[3];
				data_atualizacao_destaque_itens = subvetor[4];
				bool_ativo_destaque_itens = subvetor[5];
				
				acumularFunctionId.push(id_destaque_itens);
				acumularFunctionCampo.push(item_id+"+item");

				if (bool_ativo_destaque_itens == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_grade_destaque_itens-configurar_site' style='color: #f0ad4e;' data-id='"+id_destaque_itens+"' onclick='editar(this);' title='Editar' "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+descricao_destaque_itens+"</td>";
				tabelaViewBody += 			"<td><div id='item_"+parseInt(id_destaque_itens)+"'></div></td>";
				tabelaViewBody += 			"<td>"+formatarData(data_atualizacao_destaque_itens)+"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='#!grade_destaque_itens-configurar_site' style='color: "+cor_ativo+"' data-id='"+id_destaque_itens+"' onclick=\"excluir(this , 'destaque_itens')\" title='Excluir'>";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody += 		"</tr>";
				// 	tabela_cliente += jk_tr("","",
				// 		  jk_td("left", razao_social)
				// 		+ jk_td("left", inscricao_federal)
				// 		+ jk_td("left", telefone)
				// 		+ jk_td("left", email)
				// 		// jk_td("left", "<td>Bairro</td>";
				// 		// jk_td("left", "<td>Cidade</td>";
				// 		// jk_td("left", "<td>UF</td>";
				// 		+ jk_td("left",  
				// 			jk_buttonComplemento("", "", "", "", "telaAdicionarCliente("+id_cliente+");", 
				// 				jk_icon("pencil"), "style='color:#f0ad4e;' "+desabilitar)
				// 		)
				// 		/* + jk_td("left",  
				// 			jk_buttonComplemento("", "", "", "", "chamarTelaLocalEntrega("+id_cliente+");", 
				// 				jk_icon("plus"), style='color:green;' "+desabilitar)
				// 		)*/
				// 		+ jk_td("center",  
				// 			jk_buttonComplemento("", "", "", "", "alteraAtivoCliente("+id_cliente+", "+valorAtivo+");", 
				// 				icone_ativo, "style='color:"+cor_ativo+"'")
				// 		)
				// 	);
			}
			telaCadastroDestaque_itens += 	"<table class='table'>";
			telaCadastroDestaque_itens += 		"<tr bgcolor='white'>";
			telaCadastroDestaque_itens += 			"<td><b>Editar</b></td>";
			telaCadastroDestaque_itens += 			"<td><b>Descrição</b></td>";
			telaCadastroDestaque_itens += 			"<td><b>Item</b></td>";
			telaCadastroDestaque_itens += 			"<td><b>Data Atualização</b></td>";
			telaCadastroDestaque_itens += 			"<td><b>Ativo</b></td>";
			telaCadastroDestaque_itens += 		"</tr>";
			telaCadastroDestaque_itens +=		tabelaViewBody;
			telaCadastroDestaque_itens += 	"</table>";
			// 	telaCadastroDestaque_itens += jk_table("table", "0",
			// 		jk_tr("","",
			// 			  jk_td("left", "Razão Social")
			// 			+ jk_td("left", "CPF/cnpj")
			// 			+ jk_td("left", "Telefone")
			// 			+ jk_td("left", "E-mail")
			// 			// jk_td("left", "<td>Bairro</td>";
			// 			// jk_td("left", "<td>Cidade</td>";
			// 			// jk_td("left", "<td>UF</td>";
			// 			+ jk_td("left", "Editar")
			// 			// + jk_td("left", "Interagir")
			// 			+ jk_td("center", "Ativo")
			// 		) + tabela_cliente
			// 	);
			// telaCadastroDestaque_itens += "</div>";	
		}
		telaCadastroDestaque_itens += "</div>";
		$("#conteudoDestaque_itens").html(telaCadastroDestaque_itens);
		for (var i = acumularFunctionId.length - 1; i >= 0; i--) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i]);
		}
		var botaoBoltarGrade = verificaGrade('configurar_site', 'destaque_itens', 'Configurar Site');
		// console.log("botaoBoltarGrade: "+botaoBoltarGrade);
		$("#botaoVoltarGrade").html(botaoBoltarGrade);
		// montarComboBuscaCliente();
	});
});

function setarValorEstrangeiroLista(id, tabelaEstrangeira){
	id = parseInt(id);
	tabelaEstrangeira = tabelaEstrangeira.split("+");
	var idTabelaEstrangeira = tabelaEstrangeira[0];
	tabelaEstrangeira = tabelaEstrangeira[1];
	var colunaParam = "pequisa_"+tabelaEstrangeira+"_id";

	var param = JSON.parse('{ "'+colunaParam+'":true, "id":'+idTabelaEstrangeira+' }');

	$.ajax({
		url:'app/controllers/funcoes_'+tabelaEstrangeira+'Controller.php',
		type: 'POST',
		dataType: 'text',
		data: param
	}).done( function(data){
		vetor = data.split(",");
		document.getElementById(tabelaEstrangeira+'_'+id).innerHTML = vetor[1];
	});
}

