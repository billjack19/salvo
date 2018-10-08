
$(document).ready(function(){
	buscar_orcamento();
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



function buscar_orcamento(){
	
	var id_orcamento = "";
	var descricao_orcamento = "";
	var cliente_site_id = "";
	var data_lanc_orcamento = "";
	var bool_ativo_orcamento = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroOrcamento = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var numeroRegAtual = 1;
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	var grades = document.getElementsByName("grade");
	var id_tabela_primaria = 0;
	for (var i = grades.length - 1; i >= 0; i--) {
		if ($(grades[i]).data("p") == "cliente_site" && $(grades[i]).data("g") == "orcamento") {
			id_tabela_primaria = $(grades[i]).val();
			if (id_tabela_primaria == 0)
				window.location.assign("principal.php#!cliente_site");
			else {
				$.ajax({
					url:'app/controllers/funcoes_cliente_siteController.php',
					type: 'POST',
					dataType: 'text',
					data: {
						'pequisa_cliente_site_id': true,
						'id': id_tabela_primaria
					}
				}).done( function(data){
					// console.log("funcoes_cliente_siteController: "+data);
					vetor = data.split("{,}");
					document.getElementById('nomeCliente_site').innerHTML = vetor[1];
				});
			}
		}
	}


	$.ajax({
		url:'app/controllers/funcoes_orcamentoController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_orcamento_grade': true,
			'filtro': $("#pesquisa_orcamento").val(),
			'tabela': "cliente_site",
			'id': id_tabela_primaria
		}
	}).done( function(data){
		// _filtro_grade
		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroOrcamento += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroOrcamento += "<br>";

			telaCadastroOrcamento += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_orcamento = subvetor[0];
				descricao_orcamento = subvetor[1];
				cliente_site_id = subvetor[2];
				data_lanc_orcamento = subvetor[3];
				bool_ativo_orcamento = subvetor[4];
				

				if (bool_ativo_orcamento == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_grade_orcamento-cliente_site' style='color: #f0ad4e;' data-id='"+id_orcamento+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_orcamento+"'>";
				tabelaViewBody += 				"<a href='#!grade_orcamento-cliente_site' style='color: "+cor_ativo+"' data-id='"+id_orcamento+"' onclick=\"excluir(this , 'orcamento', "+bool_ativo_orcamento+", 'grade_orcamento-cliente_site')\" title='Excluir'>";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody +=			"<td align='center'>";
				tabelaViewBody +=				numeroRegAtual;
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+descricao_orcamento+"</td>";
				tabelaViewBody += 			"<td>"+formatarData(data_lanc_orcamento)+"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='principal.php#!grade_item_orcamento-orcamento' style='color: green' data-id='"+id_orcamento+"' onclick=\"grade(this , 'orcamento', 'item_orcamento')\" title='Item Orçamento'>";
				tabelaViewBody += 					"<i class=\"fa fa-plus\" aria-hidden=\"true\"></i>";
				tabelaViewBody +=  				"</a>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody += 		"</tr>";

				numeroRegAtual++;
				accesskeyEditar = "";
			}
			telaCadastroOrcamento += 	"<table class='table'>";
			telaCadastroOrcamento += 		"<tr bgcolor='white'>";
			telaCadastroOrcamento += 			"<td><b>Editar</b></td>";
			telaCadastroOrcamento += 			"<td><b>Ativo</b></td>";
			telaCadastroOrcamento += 			"<td><b>N°</b></td>";
			telaCadastroOrcamento += 			"<td><b>Descrição</b></td>";
			telaCadastroOrcamento += 			"<td><b>Data Lanc</b></td>";
			telaCadastroOrcamento += 			"<td><b>Item Orçamento</b></td>";
			telaCadastroOrcamento += 		"</tr>";
			telaCadastroOrcamento +=		tabelaViewBody;
			telaCadastroOrcamento += 	"</table>";
		}
		telaCadastroOrcamento += "</div>";
		$("#conteudoOrcamento").html(telaCadastroOrcamento);
		for (var i = acumularFunctionId.length - 1; i >= 0; i--) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i], "");
		}
		var botaoBoltarGrade = verificaGrade('cliente_site', 'orcamento', 'Cliente Site');
		$("#botaoVoltarGrade").html(botaoBoltarGrade);
	});
}