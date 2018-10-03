
$(document).ready(function(){
	buscar_orcamento_item();
});

/*function setarValorEstrangeiroLista(id, tabelaEstrangeira){
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
}*/



function buscar_orcamento_item(){
	
	var id_orcamento_item = "";
	var supermercado_id = "";
	var item_id = "";
	var marca_id = "";
	var quantidade_orcamento_item = "";
	var preco_orcamento_item = "";
	var total_orcamento_item = "";
	var orcamento_id = "";
	var data_atualizacao_orcamento_item = "";
	var usuario_id = "";
	var bool_ativo_orcamento_item = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroOrcamento_item = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var numeroRegAtual = 1;
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	var grades = document.getElementsByName("grade");
	var id_tabela_primaria = 0;
	for (var i = grades.length - 1; i >= 0; i--) {
		if ($(grades[i]).data("p") == "orcamento" && $(grades[i]).data("g") == "orcamento_item") {
			id_tabela_primaria = $(grades[i]).val();
			if (id_tabela_primaria == 0)
				window.location.assign("principal.php#!orcamento");
			else {
				$.ajax({
					url:'app/controllers/funcoes_orcamentoController.php',
					type: 'POST',
					dataType: 'text',
					data: {
						'pequisa_orcamento_id': true,
						'id': id_tabela_primaria
					}
				}).done( function(data){
					// console.log("funcoes_orcamentoController: "+data);
					vetor = data.split("{,}");
					document.getElementById('nomeOrcamento').innerHTML = vetor[1];
				});
			}
		}
	}


	$.ajax({
		url:'app/controllers/funcoes_orcamento_itemController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_orcamento_item_grade': true,
			'filtro': $("#pesquisa_orcamento_item").val(),
			'tabela': "orcamento",
			'id': id_tabela_primaria
		}
	}).done( function(data){
		// _filtro_grade
		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroOrcamento_item += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroOrcamento_item += "<br>";

			telaCadastroOrcamento_item += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_orcamento_item = subvetor[0];
				supermercado_id = subvetor[1];
				item_id = subvetor[2];
				marca_id = subvetor[3];
				quantidade_orcamento_item = subvetor[4];
				preco_orcamento_item = subvetor[5];
				total_orcamento_item = subvetor[6];
				orcamento_id = subvetor[7];
				data_atualizacao_orcamento_item = subvetor[8];
				usuario_id = subvetor[9];
				bool_ativo_orcamento_item = subvetor[10];
				
				acumularFunctionId.push(id_orcamento_item);
				acumularFunctionCampo.push(supermercado_id+"+supermercado");
				acumularFunctionId.push(id_orcamento_item);
				acumularFunctionCampo.push(item_id+"+item");
				acumularFunctionId.push(id_orcamento_item);
				acumularFunctionCampo.push(marca_id+"+marca");

				if (bool_ativo_orcamento_item == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_grade_orcamento_item-orcamento' style='color: #f0ad4e;' data-id='"+id_orcamento_item+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_orcamento_item+"'>";
				tabelaViewBody += 				"<a href='#!grade_orcamento_item-orcamento' style='color: "+cor_ativo+"' data-id='"+id_orcamento_item+"' onclick=\"excluir(this , 'orcamento_item', "+bool_ativo_orcamento_item+", 'grade_orcamento_item-orcamento')\" title='Excluir'>";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody +=			"<td align='center'>";
				tabelaViewBody +=				numeroRegAtual;
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td><div id='supermercado_"+parseInt(id_orcamento_item)+"'></div></td>";
				tabelaViewBody += 			"<td><div id='item_"+parseInt(id_orcamento_item)+"'></div></td>";
				tabelaViewBody += 			"<td><div id='marca_"+parseInt(id_orcamento_item)+"'></div></td>";
				tabelaViewBody += 			"<td>"+quantidade_orcamento_item+"</td>";
				tabelaViewBody += 			"<td>"+preco_orcamento_item+"</td>";
				tabelaViewBody += 		"</tr>";

				numeroRegAtual++;
				accesskeyEditar = "";
			}
			telaCadastroOrcamento_item += 	"<table class='table'>";
			telaCadastroOrcamento_item += 		"<tr bgcolor='white'>";
			telaCadastroOrcamento_item += 			"<td><b>Editar</b></td>";
			telaCadastroOrcamento_item += 			"<td><b>Ativo</b></td>";
			telaCadastroOrcamento_item += 			"<td><b>N°</b></td>";
			telaCadastroOrcamento_item += 			"<td><b>Supermercado</b></td>";
			telaCadastroOrcamento_item += 			"<td><b>Item</b></td>";
			telaCadastroOrcamento_item += 			"<td><b>Marca</b></td>";
			telaCadastroOrcamento_item += 			"<td><b>Quantidade</b></td>";
			telaCadastroOrcamento_item += 			"<td><b>Preço</b></td>";
			telaCadastroOrcamento_item += 		"</tr>";
			telaCadastroOrcamento_item +=		tabelaViewBody;
			telaCadastroOrcamento_item += 	"</table>";
		}
		telaCadastroOrcamento_item += "</div>";
		$("#conteudoOrcamento_item").html(telaCadastroOrcamento_item);
		for (var i = acumularFunctionId.length - 1; i >= 0; i--) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i], "");
		}
		var botaoBoltarGrade = verificaGrade('orcamento', 'orcamento_item', 'Orçamento');
		$("#botaoVoltarGrade").html(botaoBoltarGrade);
	});
}