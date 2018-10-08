
$(document).ready(function(){
	buscar_grupo();
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


function buscar_grupo(){
	
	var id_grupo = "";
	var descricao_grupo = "";
	var data_atualizacao_grupo = "";
	var usuario_id = "";
	var bool_ativo_grupo = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroGrupo = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	$("#conteudoCards").html("Carregando...");
	$.ajax({
		url:'app/controllers/funcoes_grupoController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_grupo': true,
			'filtro': $("#pesquisa_grupo").val()
		}
	}).done( function(data){
		// _filtro

		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroGrupo += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroGrupo += "<br>";

			telaCadastroGrupo += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_grupo = subvetor[0];
				descricao_grupo = subvetor[1];
				data_atualizacao_grupo = subvetor[2];
				usuario_id = subvetor[3];
				bool_ativo_grupo = subvetor[4];
				
				acumularFunctionId.push(id_grupo);
				acumularFunctionCampo.push(usuario_id+"+usuario");

				if (bool_ativo_grupo == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_grupo' style='color: #f0ad4e;' data-id='"+id_grupo+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+descricao_grupo+"</td>";
				tabelaViewBody += 			"<td>"+formatarData(data_atualizacao_grupo)+"</td>";
				tabelaViewBody += 			"<td><div id='usuario_"+parseInt(id_grupo)+"'></div></td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_grupo+"'>";
				tabelaViewBody += 				"<a href='#!grupo' style='color: "+cor_ativo+"' data-id='"+id_grupo+"' onclick=\"excluir(this , 'grupo', "+bool_ativo_grupo+", 'grupo')\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody += 		"</tr>";

				accesskeyEditar = "";
			}
			telaCadastroGrupo += 	"<table class='table'>";
			telaCadastroGrupo += 		"<tr bgcolor='white'>";
			telaCadastroGrupo += 			"<td><b>Editar</b></td>";
			telaCadastroGrupo += 			"<td><b>Descrição</b></td>";
			telaCadastroGrupo += 			"<td><b>Data Atualização</b></td>";
			telaCadastroGrupo += 			"<td><b>Usuário</b></td>";
			telaCadastroGrupo += 			"<td><b>Ativo</b></td>";
			telaCadastroGrupo += 		"</tr>";
			telaCadastroGrupo +=		tabelaViewBody;
			telaCadastroGrupo += 	"</table>";
		}
		telaCadastroGrupo += "</div>";
		$("#conteudoGrupo").html(telaCadastroGrupo);
		for (var i = acumularFunctionId.length - 1; i >= 0; i--) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i]);
		}
	});
}
