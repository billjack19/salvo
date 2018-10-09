
$(document).ready(function(){
	
	var id_topicos_loja = "";
	var titulo_topicos_loja = "";
	var descricao_topicos_loja = "";
	var loja_id = "";
	var data_atualizacao_topicos_loja = "";
	var bool_ativo_topicos_loja = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroTopicos_loja = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var simOUnao = "";

	$.ajax({
		url:'app/controllers/funcoes_topicos_lojaController.php',
		type: 'POST',
		dataType: 'text',
		data: { 'pequisa_topicos_loja': true }
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split(",");
		if (subvetor[1] == undefined) {
			telaCadastroTopicos_loja += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroTopicos_loja += "<br>";

			telaCadastroTopicos_loja += "<div class='bloco2'>";

			// var vetor = data.split("[]");
			// var subvetor = [];
			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(",");

				
				id_topicos_loja = subvetor[0];
				titulo_topicos_loja = subvetor[1];
				descricao_topicos_loja = subvetor[2];
				loja_id = subvetor[3];
				data_atualizacao_topicos_loja = subvetor[4];
				bool_ativo_topicos_loja = subvetor[5];
				
				acumularFunctionId.push(id_topicos_loja);
				acumularFunctionCampo.push(loja_id+"+loja");

				if (bool_ativo_topicos_loja == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_topicos_loja' style='color: #f0ad4e;' data-id='"+id_topicos_loja+"' onclick='editar(this);' title='Editar' "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+titulo_topicos_loja+"</td>";
				tabelaViewBody += 			"<td>"+descricao_topicos_loja+"</td>";
				tabelaViewBody += 			"<td><div id='loja_"+parseInt(id_topicos_loja)+"'></div></td>";
				tabelaViewBody += 			"<td>"+formatarData(data_atualizacao_topicos_loja)+"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='#!topicos_loja' style='color: "+cor_ativo+"' data-id='"+id_topicos_loja+"' onclick=\"excluir(this , 'topicos_loja')\" title='Excluir'>";
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
			telaCadastroTopicos_loja += 	"<table class='table'>";
			telaCadastroTopicos_loja += 		"<tr bgcolor='white'>";
			telaCadastroTopicos_loja += 			"<td><b>Editar</b></td>";
			telaCadastroTopicos_loja += 			"<td><b>Titulo</b></td>";
			telaCadastroTopicos_loja += 			"<td><b>Descrição</b></td>";
			telaCadastroTopicos_loja += 			"<td><b>Loja</b></td>";
			telaCadastroTopicos_loja += 			"<td><b>Data Atualização</b></td>";
			telaCadastroTopicos_loja += 			"<td><b>Ativo</b></td>";
			telaCadastroTopicos_loja += 		"</tr>";
			telaCadastroTopicos_loja +=		tabelaViewBody;
			telaCadastroTopicos_loja += 	"</table>";
			// 	telaCadastroTopicos_loja += jk_table("table", "0",
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
			// telaCadastroTopicos_loja += "</div>";	
		}
		telaCadastroTopicos_loja += "</div>";
		$("#conteudoTopicos_loja").html(telaCadastroTopicos_loja);
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

