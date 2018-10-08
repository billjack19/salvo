
$(document).ready(function(){
	zerarTabelaGrade();
	buscar_slide_show();
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


function buscar_slide_show(){
	
	var id_slide_show = "";
	var titulo_slide_show = "";
	var descricao_slide_show = "";
	var imagem_slide_show = "";
	var configurar_site_id = "";
	var data_atualizacao_slide_show = "";
	var bool_ativo_slide_show = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroSlide_show = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var numeroRegAtual = 1;
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	$("#conteudoSlide_show").html("Carregando...");
	$.ajax({
		url:'app/controllers/funcoes_slide_showController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_slide_show': true,
			'filtro': $("#pesquisa_slide_show").val()
		}
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroSlide_show += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroSlide_show += "<br>";

			telaCadastroSlide_show += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_slide_show = subvetor[0];
				titulo_slide_show = subvetor[1];
				descricao_slide_show = subvetor[2];
				imagem_slide_show = subvetor[3];
				configurar_site_id = subvetor[4];
				data_atualizacao_slide_show = subvetor[5];
				bool_ativo_slide_show = subvetor[6];
				
				acumularFunctionId.push(id_slide_show);
				acumularFunctionCampo.push(configurar_site_id+"+configurar_site");

				if (bool_ativo_slide_show == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_slide_show' style='color: #f0ad4e;' data-id='"+id_slide_show+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_slide_show+"'>";
				tabelaViewBody += 				"<a href='#!slide_show' style='color: "+cor_ativo+"' data-id='"+id_slide_show+"' onclick=\"excluir(this , 'slide_show', "+bool_ativo_slide_show+", 'slide_show')\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody +=			"<td align='center'>";
				tabelaViewBody +=				numeroRegAtual;
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+titulo_slide_show+"</td>";
				tabelaViewBody += 			"<td>"+descricao_slide_show+"</td>";
				tabelaViewBody += 			"<td>"+imagem_slide_show+"</td>";
				tabelaViewBody += 			"<td><div id='configurar_site_"+parseInt(id_slide_show)+"'></div></td>";
				tabelaViewBody += 			"<td>"+formatarData(data_atualizacao_slide_show)+"</td>";
				tabelaViewBody += 		"</tr>";

				numeroRegAtual++;
				accesskeyEditar = "";
			}
			telaCadastroSlide_show += 	"<table class='table'>";
			telaCadastroSlide_show += 		"<tr bgcolor='white'>";
			telaCadastroSlide_show += 			"<td><b>Editar</b></td>";
			telaCadastroSlide_show += 			"<td><b>Ativo</b></td>";
			telaCadastroSlide_show += 			"<td><b>N°</b></td>";
			telaCadastroSlide_show += 			"<td><b>Titulo</b></td>";
			telaCadastroSlide_show += 			"<td><b>Descrição</b></td>";
			telaCadastroSlide_show += 			"<td><b>Imagem</b></td>";
			telaCadastroSlide_show += 			"<td><b>Configurar Site</b></td>";
			telaCadastroSlide_show += 			"<td><b>Data Atualização</b></td>";
			telaCadastroSlide_show += 		"</tr>";
			telaCadastroSlide_show +=		tabelaViewBody;
			telaCadastroSlide_show += 	"</table>";
		}
		telaCadastroSlide_show += "</div>";
		$("#conteudoSlide_show").html(telaCadastroSlide_show);
		for (var i = 0; i < acumularFunctionId.length; i++) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i]);
		}
	});
}
