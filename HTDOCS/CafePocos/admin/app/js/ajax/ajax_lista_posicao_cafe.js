
$(document).ready(function(){
	buscar_posicao_cafe();
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


function buscar_posicao_cafe(){
	
	var id_posicao_cafe = "";
	var cliente = "";
	var fazenda = "";
	var cidade = "";
	var insc_est = "";
	var safra = "";
	var lote = "";
	var lote_cliente = "";
	var entrada = "";
	var nfe_fiscal = "";
	var padrao = "";
	var preparo = "";
	var kilos = "";
	var sacas = "";
	var per_umi = "";
	var per_imp = "";
	var per_cat = "";
	var per_def = "";
	var cert = "";
	var data_atualizacao = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroPosicao_cafe = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	$("#conteudoCards").html("Carregando...");
	$.ajax({
		url:'app/controllers/funcoes_posicao_cafeController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_posicao_cafe': true,
			'filtro': $("#pesquisa_posicao_cafe").val()
		}
	}).done( function(data){
		// _filtro

		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroPosicao_cafe += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroPosicao_cafe += "<br>";

			telaCadastroPosicao_cafe += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_posicao_cafe = subvetor[0];
				cliente = subvetor[1];
				fazenda = subvetor[2];
				cidade = subvetor[3];
				insc_est = subvetor[4];
				safra = subvetor[5];
				lote = subvetor[6];
				lote_cliente = subvetor[7];
				entrada = subvetor[8];
				nfe_fiscal = subvetor[9];
				padrao = subvetor[10];
				preparo = subvetor[11];
				kilos = subvetor[12];
				sacas = subvetor[13];
				per_umi = subvetor[14];
				per_imp = subvetor[15];
				per_cat = subvetor[16];
				per_def = subvetor[17];
				cert = subvetor[18];
				data_atualizacao = subvetor[19];
				

				if (bool_ativo_posicao_cafe == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_posicao_cafe' style='color: #f0ad4e;' data-id='"+id_posicao_cafe+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+cliente+"</td>";
				tabelaViewBody += 			"<td>"+fazenda+"</td>";
				tabelaViewBody += 			"<td>"+cidade+"</td>";
				tabelaViewBody += 			"<td>"+insc_est+"</td>";
				tabelaViewBody += 			"<td>"+safra+"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_posicao_cafe+"'>";
				tabelaViewBody += 				"<a href='#!posicao_cafe' style='color: "+cor_ativo+"' data-id='"+id_posicao_cafe+"' onclick=\"excluir(this , 'posicao_cafe', "+bool_ativo_posicao_cafe+", 'posicao_cafe')\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody += 		"</tr>";

				accesskeyEditar = "";
			}
			telaCadastroPosicao_cafe += 	"<table class='table'>";
			telaCadastroPosicao_cafe += 		"<tr bgcolor='white'>";
			telaCadastroPosicao_cafe += 			"<td><b>Editar</b></td>";
			telaCadastroPosicao_cafe += 			"<td><b></b></td>";
			telaCadastroPosicao_cafe += 			"<td><b></b></td>";
			telaCadastroPosicao_cafe += 			"<td><b></b></td>";
			telaCadastroPosicao_cafe += 			"<td><b></b></td>";
			telaCadastroPosicao_cafe += 			"<td><b></b></td>";
			telaCadastroPosicao_cafe += 			"<td><b>Ativo</b></td>";
			telaCadastroPosicao_cafe += 		"</tr>";
			telaCadastroPosicao_cafe +=		tabelaViewBody;
			telaCadastroPosicao_cafe += 	"</table>";
		}
		telaCadastroPosicao_cafe += "</div>";
		$("#conteudoPosicao_cafe").html(telaCadastroPosicao_cafe);
		for (var i = acumularFunctionId.length - 1; i >= 0; i--) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i]);
		}
	});
}
