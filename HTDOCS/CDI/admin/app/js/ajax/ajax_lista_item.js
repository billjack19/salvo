
$(document).ready(function(){
	zerarTabelaGrade();
	buscar_item();
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


function buscar_item(){
	
	var id_item = "";
	var descricao_item = "";
	var descricao_site_item = "";
	var unidade_medida_item = "";
	var imagem_item = "";
	var grupo_id = "";
	var usuario_id = "";
	var bool_ativo_item = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroItem = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var numeroRegAtual = 1;
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	$("#conteudoItem").html("Carregando...");
	$.ajax({
		url:'app/controllers/funcoes_itemController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_item': true,
			'filtro': $("#pesquisa_item").val()
		}
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroItem += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroItem += "<br>";

			telaCadastroItem += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_item = subvetor[0];
				descricao_item = subvetor[1];
				descricao_site_item = subvetor[2];
				unidade_medida_item = subvetor[3];
				imagem_item = subvetor[4];
				grupo_id = subvetor[5];
				usuario_id = subvetor[6];
				bool_ativo_item = subvetor[7];
				
				acumularFunctionId.push(id_item);
				acumularFunctionCampo.push(grupo_id+"+grupo");

				if (bool_ativo_item == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_item' style='color: #f0ad4e;' data-id='"+id_item+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_item+"'>";
				tabelaViewBody += 				"<a href='#!item' style='color: "+cor_ativo+"' data-id='"+id_item+"' onclick=\"excluir(this , 'item', "+bool_ativo_item+", 'item')\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody +=			"<td align='center'>";
				tabelaViewBody +=				numeroRegAtual;
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+descricao_item+"</td>";
				tabelaViewBody += 			"<td>"+descricao_site_item+"</td>";
				tabelaViewBody += 			"<td>"+unidade_medida_item+"</td>";
				tabelaViewBody += 			"<td>"+imagem_item+"</td>";
				tabelaViewBody += 			"<td><div id='grupo_"+parseInt(id_item)+"'></div></td>";
				tabelaViewBody += 		"</tr>";

				numeroRegAtual++;
				accesskeyEditar = "";
			}
			telaCadastroItem += 	"<table class='table'>";
			telaCadastroItem += 		"<tr bgcolor='white'>";
			telaCadastroItem += 			"<td><b>Editar</b></td>";
			telaCadastroItem += 			"<td><b>Ativo</b></td>";
			telaCadastroItem += 			"<td><b>N°</b></td>";
			telaCadastroItem += 			"<td><b>Descrição</b></td>";
			telaCadastroItem += 			"<td><b>Descrição Site</b></td>";
			telaCadastroItem += 			"<td><b>Unidade Medida</b></td>";
			telaCadastroItem += 			"<td><b>Imagem</b></td>";
			telaCadastroItem += 			"<td><b>Grupo</b></td>";
			telaCadastroItem += 		"</tr>";
			telaCadastroItem +=		tabelaViewBody;
			telaCadastroItem += 	"</table>";
		}
		telaCadastroItem += "</div>";
		$("#conteudoItem").html(telaCadastroItem);
		for (var i = 0; i < acumularFunctionId.length; i++) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i]);
		}
	});
}
