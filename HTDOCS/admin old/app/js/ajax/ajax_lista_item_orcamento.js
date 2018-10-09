
$(document).ready(function(){
	
	var id_item_orcamento = "";
	var data_lanc_item_orcamento = "";
	var orcamento_id = "";
	var item_id = "";
	var quantidade_item_orcamento = "";
	var total_item_orcamento = "";
	var bool_ativo_item_orcamento = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroItem_orcamento = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var simOUnao = "";

	$.ajax({
		url:'app/controllers/funcoes_item_orcamentoController.php',
		type: 'POST',
		dataType: 'text',
		data: { 'pequisa_item_orcamento': true }
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split(",");
		if (subvetor[1] == undefined) {
			telaCadastroItem_orcamento += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroItem_orcamento += "<br>";

			telaCadastroItem_orcamento += "<div class='bloco2'>";

			// var vetor = data.split("[]");
			// var subvetor = [];
			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(",");

				
				id_item_orcamento = subvetor[0];
				data_lanc_item_orcamento = subvetor[1];
				orcamento_id = subvetor[2];
				item_id = subvetor[3];
				quantidade_item_orcamento = subvetor[4];
				total_item_orcamento = subvetor[5];
				bool_ativo_item_orcamento = subvetor[6];
				
				acumularFunctionId.push(id_item_orcamento);
				acumularFunctionCampo.push(orcamento_id+"+orcamento");
				acumularFunctionId.push(id_item_orcamento);
				acumularFunctionCampo.push(item_id+"+item");

				if (bool_ativo_item_orcamento == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_item_orcamento' style='color: #f0ad4e;' data-id='"+id_item_orcamento+"' onclick='editar(this);' title='Editar' "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+formatarData(data_lanc_item_orcamento)+"</td>";
				tabelaViewBody += 			"<td><div id='orcamento_"+parseInt(id_item_orcamento)+"'></div></td>";
				tabelaViewBody += 			"<td><div id='item_"+parseInt(id_item_orcamento)+"'></div></td>";
				tabelaViewBody += 			"<td>"+quantidade_item_orcamento+"</td>";
				tabelaViewBody += 			"<td>"+total_item_orcamento+"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='#!item_orcamento' style='color: "+cor_ativo+"' data-id='"+id_item_orcamento+"' onclick=\"excluir(this , 'item_orcamento')\" title='Excluir'>";
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
			telaCadastroItem_orcamento += 	"<table class='table'>";
			telaCadastroItem_orcamento += 		"<tr bgcolor='white'>";
			telaCadastroItem_orcamento += 			"<td><b>Editar</b></td>";
			telaCadastroItem_orcamento += 			"<td><b>Data Lanc</b></td>";
			telaCadastroItem_orcamento += 			"<td><b>Orçamento</b></td>";
			telaCadastroItem_orcamento += 			"<td><b>Item</b></td>";
			telaCadastroItem_orcamento += 			"<td><b>Quantidade</b></td>";
			telaCadastroItem_orcamento += 			"<td><b>Total</b></td>";
			telaCadastroItem_orcamento += 			"<td><b>Ativo</b></td>";
			telaCadastroItem_orcamento += 		"</tr>";
			telaCadastroItem_orcamento +=		tabelaViewBody;
			telaCadastroItem_orcamento += 	"</table>";
			// 	telaCadastroItem_orcamento += jk_table("table", "0",
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
			// telaCadastroItem_orcamento += "</div>";	
		}
		telaCadastroItem_orcamento += "</div>";
		$("#conteudoItem_orcamento").html(telaCadastroItem_orcamento);
		for (var i = acumularFunctionId.length - 1; i >= 0; i--) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i]);
		}
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

