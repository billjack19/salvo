
$(document).ready(function(){
	
	var id_orcamento = "";
	var descricao_orcamento = "";
	var cliente_site_id = "";
	var data_lanc_orcamento = "";
	var bool_ativo_orcamento = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroOrcamento = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var simOUnao = "";

	var grades = document.getElementsByName("grade");
	var id_tabela_primaria = 0;
	for (var i = grades.length - 1; i >= 0; i--) {
		if ($(grades[i]).data("p") == "cliente_site" && $(grades[i]).data("g") == "orcamento") {
			id_tabela_primaria = $(grades[i]).val();
			if (id_tabela_primaria == 0)
				window.location.assign("principal.php#!cliente_site");
			else {
				$.ajax({
					url:'app/controllers/funcoes_cliente_siteController.php',
					type: 'POST',
					dataType: 'text',
					data: {
						'pequisa_cliente_site_id': true,
						'id': id_tabela_primaria
					}
				}).done( function(data){
					// console.log("funcoes_cliente_siteController: "+data);
					vetor = data.split(",");
					document.getElementById('nomeCliente_site').innerHTML = vetor[1];
				});
			}
		}
	}


	$.ajax({
		url:'app/controllers/funcoes_orcamentoController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_orcamento_grade': true,
			'tabela': "cliente_site",
			'id': id_tabela_primaria
		}
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split(",");
		if (subvetor[1] == undefined) {
			telaCadastroOrcamento += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroOrcamento += "<br>";

			telaCadastroOrcamento += "<div class='bloco2'>";

			// var vetor = data.split("[]");
			// var subvetor = [];
			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(",");

				
				id_orcamento = subvetor[0];
				descricao_orcamento = subvetor[1];
				cliente_site_id = subvetor[2];
				data_lanc_orcamento = subvetor[3];
				bool_ativo_orcamento = subvetor[4];
				

				if (bool_ativo_orcamento == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_grade_orcamento-cliente_site' style='color: #f0ad4e;' data-id='"+id_orcamento+"' onclick='editar(this);' title='Editar' "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+descricao_orcamento+"</td>";
				tabelaViewBody += 			"<td>"+formatarData(data_lanc_orcamento)+"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='principal.php#!grade_item_orcamento-orcamento' style='color: green' data-id='"+id_orcamento+"' onclick=\"grade(this , 'orcamento', 'item_orcamento')\" title='Item Orçamento'>";
				tabelaViewBody += 					"<i class=\"fa fa-plus\" aria-hidden=\"true\"></i>";
				tabelaViewBody +=  				"</a>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='#!grade_orcamento-cliente_site' style='color: "+cor_ativo+"' data-id='"+id_orcamento+"' onclick=\"excluir(this , 'orcamento')\" title='Excluir'>";
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
			telaCadastroOrcamento += 	"<table class='table'>";
			telaCadastroOrcamento += 		"<tr bgcolor='white'>";
			telaCadastroOrcamento += 			"<td><b>Editar</b></td>";
			telaCadastroOrcamento += 			"<td><b>Descrição</b></td>";
			telaCadastroOrcamento += 			"<td><b>Data Lanc</b></td>";
			telaCadastroOrcamento += 			"<td><b>Item Orçamento</b></td>";
			telaCadastroOrcamento += 			"<td><b>Ativo</b></td>";
			telaCadastroOrcamento += 		"</tr>";
			telaCadastroOrcamento +=		tabelaViewBody;
			telaCadastroOrcamento += 	"</table>";
			// 	telaCadastroOrcamento += jk_table("table", "0",
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
			// telaCadastroOrcamento += "</div>";	
		}
		telaCadastroOrcamento += "</div>";
		$("#conteudoOrcamento").html(telaCadastroOrcamento);
		for (var i = acumularFunctionId.length - 1; i >= 0; i--) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i]);
		}
		var botaoBoltarGrade = verificaGrade('cliente_site', 'orcamento', 'Cliente Site');
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

