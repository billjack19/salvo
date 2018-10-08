
$(document).ready(function(){
	zerarTabelaGrade();
	buscar_cards();
});

function buscar_cards(){
	
	var id_cards = "";
	var titulo_cards = "";
	var descricao_cards = "";
	var imagem_cards = "";
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
				imagem_cards = subvetor[3];
				configurar_site_id = subvetor[4];
				data_atualizacao_cards = subvetor[5];
				bool_ativo_cards = subvetor[6];
				
				acumularFunctionId.push(id_cards);
				acumularFunctionCampo.push(configurar_site_id+"+configurar_site");

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
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='app/upload/img/"+imagem_cards+"' target='_blank'>";
				tabelaViewBody += 					"<img src='app/upload/img/"+imagem_cards+"' style='max-height: 500px; max-width: 15%;'>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody += 			"</td>";
				tabelaViewBody += 			"<td><div id='configurar_site_"+parseInt(id_cards)+"'></div></td>";
				tabelaViewBody += 			"<td>"+formatarData(data_atualizacao_cards)+"</td>";
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
			telaCadastroCards += 			"<td><b>Imagem</b></td>";
			telaCadastroCards += 			"<td><b>Configurar Site</b></td>";
			telaCadastroCards += 			"<td><b>Data Atualização</b></td>";
			telaCadastroCards += 		"</tr>";
			telaCadastroCards +=		tabelaViewBody;
			telaCadastroCards += 	"</table>";
		}
		telaCadastroCards += "</div>";
		$("#conteudoCards").html(telaCadastroCards);
		for (var i = 0; i < acumularFunctionId.length; i++) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i], "");
		}
	});
}
