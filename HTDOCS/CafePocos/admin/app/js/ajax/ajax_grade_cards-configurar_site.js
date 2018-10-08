
$(document).ready(function(){
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
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	var grades = document.getElementsByName("grade");
	var id_tabela_primaria = 0;
	for (var i = grades.length - 1; i >= 0; i--) {
		if ($(grades[i]).data("p") == "configurar_site" && $(grades[i]).data("g") == "cards") {
			id_tabela_primaria = $(grades[i]).val();
			if (id_tabela_primaria == 0)
				window.location.assign("principal.php#!configurar_site");
			else {
				$.ajax({
					url:'app/controllers/funcoes_configurar_siteController.php',
					type: 'POST',
					dataType: 'text',
					data: {
						'pequisa_configurar_site_id': true,
						'id': id_tabela_primaria
					}
				}).done( function(data){
					// console.log("funcoes_configurar_siteController: "+data);
					vetor = data.split("{,}");
					document.getElementById('nomeConfigurar_site').innerHTML = vetor[1];
				});
			}
		}
	}


	$.ajax({
		url:'app/controllers/funcoes_cardsController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_cards_grade': true,
			'filtro': $("#pesquisa_cards").val(),
			'tabela': "configurar_site",
			'id': id_tabela_primaria
		}
	}).done( function(data){
		// _filtro_grade
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
				tabelaViewBody +=				"<a href='principal.php#!editar_grade_cards-configurar_site' style='color: #f0ad4e;' data-id='"+id_cards+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+titulo_cards+"</td>";
				tabelaViewBody += 			"<td>"+descricao_cards+"</td>";
				tabelaViewBody += 			"<td>"+imagem_cards+"</td>";
				tabelaViewBody += 			"<td>"+formatarData(data_atualizacao_cards)+"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_cards+"'>";
				tabelaViewBody += 				"<a href='#!grade_cards-configurar_site' style='color: "+cor_ativo+"' data-id='"+id_cards+"' onclick=\"excluir(this , 'cards', "+bool_ativo_cards+", 'grade_cards-configurar_site')\" title='Excluir'>";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody += 		"</tr>";

				accesskeyEditar = "";
			}
			telaCadastroCards += 	"<table class='table'>";
			telaCadastroCards += 		"<tr bgcolor='white'>";
			telaCadastroCards += 			"<td><b>Editar</b></td>";
			telaCadastroCards += 			"<td><b>Titulo</b></td>";
			telaCadastroCards += 			"<td><b>Descrição</b></td>";
			telaCadastroCards += 			"<td><b>Imagem</b></td>";
			telaCadastroCards += 			"<td><b>Data Atualização</b></td>";
			telaCadastroCards += 			"<td><b>Ativo</b></td>";
			telaCadastroCards += 		"</tr>";
			telaCadastroCards +=		tabelaViewBody;
			telaCadastroCards += 	"</table>";
		}
		telaCadastroCards += "</div>";
		$("#conteudoCards").html(telaCadastroCards);
		for (var i = acumularFunctionId.length - 1; i >= 0; i--) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i]);
		}
		var botaoBoltarGrade = verificaGrade('configurar_site', 'cards', 'Configurar Site');
		$("#botaoVoltarGrade").html(botaoBoltarGrade);
	});
}

