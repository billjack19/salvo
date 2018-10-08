
$(document).ready(function(){
	buscar_loja();
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


function buscar_loja(){
	
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
	var accesskeyEditar = " accesskey='w'";

	$("#conteudoCards").html("Carregando...");
	$.ajax({
		url:'app/controllers/funcoes_lojaController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_loja': true,
			'filtro': $("#pesquisa_loja").val()
		}
	}).done( function(data){
		// _filtro

		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroLoja += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroLoja += "<br>";

			telaCadastroLoja += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_loja = subvetor[0];
				titulo_loja = subvetor[1];
				descricao_loja = subvetor[2];
				imagem_loja = subvetor[3];
				configurar_site_id = subvetor[4];
				data_atualizacao_loja = subvetor[5];
				bool_ativo_loja = subvetor[6];
				
				acumularFunctionId.push(id_loja);
				acumularFunctionCampo.push(configurar_site_id+"+configurar_site");

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
				tabelaViewBody +=				"<a href='principal.php#!editar_loja' style='color: #f0ad4e;' data-id='"+id_loja+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+titulo_loja+"</td>";
				tabelaViewBody += 			"<td>"+descricao_loja+"</td>";
				tabelaViewBody += 			"<td>"+imagem_loja+"</td>";
				tabelaViewBody += 			"<td><div id='configurar_site_"+parseInt(id_loja)+"'></div></td>";
				tabelaViewBody += 			"<td>"+formatarData(data_atualizacao_loja)+"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_loja+"'>";
				tabelaViewBody += 				"<a href='#!loja' style='color: "+cor_ativo+"' data-id='"+id_loja+"' onclick=\"excluir(this , 'loja', "+bool_ativo_loja+", 'loja')\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody += 		"</tr>";

				accesskeyEditar = "";
			}
			telaCadastroLoja += 	"<table class='table'>";
			telaCadastroLoja += 		"<tr bgcolor='white'>";
			telaCadastroLoja += 			"<td><b>Editar</b></td>";
			telaCadastroLoja += 			"<td><b>Titulo</b></td>";
			telaCadastroLoja += 			"<td><b>Descrição</b></td>";
			telaCadastroLoja += 			"<td><b>Imagem</b></td>";
			telaCadastroLoja += 			"<td><b>Configurar Site</b></td>";
			telaCadastroLoja += 			"<td><b>Data Atualização</b></td>";
			telaCadastroLoja += 			"<td><b>Ativo</b></td>";
			telaCadastroLoja += 		"</tr>";
			telaCadastroLoja +=		tabelaViewBody;
			telaCadastroLoja += 	"</table>";
		}
		telaCadastroLoja += "</div>";
		$("#conteudoLoja").html(telaCadastroLoja);
		for (var i = acumularFunctionId.length - 1; i >= 0; i--) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i]);
		}
	});
}
