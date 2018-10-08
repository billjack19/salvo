
$(document).ready(function(){
	buscar_topicos_cards();
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



function buscar_topicos_cards(){
	
	var id_topicos_cards = "";
	var descricao_topicos_cards = "";
	var cards_id = "";
	var data_atualizacao_topicos_cards = "";
	var usuario_id = "";
	var bool_ativo_topicos_cards = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroTopicos_cards = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var numeroRegAtual = 1;
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	var grades = document.getElementsByName("grade");
	var id_tabela_primaria = 0;
	for (var i = grades.length - 1; i >= 0; i--) {
		if ($(grades[i]).data("p") == "cards" && $(grades[i]).data("g") == "topicos_cards") {
			id_tabela_primaria = $(grades[i]).val();
			if (id_tabela_primaria == 0)
				window.location.assign("principal.php#!cards");
			else {
				$.ajax({
					url:'app/controllers/funcoes_cardsController.php',
					type: 'POST',
					dataType: 'text',
					data: {
						'pequisa_cards_id': true,
						'id': id_tabela_primaria
					}
				}).done( function(data){
					// console.log("funcoes_cardsController: "+data);
					vetor = data.split("{,}");
					document.getElementById('nomeCards').innerHTML = vetor[1];
				});
			}
		}
	}


	$.ajax({
		url:'app/controllers/funcoes_topicos_cardsController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_topicos_cards_grade': true,
			'filtro': $("#pesquisa_topicos_cards").val(),
			'tabela': "cards",
			'id': id_tabela_primaria
		}
	}).done( function(data){
		// _filtro_grade
		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroTopicos_cards += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroTopicos_cards += "<br>";

			telaCadastroTopicos_cards += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_topicos_cards = subvetor[0];
				descricao_topicos_cards = subvetor[1];
				cards_id = subvetor[2];
				data_atualizacao_topicos_cards = subvetor[3];
				usuario_id = subvetor[4];
				bool_ativo_topicos_cards = subvetor[5];
				
				acumularFunctionId.push(id_topicos_cards);
				acumularFunctionCampo.push(usuario_id+"+usuario");

				if (bool_ativo_topicos_cards == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_grade_topicos_cards-cards' style='color: #f0ad4e;' data-id='"+id_topicos_cards+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_topicos_cards+"'>";
				tabelaViewBody += 				"<a href='#!grade_topicos_cards-cards' style='color: "+cor_ativo+"' data-id='"+id_topicos_cards+"' onclick=\"excluir(this , 'topicos_cards', "+bool_ativo_topicos_cards+", 'grade_topicos_cards-cards')\" title='Excluir'>";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody +=			"<td align='center'>";
				tabelaViewBody +=				numeroRegAtual;
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+descricao_topicos_cards+"</td>";
				tabelaViewBody += 			"<td>"+formatarData(data_atualizacao_topicos_cards)+"</td>";
				tabelaViewBody += 			"<td><div id='usuario_"+parseInt(id_topicos_cards)+"'></div></td>";
				tabelaViewBody += 		"</tr>";

				numeroRegAtual++;
				accesskeyEditar = "";
			}
			telaCadastroTopicos_cards += 	"<table class='table'>";
			telaCadastroTopicos_cards += 		"<tr bgcolor='white'>";
			telaCadastroTopicos_cards += 			"<td><b>Editar</b></td>";
			telaCadastroTopicos_cards += 			"<td><b>Ativo</b></td>";
			telaCadastroTopicos_cards += 			"<td><b>N°</b></td>";
			telaCadastroTopicos_cards += 			"<td><b>Descrição</b></td>";
			telaCadastroTopicos_cards += 			"<td><b>Data Atualização</b></td>";
			telaCadastroTopicos_cards += 			"<td><b>Usuário</b></td>";
			telaCadastroTopicos_cards += 		"</tr>";
			telaCadastroTopicos_cards +=		tabelaViewBody;
			telaCadastroTopicos_cards += 	"</table>";
		}
		telaCadastroTopicos_cards += "</div>";
		$("#conteudoTopicos_cards").html(telaCadastroTopicos_cards);
		for (var i = acumularFunctionId.length - 1; i >= 0; i--) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i]);
		}
		var botaoBoltarGrade = verificaGrade('cards', 'topicos_cards', 'Cards');
		$("#botaoVoltarGrade").html(botaoBoltarGrade);
	});
}

