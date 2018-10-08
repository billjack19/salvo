
$(document).ready(function(){
	zerarTabelaGrade();
	buscar_site();
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


function buscar_site(){
	
	var ID_SITE = "";
	var NOME_EMPRESA = "";
	var NOME_CIDADE = "";
	var ESTADO = "";
	var FONE = "";
	var FONE_APP = "";
	var EMAIL = "";
	var sendusername = "";
	var sendpassword = "";
	var smtpserver = "";
	var smtpserverport = "";
	var MailFrom = "";
	var MailTo = "";
	var MailCc = "";
	var bool_ativo_site = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroSite = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var numeroRegAtual = 1;
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	$("#conteudoSite").html("Carregando...");
	$.ajax({
		url:'app/controllers/funcoes_siteController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_site': true,
			'filtro': $("#pesquisa_site").val()
		}
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroSite += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroSite += "<br>";

			telaCadastroSite += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				ID_SITE = subvetor[0];
				NOME_EMPRESA = subvetor[1];
				NOME_CIDADE = subvetor[2];
				ESTADO = subvetor[3];
				FONE = subvetor[4];
				FONE_APP = subvetor[5];
				EMAIL = subvetor[6];
				sendusername = subvetor[7];
				sendpassword = subvetor[8];
				smtpserver = subvetor[9];
				smtpserverport = subvetor[10];
				MailFrom = subvetor[11];
				MailTo = subvetor[12];
				MailCc = subvetor[13];
				bool_ativo_site = subvetor[14];
				

				if (bool_ativo_site == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_site' style='color: #f0ad4e;' data-id='"+ID_SITE+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+ID_SITE+"'>";
				tabelaViewBody += 				"<a href='#!site' style='color: "+cor_ativo+"' data-id='"+ID_SITE+"' onclick=\"excluir(this , 'site', "+bool_ativo_site+", 'site')\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody +=			"<td align='center'>";
				tabelaViewBody +=				numeroRegAtual;
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+NOME_EMPRESA+"</td>";
				tabelaViewBody += 			"<td>"+NOME_CIDADE+"</td>";
				tabelaViewBody += 			"<td>"+ESTADO+"</td>";
				tabelaViewBody += 			"<td>"+FONE+"</td>";
				tabelaViewBody += 			"<td>"+FONE_APP+"</td>";
				tabelaViewBody += 		"</tr>";

				numeroRegAtual++;
				accesskeyEditar = "";
			}
			telaCadastroSite += 	"<table class='table'>";
			telaCadastroSite += 		"<tr bgcolor='white'>";
			telaCadastroSite += 			"<td><b>Editar</b></td>";
			telaCadastroSite += 			"<td><b>Ativo</b></td>";
			telaCadastroSite += 			"<td><b>N°</b></td>";
			telaCadastroSite += 			"<td><b>NOME</b></td>";
			telaCadastroSite += 			"<td><b>NOME</b></td>";
			telaCadastroSite += 			"<td><b></b></td>";
			telaCadastroSite += 			"<td><b></b></td>";
			telaCadastroSite += 			"<td><b>FONE</b></td>";
			telaCadastroSite += 		"</tr>";
			telaCadastroSite +=		tabelaViewBody;
			telaCadastroSite += 	"</table>";
		}
		telaCadastroSite += "</div>";
		$("#conteudoSite").html(telaCadastroSite);
		for (var i = 0; i < acumularFunctionId.length; i++) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i]);
		}
	});
}
