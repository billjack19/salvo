
$(document).ready(function(){
	zerarTabelaGrade();
	buscar_destaque_grupo();
});

function buscar_destaque_grupo(){
	
	var id_destaque_grupo = "";
	var titulo_destaque_grupo = "";
	var grupo_id = "";
	var imagem_destaque_grupo = "";
	var descricao_destaque_grupo = "";
	var configurar_site_id = "";
	var data_atualizacao_destaque_grupo = "";
	var bool_ativo_destaque_grupo = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroDestaque_grupo = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var numeroRegAtual = 1;
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	$("#conteudoDestaque_grupo").html("Carregando...");
	$.ajax({
		url:'app/controllers/funcoes_destaque_grupoController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_destaque_grupo': true,
			'filtro': $("#pesquisa_destaque_grupo").val()
		}
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroDestaque_grupo += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroDestaque_grupo += "<br>";

			telaCadastroDestaque_grupo += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_destaque_grupo = subvetor[0];
				titulo_destaque_grupo = subvetor[1];
				grupo_id = subvetor[2];
				imagem_destaque_grupo = subvetor[3];
				descricao_destaque_grupo = subvetor[4];
				configurar_site_id = subvetor[5];
				data_atualizacao_destaque_grupo = subvetor[6];
				bool_ativo_destaque_grupo = subvetor[7];
				
				acumularFunctionId.push(id_destaque_grupo);
				acumularFunctionCampo.push(grupo_id+"+grupo");
				acumularFunctionId.push(id_destaque_grupo);
				acumularFunctionCampo.push(configurar_site_id+"+configurar_site");

				if (bool_ativo_destaque_grupo == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_destaque_grupo' style='color: #f0ad4e;' data-id='"+id_destaque_grupo+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_destaque_grupo+"'>";
				tabelaViewBody += 				"<a href='#!destaque_grupo' style='color: "+cor_ativo+"' data-id='"+id_destaque_grupo+"' onclick=\"excluir(this , 'destaque_grupo', "+bool_ativo_destaque_grupo+", 'destaque_grupo')\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody +=			"<td align='center'>";
				tabelaViewBody +=				numeroRegAtual;
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+titulo_destaque_grupo+"</td>";
				tabelaViewBody += 			"<td><div id='grupo_"+parseInt(id_destaque_grupo)+"'></div></td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='app/upload/img/"+imagem_destaque_grupo+"' target='_blank'>";
				tabelaViewBody += 					"<img src='app/upload/img/"+imagem_destaque_grupo+"' style='max-height: 500px; max-width: 15%;'>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody += 			"</td>";
				tabelaViewBody += 			"<td>"+descricao_destaque_grupo+"</td>";
				tabelaViewBody += 			"<td><div id='configurar_site_"+parseInt(id_destaque_grupo)+"'></div></td>";
				tabelaViewBody += 		"</tr>";

				numeroRegAtual++;
				accesskeyEditar = "";
			}
			telaCadastroDestaque_grupo += 	"<table class='table'>";
			telaCadastroDestaque_grupo += 		"<tr bgcolor='white'>";
			telaCadastroDestaque_grupo += 			"<td><b>Editar</b></td>";
			telaCadastroDestaque_grupo += 			"<td><b>Ativo</b></td>";
			telaCadastroDestaque_grupo += 			"<td><b>N°</b></td>";
			telaCadastroDestaque_grupo += 			"<td><b>Titulo</b></td>";
			telaCadastroDestaque_grupo += 			"<td><b>Grupo</b></td>";
			telaCadastroDestaque_grupo += 			"<td><b>Imagem</b></td>";
			telaCadastroDestaque_grupo += 			"<td><b>Descrição</b></td>";
			telaCadastroDestaque_grupo += 			"<td><b>Configurar Site</b></td>";
			telaCadastroDestaque_grupo += 		"</tr>";
			telaCadastroDestaque_grupo +=		tabelaViewBody;
			telaCadastroDestaque_grupo += 	"</table>";
		}
		telaCadastroDestaque_grupo += "</div>";
		$("#conteudoDestaque_grupo").html(telaCadastroDestaque_grupo);
		for (var i = 0; i < acumularFunctionId.length; i++) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i], "");
		}
	});
}
