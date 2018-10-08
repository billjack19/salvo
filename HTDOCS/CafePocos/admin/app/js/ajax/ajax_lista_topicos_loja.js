
$(document).ready(function(){
	buscar_topicos_loja();
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


function buscar_topicos_loja(){
	
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
	var accesskeyEditar = " accesskey='w'";

	$("#conteudoCards").html("Carregando...");
	$.ajax({
		url:'app/controllers/funcoes_topicos_lojaController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_topicos_loja': true,
			'filtro': $("#pesquisa_topicos_loja").val()
		}
	}).done( function(data){
		// _filtro

		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroTopicos_loja += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroTopicos_loja += "<br>";

			telaCadastroTopicos_loja += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
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
				tabelaViewBody +=				"<a href='principal.php#!editar_topicos_loja' style='color: #f0ad4e;' data-id='"+id_topicos_loja+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+titulo_topicos_loja+"</td>";
				tabelaViewBody += 			"<td>"+descricao_topicos_loja+"</td>";
				tabelaViewBody += 			"<td><div id='loja_"+parseInt(id_topicos_loja)+"'></div></td>";
				tabelaViewBody += 			"<td>"+formatarData(data_atualizacao_topicos_loja)+"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_topicos_loja+"'>";
				tabelaViewBody += 				"<a href='#!topicos_loja' style='color: "+cor_ativo+"' data-id='"+id_topicos_loja+"' onclick=\"excluir(this , 'topicos_loja', "+bool_ativo_topicos_loja+", 'topicos_loja')\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody += 		"</tr>";

				accesskeyEditar = "";
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
		}
		telaCadastroTopicos_loja += "</div>";
		$("#conteudoTopicos_loja").html(telaCadastroTopicos_loja);
		for (var i = acumularFunctionId.length - 1; i >= 0; i--) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i]);
		}
	});
}
