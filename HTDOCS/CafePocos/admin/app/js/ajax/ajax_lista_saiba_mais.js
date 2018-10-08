
$(document).ready(function(){
	buscar_saiba_mais();
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


function buscar_saiba_mais(){
	
	var id_saiba_mais = "";
	var descricao_saiba_mais = "";
	var usuario_id = "";
	var data_atualizacao_saiba_mais = "";
	var bool_ativo_saiba_mais = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroSaiba_mais = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	$("#conteudoCards").html("Carregando...");
	$.ajax({
		url:'app/controllers/funcoes_saiba_maisController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_saiba_mais': true,
			'filtro': $("#pesquisa_saiba_mais").val()
		}
	}).done( function(data){
		// _filtro

		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroSaiba_mais += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroSaiba_mais += "<br>";

			telaCadastroSaiba_mais += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_saiba_mais = subvetor[0];
				descricao_saiba_mais = subvetor[1];
				usuario_id = subvetor[2];
				data_atualizacao_saiba_mais = subvetor[3];
				bool_ativo_saiba_mais = subvetor[4];
				
				acumularFunctionId.push(id_saiba_mais);
				acumularFunctionCampo.push(usuario_id+"+usuario");

				if (bool_ativo_saiba_mais == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_saiba_mais' style='color: #f0ad4e;' data-id='"+id_saiba_mais+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+descricao_saiba_mais+"</td>";
				tabelaViewBody += 			"<td><div id='usuario_"+parseInt(id_saiba_mais)+"'></div></td>";
				tabelaViewBody += 			"<td>"+formatarData(data_atualizacao_saiba_mais)+"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='principal.php#!grade_adicional_site-saiba_mais' style='color: green' data-id='"+id_saiba_mais+"' onclick=\"grade(this , 'saiba_mais', 'adicional_site')\" title='Adicional Site'>";
				tabelaViewBody += 					"<i class=\"fa fa-plus\" aria-hidden=\"true\"></i>";
				tabelaViewBody +=  				"</a>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_saiba_mais+"'>";
				tabelaViewBody += 				"<a href='#!saiba_mais' style='color: "+cor_ativo+"' data-id='"+id_saiba_mais+"' onclick=\"excluir(this , 'saiba_mais', "+bool_ativo_saiba_mais+", 'saiba_mais')\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody += 		"</tr>";

				accesskeyEditar = "";
			}
			telaCadastroSaiba_mais += 	"<table class='table'>";
			telaCadastroSaiba_mais += 		"<tr bgcolor='white'>";
			telaCadastroSaiba_mais += 			"<td><b>Editar</b></td>";
			telaCadastroSaiba_mais += 			"<td><b>Descrição</b></td>";
			telaCadastroSaiba_mais += 			"<td><b>Usuário</b></td>";
			telaCadastroSaiba_mais += 			"<td><b>Data Atualização</b></td>";
			telaCadastroSaiba_mais += 			"<td><b>Adicional Site</b></td>";
			telaCadastroSaiba_mais += 			"<td><b>Ativo</b></td>";
			telaCadastroSaiba_mais += 		"</tr>";
			telaCadastroSaiba_mais +=		tabelaViewBody;
			telaCadastroSaiba_mais += 	"</table>";
		}
		telaCadastroSaiba_mais += "</div>";
		$("#conteudoSaiba_mais").html(telaCadastroSaiba_mais);
		for (var i = acumularFunctionId.length - 1; i >= 0; i--) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i]);
		}
	});
}
