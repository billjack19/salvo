
$(document).ready(function(){
	
	var id_upload_arq = "";
	var descricao_upload_arq = "";
	var tipo_upload_arq = "";
	var data_atualizacaoupload_arq = "";
	var bool_ativo_upload_arq = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroUpload_arq = "";
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
		url:'app/controllers/funcoes_upload_arqController.php',
		type: 'POST',
		dataType: 'text',
		data: { 'pequisa_upload_arq': true }
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroUpload_arq += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroUpload_arq += "<br>";

			telaCadastroUpload_arq += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_upload_arq = subvetor[0];
				descricao_upload_arq = subvetor[1];
				tipo_upload_arq = subvetor[2];
				data_atualizacaoupload_arq = subvetor[3];
				bool_ativo_upload_arq = subvetor[4];
				

				if (bool_ativo_upload_arq == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_upload_arq' style='color: #f0ad4e;' data-id='"+id_upload_arq+"' onclick='editar(this);' title='Editar' "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+descricao_upload_arq+"</td>";
				tabelaViewBody += 			"<td>"+tipo_upload_arq+"</td>";
				tabelaViewBody += 			"<td>"+formatarData(data_atualizacaoupload_arq)+"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_upload_arq+"'>";
				tabelaViewBody += 				"<a href='#!upload_arq' style='color: "+cor_ativo+"' data-id='"+id_upload_arq+"' onclick=\"excluir(this , 'upload_arq', "+bool_ativo_upload_arq+", '+upload_arq+')\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody += 		"</tr>";
			}
			telaCadastroUpload_arq += 	"<table class='table'>";
			telaCadastroUpload_arq += 		"<tr bgcolor='white'>";
			telaCadastroUpload_arq += 			"<td><b>Editar</b></td>";
			telaCadastroUpload_arq += 			"<td><b>Descrição</b></td>";
			telaCadastroUpload_arq += 			"<td><b>Tipo</b></td>";
			telaCadastroUpload_arq += 			"<td><b>Data</b></td>";
			telaCadastroUpload_arq += 			"<td><b>Ativo</b></td>";
			telaCadastroUpload_arq += 		"</tr>";
			telaCadastroUpload_arq +=		tabelaViewBody;
			telaCadastroUpload_arq += 	"</table>";
		}
		telaCadastroUpload_arq += "</div>";
		$("#conteudoUpload_arq").html(telaCadastroUpload_arq);
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


function buscar_upload_arq(){
	
	var id_upload_arq = "";
	var descricao_upload_arq = "";
	var tipo_upload_arq = "";
	var data_atualizacaoupload_arq = "";
	var bool_ativo_upload_arq = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroUpload_arq = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var simOUnao = "";

	$("#conteudoCards").html("Carregando...");
	$.ajax({
		url:'app/controllers/funcoes_upload_arqController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_upload_arq_filtro': true,
			'filtro': $("#pesquisa_upload_arq").val()
		}
	}).done( function(data){

		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroUpload_arq += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroUpload_arq += "<br>";

			telaCadastroUpload_arq += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_upload_arq = subvetor[0];
				descricao_upload_arq = subvetor[1];
				tipo_upload_arq = subvetor[2];
				data_atualizacaoupload_arq = subvetor[3];
				bool_ativo_upload_arq = subvetor[4];
				

				if (bool_ativo_upload_arq == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_upload_arq' style='color: #f0ad4e;' data-id='"+id_upload_arq+"' onclick='editar(this);' title='Editar' "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+descricao_upload_arq+"</td>";
				tabelaViewBody += 			"<td>"+tipo_upload_arq+"</td>";
				tabelaViewBody += 			"<td>"+formatarData(data_atualizacaoupload_arq)+"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_upload_arq+"'>";
				tabelaViewBody += 				"<a href='#!upload_arq' style='color: "+cor_ativo+"' data-id='"+id_upload_arq+"' onclick=\"excluir(this , 'upload_arq', "+bool_ativo_upload_arq+")\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody += 		"</tr>";
			}
			telaCadastroUpload_arq += 	"<table class='table'>";
			telaCadastroUpload_arq += 		"<tr bgcolor='white'>";
			telaCadastroUpload_arq += 			"<td><b>Editar</b></td>";
			telaCadastroUpload_arq += 			"<td><b>Descrição</b></td>";
			telaCadastroUpload_arq += 			"<td><b>Tipo</b></td>";
			telaCadastroUpload_arq += 			"<td><b>Data</b></td>";
			telaCadastroUpload_arq += 			"<td><b>Ativo</b></td>";
			telaCadastroUpload_arq += 		"</tr>";
			telaCadastroUpload_arq +=		tabelaViewBody;
			telaCadastroUpload_arq += 	"</table>";
		}
		telaCadastroUpload_arq += "</div>";
		$("#conteudoUpload_arq").html(telaCadastroUpload_arq);
		for (var i = acumularFunctionId.length - 1; i >= 0; i--) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i]);
		}
	});
}
