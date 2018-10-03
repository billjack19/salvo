
$(document).ready(function(){
	zerarTabelaGrade();
	buscar_lanc_preco();
});

function buscar_lanc_preco(){
	
	var id_lanc_preco = "";
	var supermercado_id = "";
	var item_id = "";
	var marca_id = "";
	var preco_lanc_preco = "";
	var data_atualizacao_lanc_preco = "";
	var usuario_id = "";
	var bool_ativo_lanc_preco = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroLanc_preco = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var numeroRegAtual = 1;
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	$("#conteudoLanc_preco").html("Carregando...");
	$.ajax({
		url:'app/controllers/funcoes_lanc_precoController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_lanc_preco': true,
			'filtro': $("#pesquisa_lanc_preco").val()
		}
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroLanc_preco += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroLanc_preco += "<br>";

			telaCadastroLanc_preco += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_lanc_preco = subvetor[0];
				supermercado_id = subvetor[1];
				item_id = subvetor[2];
				marca_id = subvetor[3];
				preco_lanc_preco = subvetor[4];
				data_atualizacao_lanc_preco = subvetor[5];
				usuario_id = subvetor[6];
				bool_ativo_lanc_preco = subvetor[7];
				
				acumularFunctionId.push(id_lanc_preco);
				acumularFunctionCampo.push(supermercado_id+"+supermercado");
				acumularFunctionId.push(id_lanc_preco);
				acumularFunctionCampo.push(item_id+"+item");
				acumularFunctionId.push(id_lanc_preco);
				acumularFunctionCampo.push(marca_id+"+marca");

				if (bool_ativo_lanc_preco == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_lanc_preco' style='color: #f0ad4e;' data-id='"+id_lanc_preco+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_lanc_preco+"'>";
				tabelaViewBody += 				"<a href='#!lanc_preco' style='color: "+cor_ativo+"' data-id='"+id_lanc_preco+"' onclick=\"excluir(this , 'lanc_preco', "+bool_ativo_lanc_preco+", 'lanc_preco')\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody +=			"<td align='center'>";
				tabelaViewBody +=				numeroRegAtual;
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td><div id='supermercado_"+parseInt(id_lanc_preco)+"'></div></td>";
				tabelaViewBody += 			"<td><div id='item_"+parseInt(id_lanc_preco)+"'></div></td>";
				tabelaViewBody += 			"<td><div id='marca_"+parseInt(id_lanc_preco)+"'></div></td>";
				tabelaViewBody += 			"<td>"+preco_lanc_preco+"</td>";
				tabelaViewBody += 			"<td>"+formatarData(data_atualizacao_lanc_preco)+"</td>";
				tabelaViewBody += 		"</tr>";

				numeroRegAtual++;
				accesskeyEditar = "";
			}
			telaCadastroLanc_preco += 	"<table class='table'>";
			telaCadastroLanc_preco += 		"<tr bgcolor='white'>";
			telaCadastroLanc_preco += 			"<td><b>Editar</b></td>";
			telaCadastroLanc_preco += 			"<td><b>Ativo</b></td>";
			telaCadastroLanc_preco += 			"<td><b>N°</b></td>";
			telaCadastroLanc_preco += 			"<td><b>Supermercado</b></td>";
			telaCadastroLanc_preco += 			"<td><b>Item</b></td>";
			telaCadastroLanc_preco += 			"<td><b>Marca</b></td>";
			telaCadastroLanc_preco += 			"<td><b>Preço</b></td>";
			telaCadastroLanc_preco += 			"<td><b>Data Atualização</b></td>";
			telaCadastroLanc_preco += 		"</tr>";
			telaCadastroLanc_preco +=		tabelaViewBody;
			telaCadastroLanc_preco += 	"</table>";
		}
		telaCadastroLanc_preco += "</div>";
		$("#conteudoLanc_preco").html(telaCadastroLanc_preco);
		for (var i = 0; i < acumularFunctionId.length; i++) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i], "");
		}
	});
}
