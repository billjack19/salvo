
$(document).ready(function(){
	buscar_cliefornec();
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


function buscar_cliefornec(){
	
	var CODIGO = "";
	var CPF_CGC = "";
	var RAZAOSOCIAL = "";
	var NOMEFANTASIA = "";
	var senha_site = "";
	var bool_ativo_cliefornec = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroCliefornec = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	$("#conteudoCards").html("Carregando...");
	$.ajax({
		url:'app/controllers/funcoes_cliefornecController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_cliefornec': true,
			'filtro': $("#pesquisa_cliefornec").val()
		}
	}).done( function(data){
		// _filtro

		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroCliefornec += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroCliefornec += "<br>";

			telaCadastroCliefornec += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				CODIGO = subvetor[0];
				CPF_CGC = subvetor[1];
				RAZAOSOCIAL = subvetor[2];
				NOMEFANTASIA = subvetor[3];
				senha_site = subvetor[4];
				bool_ativo_cliefornec = subvetor[5];
				

				if (bool_ativo_cliefornec == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_cliefornec' style='color: #f0ad4e;' data-id='"+CODIGO+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+CPF_CGC+"</td>";
				tabelaViewBody += 			"<td>"+RAZAOSOCIAL+"</td>";
				tabelaViewBody += 			"<td>"+NOMEFANTASIA+"</td>";
				tabelaViewBody += 			"<td>"+senha_site+"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+CODIGO+"'>";
				tabelaViewBody += 				"<a href='#!cliefornec' style='color: "+cor_ativo+"' data-id='"+CODIGO+"' onclick=\"excluir(this , 'cliefornec', "+bool_ativo_cliefornec+", 'cliefornec')\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody += 		"</tr>";

				accesskeyEditar = "";
			}
			telaCadastroCliefornec += 	"<table class='table'>";
			telaCadastroCliefornec += 		"<tr bgcolor='white'>";
			telaCadastroCliefornec += 			"<td><b>Editar</b></td>";
			telaCadastroCliefornec += 			"<td><b>CPF</b></td>";
			telaCadastroCliefornec += 			"<td><b></b></td>";
			telaCadastroCliefornec += 			"<td><b></b></td>";
			telaCadastroCliefornec += 			"<td><b>Senha</b></td>";
			telaCadastroCliefornec += 			"<td><b>Ativo</b></td>";
			telaCadastroCliefornec += 		"</tr>";
			telaCadastroCliefornec +=		tabelaViewBody;
			telaCadastroCliefornec += 	"</table>";
		}
		telaCadastroCliefornec += "</div>";
		$("#conteudoCliefornec").html(telaCadastroCliefornec);
		for (var i = acumularFunctionId.length - 1; i >= 0; i--) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i]);
		}
	});
}
