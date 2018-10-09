
$(document).ready(function(){
	
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
	var simOUnao = "";

	$.ajax({
		url:'app/controllers/funcoes_siteController.php',
		type: 'POST',
		dataType: 'text',
		data: { 'pequisa_site': true }
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split(",");
		if (subvetor[1] == undefined) {
			telaCadastroSite += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroSite += "<br>";

			telaCadastroSite += "<div class='bloco2'>";

			// var vetor = data.split("[]");
			// var subvetor = [];
			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(",");

				
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
				tabelaViewBody +=				"<a href='principal.php#!editar_site' style='color: #f0ad4e;' data-id='"+ID_SITE+"' onclick='editar(this);' title='Editar' "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+NOME_EMPRESA+"</td>";
				tabelaViewBody += 			"<td>"+NOME_CIDADE+"</td>";
				tabelaViewBody += 			"<td>"+ESTADO+"</td>";
				tabelaViewBody += 			"<td>"+FONE+"</td>";
				tabelaViewBody += 			"<td>"+FONE_APP+"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='#!site' style='color: "+cor_ativo+"' data-id='"+ID_SITE+"' onclick=\"excluir(this , 'site')\" title='Excluir'>";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody += 		"</tr>";
				// 	tabela_cliente += jk_tr("","",
				// 		  jk_td("left", razao_social)
				// 		+ jk_td("left", inscricao_federal)
				// 		+ jk_td("left", telefone)
				// 		+ jk_td("left", email)
				// 		// jk_td("left", "<td>Bairro</td>";
				// 		// jk_td("left", "<td>Cidade</td>";
				// 		// jk_td("left", "<td>UF</td>";
				// 		+ jk_td("left",  
				// 			jk_buttonComplemento("", "", "", "", "telaAdicionarCliente("+id_cliente+");", 
				// 				jk_icon("pencil"), "style='color:#f0ad4e;' "+desabilitar)
				// 		)
				// 		/* + jk_td("left",  
				// 			jk_buttonComplemento("", "", "", "", "chamarTelaLocalEntrega("+id_cliente+");", 
				// 				jk_icon("plus"), style='color:green;' "+desabilitar)
				// 		)*/
				// 		+ jk_td("center",  
				// 			jk_buttonComplemento("", "", "", "", "alteraAtivoCliente("+id_cliente+", "+valorAtivo+");", 
				// 				icone_ativo, "style='color:"+cor_ativo+"'")
				// 		)
				// 	);
			}
			telaCadastroSite += 	"<table class='table'>";
			telaCadastroSite += 		"<tr bgcolor='white'>";
			telaCadastroSite += 			"<td><b>Editar</b></td>";
			telaCadastroSite += 			"<td><b>NOME</b></td>";
			telaCadastroSite += 			"<td><b>NOME</b></td>";
			telaCadastroSite += 			"<td><b></b></td>";
			telaCadastroSite += 			"<td><b></b></td>";
			telaCadastroSite += 			"<td><b>FONE</b></td>";
			telaCadastroSite += 			"<td><b>Ativo</b></td>";
			telaCadastroSite += 		"</tr>";
			telaCadastroSite +=		tabelaViewBody;
			telaCadastroSite += 	"</table>";
			// 	telaCadastroSite += jk_table("table", "0",
			// 		jk_tr("","",
			// 			  jk_td("left", "Razão Social")
			// 			+ jk_td("left", "CPF/cnpj")
			// 			+ jk_td("left", "Telefone")
			// 			+ jk_td("left", "E-mail")
			// 			// jk_td("left", "<td>Bairro</td>";
			// 			// jk_td("left", "<td>Cidade</td>";
			// 			// jk_td("left", "<td>UF</td>";
			// 			+ jk_td("left", "Editar")
			// 			// + jk_td("left", "Interagir")
			// 			+ jk_td("center", "Ativo")
			// 		) + tabela_cliente
			// 	);
			// telaCadastroSite += "</div>";	
		}
		telaCadastroSite += "</div>";
		$("#conteudoSite").html(telaCadastroSite);
		for (var i = acumularFunctionId.length - 1; i >= 0; i--) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i]);
		}
		// montarComboBuscaCliente();
	});
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
		vetor = data.split(",");
		document.getElementById(tabelaEstrangeira+'_'+id).innerHTML = vetor[1];
	});
}

