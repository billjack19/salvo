
$(document).ready(function(){
	
	var id_relatorios = "";
	var tabela_relatorios = "";
	var colunas_relatorios = "";
	var data_atualizacao_relatorios = "";
	var usuario_id = "";
	var bool_ativo_relatorios = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroRelatorios = "";
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
		url:'app/controllers/funcoes_relatoriosController.php',
		type: 'POST',
		dataType: 'text',
		data: { 'pequisa_relatorios': true }
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroRelatorios += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroRelatorios += "<br>";

			telaCadastroRelatorios += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_relatorios = subvetor[0];
				tabela_relatorios = subvetor[1];
				colunas_relatorios = subvetor[2];
				data_atualizacao_relatorios = subvetor[3];
				usuario_id = subvetor[4];
				bool_ativo_relatorios = subvetor[5];
				
				acumularFunctionId.push(id_relatorios);
				acumularFunctionCampo.push(usuario_id+"+usuario");

				if (bool_ativo_relatorios == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_relatorios' style='color: #f0ad4e;' data-id='"+id_relatorios+"' onclick='editar(this);' title='Editar' "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+tabela_relatorios+"</td>";
				tabelaViewBody += 			"<td>"+colunas_relatorios+"</td>";
				tabelaViewBody += 			"<td>"+formatarData(data_atualizacao_relatorios)+"</td>";
				tabelaViewBody += 			"<td><div id='usuario_"+parseInt(id_relatorios)+"'></div></td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_relatorios+"'>";
				tabelaViewBody += 				"<a href='#!relatorios' style='color: "+cor_ativo+"' data-id='"+id_relatorios+"' onclick=\"excluir(this , 'relatorios', "+bool_ativo_relatorios+", '+relatorios+')\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody += 		"</tr>";
			}
			telaCadastroRelatorios += 	"<table class='table'>";
			telaCadastroRelatorios += 		"<tr bgcolor='white'>";
			telaCadastroRelatorios += 			"<td><b>Editar</b></td>";
			telaCadastroRelatorios += 			"<td><b>Tabela</b></td>";
			telaCadastroRelatorios += 			"<td><b>Colunas</b></td>";
			telaCadastroRelatorios += 			"<td><b>Data Atualização</b></td>";
			telaCadastroRelatorios += 			"<td><b>Usuário</b></td>";
			telaCadastroRelatorios += 			"<td><b>Ativo</b></td>";
			telaCadastroRelatorios += 		"</tr>";
			telaCadastroRelatorios +=		tabelaViewBody;
			telaCadastroRelatorios += 	"</table>";
		}
		telaCadastroRelatorios += "</div>";
		$("#conteudoRelatorios").html(telaCadastroRelatorios);
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


function buscar_relatorios(){
	
	var id_relatorios = "";
	var tabela_relatorios = "";
	var colunas_relatorios = "";
	var data_atualizacao_relatorios = "";
	var usuario_id = "";
	var bool_ativo_relatorios = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroRelatorios = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var simOUnao = "";

	$("#conteudoCards").html("Carregando...");
	$.ajax({
		url:'app/controllers/funcoes_relatoriosController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_relatorios_filtro': true,
			'filtro': $("#pesquisa_relatorios").val()
		}
	}).done( function(data){

		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroRelatorios += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroRelatorios += "<br>";

			telaCadastroRelatorios += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_relatorios = subvetor[0];
				tabela_relatorios = subvetor[1];
				colunas_relatorios = subvetor[2];
				data_atualizacao_relatorios = subvetor[3];
				usuario_id = subvetor[4];
				bool_ativo_relatorios = subvetor[5];
				
				acumularFunctionId.push(id_relatorios);
				acumularFunctionCampo.push(usuario_id+"+usuario");

				if (bool_ativo_relatorios == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_relatorios' style='color: #f0ad4e;' data-id='"+id_relatorios+"' onclick='editar(this);' title='Editar' "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+tabela_relatorios+"</td>";
				tabelaViewBody += 			"<td>"+colunas_relatorios+"</td>";
				tabelaViewBody += 			"<td>"+formatarData(data_atualizacao_relatorios)+"</td>";
				tabelaViewBody += 			"<td><div id='usuario_"+parseInt(id_relatorios)+"'></div></td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_relatorios+"'>";
				tabelaViewBody += 				"<a href='#!relatorios' style='color: "+cor_ativo+"' data-id='"+id_relatorios+"' onclick=\"excluir(this , 'relatorios', "+bool_ativo_relatorios+")\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody += 		"</tr>";
			}
			telaCadastroRelatorios += 	"<table class='table'>";
			telaCadastroRelatorios += 		"<tr bgcolor='white'>";
			telaCadastroRelatorios += 			"<td><b>Editar</b></td>";
			telaCadastroRelatorios += 			"<td><b>Tabela</b></td>";
			telaCadastroRelatorios += 			"<td><b>Colunas</b></td>";
			telaCadastroRelatorios += 			"<td><b>Data Atualização</b></td>";
			telaCadastroRelatorios += 			"<td><b>Usuário</b></td>";
			telaCadastroRelatorios += 			"<td><b>Ativo</b></td>";
			telaCadastroRelatorios += 		"</tr>";
			telaCadastroRelatorios +=		tabelaViewBody;
			telaCadastroRelatorios += 	"</table>";
		}
		telaCadastroRelatorios += "</div>";
		$("#conteudoRelatorios").html(telaCadastroRelatorios);
		for (var i = acumularFunctionId.length - 1; i >= 0; i--) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i]);
		}
	});
}
