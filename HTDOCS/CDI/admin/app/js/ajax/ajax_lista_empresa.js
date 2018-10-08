
$(document).ready(function(){
	zerarTabelaGrade();
	buscar_empresa();
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


function buscar_empresa(){
	
	var id_empresa = "";
	var descricao_empresa = "";
	var imagem_logo_empresa = "";
	var data_atualizacao_empresa = "";
	var usuario_id = "";
	var bool_ativo_empresa = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroEmpresa = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var numeroRegAtual = 1;
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	$("#conteudoEmpresa").html("Carregando...");
	$.ajax({
		url:'app/controllers/funcoes_empresaController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_empresa': true,
			'filtro': $("#pesquisa_empresa").val()
		}
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroEmpresa += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroEmpresa += "<br>";

			telaCadastroEmpresa += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_empresa = subvetor[0];
				descricao_empresa = subvetor[1];
				imagem_logo_empresa = subvetor[2];
				data_atualizacao_empresa = subvetor[3];
				usuario_id = subvetor[4];
				bool_ativo_empresa = subvetor[5];
				
				acumularFunctionId.push(id_empresa);
				acumularFunctionCampo.push(usuario_id+"+usuario");

				if (bool_ativo_empresa == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_empresa' style='color: #f0ad4e;' data-id='"+id_empresa+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_empresa+"'>";
				tabelaViewBody += 				"<a href='#!empresa' style='color: "+cor_ativo+"' data-id='"+id_empresa+"' onclick=\"excluir(this , 'empresa', "+bool_ativo_empresa+", 'empresa')\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody +=			"<td align='center'>";
				tabelaViewBody +=				numeroRegAtual;
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+descricao_empresa+"</td>";
				tabelaViewBody += 			"<td>"+imagem_logo_empresa+"</td>";
				tabelaViewBody += 			"<td>"+formatarData(data_atualizacao_empresa)+"</td>";
				tabelaViewBody += 			"<td><div id='usuario_"+parseInt(id_empresa)+"'></div></td>";
				tabelaViewBody += 		"</tr>";

				numeroRegAtual++;
				accesskeyEditar = "";
			}
			telaCadastroEmpresa += 	"<table class='table'>";
			telaCadastroEmpresa += 		"<tr bgcolor='white'>";
			telaCadastroEmpresa += 			"<td><b>Editar</b></td>";
			telaCadastroEmpresa += 			"<td><b>Ativo</b></td>";
			telaCadastroEmpresa += 			"<td><b>N°</b></td>";
			telaCadastroEmpresa += 			"<td><b>Descrição</b></td>";
			telaCadastroEmpresa += 			"<td><b>Imagem Logo</b></td>";
			telaCadastroEmpresa += 			"<td><b>Data Atualização</b></td>";
			telaCadastroEmpresa += 			"<td><b>Usuário</b></td>";
			telaCadastroEmpresa += 		"</tr>";
			telaCadastroEmpresa +=		tabelaViewBody;
			telaCadastroEmpresa += 	"</table>";
		}
		telaCadastroEmpresa += "</div>";
		$("#conteudoEmpresa").html(telaCadastroEmpresa);
		for (var i = 0; i < acumularFunctionId.length; i++) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i]);
		}
	});
}
