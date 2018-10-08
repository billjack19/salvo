
$(document).ready(function(){
	buscar_teste();
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


function buscar_teste(){
	
	var id_teste = "";
	var descricao_teste = "";
	var data_atualizacao_teste = "";
	var usuario_id = "";
	var bool_ativo_teste = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroTeste = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	$("#conteudoCards").html("Carregando...");
	$.ajax({
		url:'app/controllers/funcoes_testeController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_teste': true,
			'filtro': $("#pesquisa_teste").val()
		}
	}).done( function(data){
		// _filtro

		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroTeste += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroTeste += "<br>";

			telaCadastroTeste += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_teste = subvetor[0];
				descricao_teste = subvetor[1];
				data_atualizacao_teste = subvetor[2];
				usuario_id = subvetor[3];
				bool_ativo_teste = subvetor[4];
				
				acumularFunctionId.push(id_teste);
				acumularFunctionCampo.push(usuario_id+"+usuario");

				if (bool_ativo_teste == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_teste' style='color: #f0ad4e;' data-id='"+id_teste+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+descricao_teste+"</td>";
				tabelaViewBody += 			"<td>"+formatarData(data_atualizacao_teste)+"</td>";
				tabelaViewBody += 			"<td><div id='usuario_"+parseInt(id_teste)+"'></div></td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='principal.php#!grade_teste_grade-teste' style='color: green' data-id='"+id_teste+"' onclick=\"grade(this , 'teste', 'teste_grade')\" title='Teste Grade'>";
				tabelaViewBody += 					"<i class=\"fa fa-plus\" aria-hidden=\"true\"></i>";
				tabelaViewBody +=  				"</a>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_teste+"'>";
				tabelaViewBody += 				"<a href='#!teste' style='color: "+cor_ativo+"' data-id='"+id_teste+"' onclick=\"excluir(this , 'teste', "+bool_ativo_teste+", 'teste')\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody += 		"</tr>";

				accesskeyEditar = "";
			}
			telaCadastroTeste += 	"<table class='table'>";
			telaCadastroTeste += 		"<tr bgcolor='white'>";
			telaCadastroTeste += 			"<td><b>Editar</b></td>";
			telaCadastroTeste += 			"<td><b>Descrição</b></td>";
			telaCadastroTeste += 			"<td><b>Data Atualização</b></td>";
			telaCadastroTeste += 			"<td><b>Usuário</b></td>";
			telaCadastroTeste += 			"<td><b>Teste Grade</b></td>";
			telaCadastroTeste += 			"<td><b>Ativo</b></td>";
			telaCadastroTeste += 		"</tr>";
			telaCadastroTeste +=		tabelaViewBody;
			telaCadastroTeste += 	"</table>";
		}
		telaCadastroTeste += "</div>";
		$("#conteudoTeste").html(telaCadastroTeste);
		for (var i = acumularFunctionId.length - 1; i >= 0; i--) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i]);
		}
	});
}
