
$(document).ready(function(){
	zerarTabelaGrade();
	buscar_cards();
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


function buscar_cards(){
	
	var id_cards = "";
	var titulo_cards = "";
	var descricao_cards = "";
	var descricao_item_cards = "";
	var imagem_cards = "";
	var sequencia_cards = "";
	var configurar_site_id = "";
	var data_atualizacao_cards = "";
	var bool_ativo_cards = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroCards = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var numeroRegAtual = 1;
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	$("#conteudoCards").html("Carregando...");
	$.ajax({
		url:'app/controllers/funcoes_cardsController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_cards': true,
			'filtro': $("#pesquisa_cards").val()
		}
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroCards += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroCards += "<br>";

			telaCadastroCards += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_cards = subvetor[0];
				titulo_cards = subvetor[1];
				descricao_cards = subvetor[2];
				descricao_item_cards = subvetor[3];
				imagem_cards = subvetor[4];
				sequencia_cards = subvetor[5];
				configurar_site_id = subvetor[6];
				data_atualizacao_cards = subvetor[7];
				bool_ativo_cards = subvetor[8];
				

				if (bool_ativo_cards == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_cards' style='color: #f0ad4e;' data-id='"+id_cards+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_cards+"'>";
				tabelaViewBody += 				"<a href='#!cards' style='color: "+cor_ativo+"' data-id='"+id_cards+"' onclick=\"excluir(this , 'cards', "+bool_ativo_cards+", 'cards')\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody +=			"<td align='center'>";
				tabelaViewBody +=				numeroRegAtual;
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+titulo_cards+"</td>";
				tabelaViewBody += 			"<td>"+descricao_cards+"</td>";
				tabelaViewBody += 			"<td>"+descricao_item_cards+"</td>";
				tabelaViewBody += 			"<td>"+imagem_cards+"</td>";
				tabelaViewBody += 			"<td>"+sequencia_cards+"</td>";
				if($("#n_acs_topicos_cards_cards").val() == 1 || $("#n_acs_topicos_cards_cards").val() == "1") {
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='principal.php#!grade_topicos_cards-cards' style='color: green' data-id='"+id_cards+"' onclick=\"grade(this , 'cards', 'topicos_cards')\" title='Tópicos Cards'>";
				tabelaViewBody += 					"<i class=\"fa fa-plus\" aria-hidden=\"true\"></i>";
				tabelaViewBody +=  				"</a>";
				tabelaViewBody +=  			"</td>";
				}
				tabelaViewBody += 		"</tr>";

				numeroRegAtual++;
				accesskeyEditar = "";
			}
			telaCadastroCards += 	"<table class='table'>";
			telaCadastroCards += 		"<tr bgcolor='white'>";
			telaCadastroCards += 			"<td><b>Editar</b></td>";
			telaCadastroCards += 			"<td><b>Ativo</b></td>";
			telaCadastroCards += 			"<td><b>N°</b></td>";
			telaCadastroCards += 			"<td><b>Titulo</b></td>";
			telaCadastroCards += 			"<td><b>Descrição</b></td>";
			telaCadastroCards += 			"<td><b>Descrição Item</b></td>";
			telaCadastroCards += 			"<td><b>Imagem</b></td>";
			telaCadastroCards += 			"<td><b>Sequencia</b></td>";
			if($("#n_acs_topicos_cards_cards").val() == 1 || $("#n_acs_topicos_cards_cards").val() == "1") {
			telaCadastroCards += 			"<td><b>Tópicos Cards</b></td>";
			}
			telaCadastroCards += 		"</tr>";
			telaCadastroCards +=		tabelaViewBody;
			telaCadastroCards += 	"</table>";
		}
		telaCadastroCards += "</div>";
		$("#conteudoCards").html(telaCadastroCards);
		for (var i = 0; i < acumularFunctionId.length; i++) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i]);
		}
	});
}
