
$(document).ready(function(){
	zerarTabelaGrade();
	buscar_videos();
});

function buscar_videos(){
	
	var id_videos = "";
	var descricao_videos = "";
	var link_videos = "";
	var data_atualizacao_videos = "";
	var bool_ativo_videos = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroVideos = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var numeroRegAtual = 1;
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	$("#conteudoVideos").html("Carregando...");
	$.ajax({
		url:'app/controllers/funcoes_videosController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_videos': true,
			'filtro': $("#pesquisa_videos").val()
		}
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroVideos += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroVideos += "<br>";

			telaCadastroVideos += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_videos = subvetor[0];
				descricao_videos = subvetor[1];
				link_videos = subvetor[2];
				data_atualizacao_videos = subvetor[3];
				bool_ativo_videos = subvetor[4];
				

				if (bool_ativo_videos == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_videos' style='color: #f0ad4e;' data-id='"+id_videos+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_videos+"'>";
				tabelaViewBody += 				"<a href='#!videos' style='color: "+cor_ativo+"' data-id='"+id_videos+"' onclick=\"excluir(this , 'videos', "+bool_ativo_videos+", 'videos')\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody +=			"<td align='center'>";
				tabelaViewBody +=				numeroRegAtual;
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+descricao_videos+"</td>";
				tabelaViewBody += 			"<td>"+link_videos+"</td>";
				tabelaViewBody += 			"<td>"+formatarData(data_atualizacao_videos)+"</td>";
				tabelaViewBody += 		"</tr>";

				numeroRegAtual++;
				accesskeyEditar = "";
			}
			telaCadastroVideos += 	"<table class='table'>";
			telaCadastroVideos += 		"<tr bgcolor='white'>";
			telaCadastroVideos += 			"<td><b>Editar</b></td>";
			telaCadastroVideos += 			"<td><b>Ativo</b></td>";
			telaCadastroVideos += 			"<td><b>N°</b></td>";
			telaCadastroVideos += 			"<td><b>Descrição</b></td>";
			telaCadastroVideos += 			"<td><b>Link</b></td>";
			telaCadastroVideos += 			"<td><b>Data Atualização</b></td>";
			telaCadastroVideos += 		"</tr>";
			telaCadastroVideos +=		tabelaViewBody;
			telaCadastroVideos += 	"</table>";
		}
		telaCadastroVideos += "</div>";
		$("#conteudoVideos").html(telaCadastroVideos);
		for (var i = 0; i < acumularFunctionId.length; i++) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i], "");
		}
	});
}
