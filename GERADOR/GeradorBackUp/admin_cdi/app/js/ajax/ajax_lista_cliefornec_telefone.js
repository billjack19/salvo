
$(document).ready(function(){
	zerarTabelaGrade();
	buscar_cliefornec_telefone();
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


function buscar_cliefornec_telefone(){
	
	var Cliente = "";
	var Sequencia = "";
	var Telefone = "";
	var EMail = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroCliefornec_telefone = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var numeroRegAtual = 1;
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	$("#conteudoCliefornec_telefone").html("Carregando...");
	$.ajax({
		url:'app/controllers/funcoes_cliefornec_telefoneController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_cliefornec_telefone': true,
			'filtro': $("#pesquisa_cliefornec_telefone").val()
		}
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroCliefornec_telefone += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroCliefornec_telefone += "<br>";

			telaCadastroCliefornec_telefone += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				Cliente = subvetor[0];
				Sequencia = subvetor[1];
				Telefone = subvetor[2];
				EMail = subvetor[3];
				

				if (bool_ativo_cliefornec_telefone == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_cliefornec_telefone' style='color: #f0ad4e;' data-id='"+Sequencia+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+Sequencia+"'>";
				tabelaViewBody += 				"<a href='#!cliefornec_telefone' style='color: "+cor_ativo+"' data-id='"+Sequencia+"' onclick=\"excluir(this , 'cliefornec_telefone', "+bool_ativo_cliefornec_telefone+", 'cliefornec_telefone')\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody +=			"<td align='center'>";
				tabelaViewBody +=				numeroRegAtual;
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+Telefone+"</td>";
				tabelaViewBody += 			"<td>"+EMail+"</td>";
				tabelaViewBody += 		"</tr>";

				numeroRegAtual++;
				accesskeyEditar = "";
			}
			telaCadastroCliefornec_telefone += 	"<table class='table'>";
			telaCadastroCliefornec_telefone += 		"<tr bgcolor='white'>";
			telaCadastroCliefornec_telefone += 			"<td><b>Editar</b></td>";
			telaCadastroCliefornec_telefone += 			"<td><b>Ativo</b></td>";
			telaCadastroCliefornec_telefone += 			"<td><b>N°</b></td>";
			telaCadastroCliefornec_telefone += 			"<td><b></b></td>";
			telaCadastroCliefornec_telefone += 			"<td><b></b></td>";
			telaCadastroCliefornec_telefone += 		"</tr>";
			telaCadastroCliefornec_telefone +=		tabelaViewBody;
			telaCadastroCliefornec_telefone += 	"</table>";
		}
		telaCadastroCliefornec_telefone += "</div>";
		$("#conteudoCliefornec_telefone").html(telaCadastroCliefornec_telefone);
		for (var i = 0; i < acumularFunctionId.length; i++) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i]);
		}
	});
}
