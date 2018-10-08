
$(document).ready(function(){
	zerarTabelaGrade();
	buscar_links_uteis();
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


function buscar_links_uteis(){
	
	var id_links_uteis = "";
	var descricao_links_uteis = "";
	var link_links_uteis = "";
	var data_atualizacao_links_uteis = "";
	var usuario_id = "";
	var bool_ativo_links_uteis = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroLinks_uteis = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var numeroRegAtual = 1;
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	$("#conteudoLinks_uteis").html("Carregando...");
	$.ajax({
		url:'app/controllers/funcoes_links_uteisController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_links_uteis': true,
			'filtro': $("#pesquisa_links_uteis").val()
		}
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroLinks_uteis += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroLinks_uteis += "<br>";

			telaCadastroLinks_uteis += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_links_uteis = subvetor[0];
				descricao_links_uteis = subvetor[1];
				link_links_uteis = subvetor[2];
				data_atualizacao_links_uteis = subvetor[3];
				usuario_id = subvetor[4];
				bool_ativo_links_uteis = subvetor[5];
				
				acumularFunctionId.push(id_links_uteis);
				acumularFunctionCampo.push(usuario_id+"+usuario");

				if (bool_ativo_links_uteis == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_links_uteis' style='color: #f0ad4e;' data-id='"+id_links_uteis+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_links_uteis+"'>";
				tabelaViewBody += 				"<a href='#!links_uteis' style='color: "+cor_ativo+"' data-id='"+id_links_uteis+"' onclick=\"excluir(this , 'links_uteis', "+bool_ativo_links_uteis+", 'links_uteis')\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody +=			"<td align='center'>";
				tabelaViewBody +=				numeroRegAtual;
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+descricao_links_uteis+"</td>";
				tabelaViewBody += 			"<td>"+link_links_uteis+"</td>";
				tabelaViewBody += 			"<td>"+formatarData(data_atualizacao_links_uteis)+"</td>";
				tabelaViewBody += 			"<td><div id='usuario_"+parseInt(id_links_uteis)+"'></div></td>";
				tabelaViewBody += 		"</tr>";

				numeroRegAtual++;
				accesskeyEditar = "";
			}
			telaCadastroLinks_uteis += 	"<table class='table'>";
			telaCadastroLinks_uteis += 		"<tr bgcolor='white'>";
			telaCadastroLinks_uteis += 			"<td><b>Editar</b></td>";
			telaCadastroLinks_uteis += 			"<td><b>Ativo</b></td>";
			telaCadastroLinks_uteis += 			"<td><b>N°</b></td>";
			telaCadastroLinks_uteis += 			"<td><b>Descrição</b></td>";
			telaCadastroLinks_uteis += 			"<td><b>Link</b></td>";
			telaCadastroLinks_uteis += 			"<td><b>Data Atualização</b></td>";
			telaCadastroLinks_uteis += 			"<td><b>Usuário</b></td>";
			telaCadastroLinks_uteis += 		"</tr>";
			telaCadastroLinks_uteis +=		tabelaViewBody;
			telaCadastroLinks_uteis += 	"</table>";
		}
		telaCadastroLinks_uteis += "</div>";
		$("#conteudoLinks_uteis").html(telaCadastroLinks_uteis);
		for (var i = 0; i < acumularFunctionId.length; i++) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i]);
		}
	});
}
