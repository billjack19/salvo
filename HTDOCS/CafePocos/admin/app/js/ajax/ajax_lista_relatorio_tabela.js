
$(document).ready(function(){
	
	var id_relatorio_tabela = "";
	var descricao_relatorio_tabela = "";
	var data_atualizacao_relatorio_tabela = "";
	var bool_ativo_relatorio_tabela = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroRelatorio_tabela = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var simOUnao = "";

	$.ajax({
		url:'app/controllers/funcoesController.php',
		type: 'POST',
		dataType: 'text',
		data: { 'n_editar': true }
	}).done( function(data){});

	$.ajax({
		url:'app/controllers/funcoes_relatorio_tabelaController.php',
		type: 'POST',
		dataType: 'text',
		data: { 'pequisa_relatorio_tabela': true }
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroRelatorio_tabela += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroRelatorio_tabela += "<br>";

			telaCadastroRelatorio_tabela += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_relatorio_tabela = subvetor[0];
				descricao_relatorio_tabela = subvetor[1];
				data_atualizacao_relatorio_tabela = subvetor[2];
				bool_ativo_relatorio_tabela = subvetor[3];
				

				if (bool_ativo_relatorio_tabela == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_relatorio_tabela' style='color: #f0ad4e;' data-id='"+id_relatorio_tabela+"' onclick='editar(this);' title='Editar' "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+descricao_relatorio_tabela+"</td>";
				tabelaViewBody += 			"<td>"+formatarData(data_atualizacao_relatorio_tabela)+"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_relatorio_tabela+"'>";
				tabelaViewBody += 				"<a href='#!relatorio_tabela' style='color: "+cor_ativo+"' data-id='"+id_relatorio_tabela+"' onclick=\"excluir(this , 'relatorio_tabela', "+bool_ativo_relatorio_tabela+", '+relatorio_tabela+')\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody += 		"</tr>";
			}
			telaCadastroRelatorio_tabela += 	"<table class='table'>";
			telaCadastroRelatorio_tabela += 		"<tr bgcolor='white'>";
			telaCadastroRelatorio_tabela += 			"<td><b>Editar</b></td>";
			telaCadastroRelatorio_tabela += 			"<td><b>Descrição</b></td>";
			telaCadastroRelatorio_tabela += 			"<td><b>Data Atualização</b></td>";
			telaCadastroRelatorio_tabela += 			"<td><b>Ativo</b></td>";
			telaCadastroRelatorio_tabela += 		"</tr>";
			telaCadastroRelatorio_tabela +=		tabelaViewBody;
			telaCadastroRelatorio_tabela += 	"</table>";
		}
		telaCadastroRelatorio_tabela += "</div>";
		$("#conteudoRelatorio_tabela").html(telaCadastroRelatorio_tabela);
		for (var i = acumularFunctionId.length - 1; i >= 0; i--) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i]);
		}
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
		vetor = data.split("{,}");
		document.getElementById(tabelaEstrangeira+'_'+id).innerHTML = vetor[1];
	});
}


function buscar_relatorio_tabela(){
	
	var id_relatorio_tabela = "";
	var descricao_relatorio_tabela = "";
	var data_atualizacao_relatorio_tabela = "";
	var bool_ativo_relatorio_tabela = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroRelatorio_tabela = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var simOUnao = "";

	$("#conteudoCards").html("Carregando...");
	$.ajax({
		url:'app/controllers/funcoes_relatorio_tabelaController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_relatorio_tabela_filtro': true,
			'filtro': $("#pesquisa_relatorio_tabela").val()
		}
	}).done( function(data){

		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroRelatorio_tabela += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroRelatorio_tabela += "<br>";

			telaCadastroRelatorio_tabela += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_relatorio_tabela = subvetor[0];
				descricao_relatorio_tabela = subvetor[1];
				data_atualizacao_relatorio_tabela = subvetor[2];
				bool_ativo_relatorio_tabela = subvetor[3];
				

				if (bool_ativo_relatorio_tabela == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_relatorio_tabela' style='color: #f0ad4e;' data-id='"+id_relatorio_tabela+"' onclick='editar(this);' title='Editar' "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+descricao_relatorio_tabela+"</td>";
				tabelaViewBody += 			"<td>"+formatarData(data_atualizacao_relatorio_tabela)+"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_relatorio_tabela+"'>";
				tabelaViewBody += 				"<a href='#!relatorio_tabela' style='color: "+cor_ativo+"' data-id='"+id_relatorio_tabela+"' onclick=\"excluir(this , 'relatorio_tabela', "+bool_ativo_relatorio_tabela+")\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody += 		"</tr>";
			}
			telaCadastroRelatorio_tabela += 	"<table class='table'>";
			telaCadastroRelatorio_tabela += 		"<tr bgcolor='white'>";
			telaCadastroRelatorio_tabela += 			"<td><b>Editar</b></td>";
			telaCadastroRelatorio_tabela += 			"<td><b>Descrição</b></td>";
			telaCadastroRelatorio_tabela += 			"<td><b>Data Atualização</b></td>";
			telaCadastroRelatorio_tabela += 			"<td><b>Ativo</b></td>";
			telaCadastroRelatorio_tabela += 		"</tr>";
			telaCadastroRelatorio_tabela +=		tabelaViewBody;
			telaCadastroRelatorio_tabela += 	"</table>";
		}
		telaCadastroRelatorio_tabela += "</div>";
		$("#conteudoRelatorio_tabela").html(telaCadastroRelatorio_tabela);
		for (var i = acumularFunctionId.length - 1; i >= 0; i--) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i]);
		}
	});
}
