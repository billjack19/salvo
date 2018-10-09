
$(document).ready(function(){
	
	var id_loja = "";
	var titulo_loja = "";
	var descricao_loja = "";
	var imagem_loja = "";
	var configurar_site_id = "";
	var data_atualizacao_loja = "";
	var bool_ativo_loja = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroLoja = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var simOUnao = "";

	var grades = document.getElementsByName("grade");
	var id_tabela_primaria = 0;
	for (var i = grades.length - 1; i >= 0; i--) {
		if ($(grades[i]).data("p") == "configurar_site" && $(grades[i]).data("g") == "loja") {
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
		url:'app/controllers/funcoes_lojaController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_loja_grade': true,
			'tabela': "configurar_site",
			'id': id_tabela_primaria
		}
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split(",");
		if (subvetor[1] == undefined) {
			telaCadastroLoja += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroLoja += "<br>";

			telaCadastroLoja += "<div class='bloco2'>";

			// var vetor = data.split("[]");
			// var subvetor = [];
			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(",");

				
				id_loja = subvetor[0];
				titulo_loja = subvetor[1];
				descricao_loja = subvetor[2];
				imagem_loja = subvetor[3];
				configurar_site_id = subvetor[4];
				data_atualizacao_loja = subvetor[5];
				bool_ativo_loja = subvetor[6];
				

				if (bool_ativo_loja == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_grade_loja-configurar_site' style='color: #f0ad4e;' data-id='"+id_loja+"' onclick='editar(this);' title='Editar' "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+titulo_loja+"</td>";
				tabelaViewBody += 			"<td>"+descricao_loja+"</td>";
				tabelaViewBody += 			"<td>"+imagem_loja+"</td>";
				tabelaViewBody += 			"<td>"+formatarData(data_atualizacao_loja)+"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='principal.php#!grade_topicos_loja-loja' style='color: green' data-id='"+id_loja+"' onclick=\"grade(this , 'loja', 'topicos_loja')\" title='Topicos Loja'>";
				tabelaViewBody += 					"<i class=\"fa fa-plus\" aria-hidden=\"true\"></i>";
				tabelaViewBody +=  				"</a>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='#!grade_loja-configurar_site' style='color: "+cor_ativo+"' data-id='"+id_loja+"' onclick=\"excluir(this , 'loja')\" title='Excluir'>";
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
			telaCadastroLoja += 	"<table class='table'>";
			telaCadastroLoja += 		"<tr bgcolor='white'>";
			telaCadastroLoja += 			"<td><b>Editar</b></td>";
			telaCadastroLoja += 			"<td><b>Titulo</b></td>";
			telaCadastroLoja += 			"<td><b>Descrição</b></td>";
			telaCadastroLoja += 			"<td><b>Imagem</b></td>";
			telaCadastroLoja += 			"<td><b>Data Atualização</b></td>";
			telaCadastroLoja += 			"<td><b>Topicos Loja</b></td>";
			telaCadastroLoja += 			"<td><b>Ativo</b></td>";
			telaCadastroLoja += 		"</tr>";
			telaCadastroLoja +=		tabelaViewBody;
			telaCadastroLoja += 	"</table>";
			// 	telaCadastroLoja += jk_table("table", "0",
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
			// telaCadastroLoja += "</div>";	
		}
		telaCadastroLoja += "</div>";
		$("#conteudoLoja").html(telaCadastroLoja);
		for (var i = acumularFunctionId.length - 1; i >= 0; i--) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i]);
		}
		var botaoBoltarGrade = verificaGrade('configurar_site', 'loja', 'Configurar Site');
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

