
$(document).ready(function(){
	buscar_item_orcamento();
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



function buscar_item_orcamento(){
	
	var id_item_orcamento = "";
	var data_lanc_item_orcamento = "";
	var orcamento_id = "";
	var item_id = "";
	var quantidade_item_orcamento = "";
	var total_item_orcamento = "";
	var bool_ativo_item_orcamento = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroItem_orcamento = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var numeroRegAtual = 1;
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	var grades = document.getElementsByName("grade");
	var id_tabela_primaria = 0;
	for (var i = grades.length - 1; i >= 0; i--) {
		if ($(grades[i]).data("p") == "orcamento" && $(grades[i]).data("g") == "item_orcamento") {
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
		url:'app/controllers/funcoes_item_orcamentoController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_item_orcamento_grade': true,
			'filtro': $("#pesquisa_item_orcamento").val(),
			'tabela': "orcamento",
			'id': id_tabela_primaria
		}
	}).done( function(data){
		// _filtro_grade
		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroItem_orcamento += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroItem_orcamento += "<br>";

			telaCadastroItem_orcamento += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_item_orcamento = subvetor[0];
				data_lanc_item_orcamento = subvetor[1];
				orcamento_id = subvetor[2];
				item_id = subvetor[3];
				quantidade_item_orcamento = subvetor[4];
				total_item_orcamento = subvetor[5];
				bool_ativo_item_orcamento = subvetor[6];
				
				acumularFunctionId.push(id_item_orcamento);
				acumularFunctionCampo.push(item_id+"+item");

				if (bool_ativo_item_orcamento == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_grade_item_orcamento-orcamento' style='color: #f0ad4e;' data-id='"+id_item_orcamento+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_item_orcamento+"'>";
				tabelaViewBody += 				"<a href='#!grade_item_orcamento-orcamento' style='color: "+cor_ativo+"' data-id='"+id_item_orcamento+"' onclick=\"excluir(this , 'item_orcamento', "+bool_ativo_item_orcamento+", 'grade_item_orcamento-orcamento')\" title='Excluir'>";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody +=			"<td align='center'>";
				tabelaViewBody +=				numeroRegAtual;
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+formatarData(data_lanc_item_orcamento)+"</td>";
				tabelaViewBody += 			"<td><div id='item_"+parseInt(id_item_orcamento)+"'></div></td>";
				tabelaViewBody += 			"<td>"+quantidade_item_orcamento+"</td>";
				tabelaViewBody += 			"<td>"+total_item_orcamento+"</td>";
				tabelaViewBody += 		"</tr>";

				numeroRegAtual++;
				accesskeyEditar = "";
			}
			telaCadastroItem_orcamento += 	"<table class='table'>";
			telaCadastroItem_orcamento += 		"<tr bgcolor='white'>";
			telaCadastroItem_orcamento += 			"<td><b>Editar</b></td>";
			telaCadastroItem_orcamento += 			"<td><b>Ativo</b></td>";
			telaCadastroItem_orcamento += 			"<td><b>N°</b></td>";
			telaCadastroItem_orcamento += 			"<td><b>Data Lanc</b></td>";
			telaCadastroItem_orcamento += 			"<td><b>Item</b></td>";
			telaCadastroItem_orcamento += 			"<td><b>Quantidade</b></td>";
			telaCadastroItem_orcamento += 			"<td><b>Total</b></td>";
			telaCadastroItem_orcamento += 		"</tr>";
			telaCadastroItem_orcamento +=		tabelaViewBody;
			telaCadastroItem_orcamento += 	"</table>";
		}
		telaCadastroItem_orcamento += "</div>";
		$("#conteudoItem_orcamento").html(telaCadastroItem_orcamento);
		for (var i = acumularFunctionId.length - 1; i >= 0; i--) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i], "");
		}
		var botaoBoltarGrade = verificaGrade('orcamento', 'item_orcamento', 'Orçamento');
		$("#botaoVoltarGrade").html(botaoBoltarGrade);
	});
}