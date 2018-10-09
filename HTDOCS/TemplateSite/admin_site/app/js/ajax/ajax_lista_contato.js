
$(document).ready(function(){
	
	var id_contato = "";
	var NOME_EMPRESA_contato = "";
	var NOME_CIDADE_contato = "";
	var ESTADO_contato = "";
	var FONE_contato = "";
	var FONE_APP_contato = "";
	var EMAIL_contato = "";
	var sendusername_contato = "";
	var sendpassword_contato = "";
	var smtpserver_contato = "";
	var smtpserverport_contato = "";
	var MailFrom_contato = "";
	var MailTo_contato = "";
	var MailCc_contato = "";
	var data_atualizacao_contato = "";
	var bool_ativo_contato = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroContato = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var simOUnao = "";

	$.ajax({
		url:'app/controllers/funcoes_contatoController.php',
		type: 'POST',
		dataType: 'text',
		data: { 'pequisa_contato': true }
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split(",");
		if (subvetor[1] == undefined) {
			telaCadastroContato += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroContato += "<br>";

			telaCadastroContato += "<div class='bloco2'>";

			// var vetor = data.split("[]");
			// var subvetor = [];
			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(",");

				
				id_contato = subvetor[0];
				NOME_EMPRESA_contato = subvetor[1];
				NOME_CIDADE_contato = subvetor[2];
				ESTADO_contato = subvetor[3];
				FONE_contato = subvetor[4];
				FONE_APP_contato = subvetor[5];
				EMAIL_contato = subvetor[6];
				sendusername_contato = subvetor[7];
				sendpassword_contato = subvetor[8];
				smtpserver_contato = subvetor[9];
				smtpserverport_contato = subvetor[10];
				MailFrom_contato = subvetor[11];
				MailTo_contato = subvetor[12];
				MailCc_contato = subvetor[13];
				data_atualizacao_contato = subvetor[14];
				bool_ativo_contato = subvetor[15];
				

				if (bool_ativo_contato == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_contato' style='color: #f0ad4e;' data-id='"+id_contato+"' onclick='editar(this);' title='Editar' "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+NOME_EMPRESA_contato+"</td>";
				tabelaViewBody += 			"<td>"+NOME_CIDADE_contato+"</td>";
				tabelaViewBody += 			"<td>"+ESTADO_contato+"</td>";
				tabelaViewBody += 			"<td>"+FONE_contato+"</td>";
				tabelaViewBody += 			"<td>"+FONE_APP_contato+"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='#!contato' style='color: "+cor_ativo+"' data-id='"+id_contato+"' onclick=\"excluir(this , 'contato')\" title='Excluir'>";
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
			telaCadastroContato += 	"<table class='table'>";
			telaCadastroContato += 		"<tr bgcolor='white'>";
			telaCadastroContato += 			"<td><b>Editar</b></td>";
			telaCadastroContato += 			"<td><b>NOME EMPRESA</b></td>";
			telaCadastroContato += 			"<td><b>NOME CIDADE</b></td>";
			telaCadastroContato += 			"<td><b>ESTADO</b></td>";
			telaCadastroContato += 			"<td><b>FONE</b></td>";
			telaCadastroContato += 			"<td><b>FONE APP</b></td>";
			telaCadastroContato += 			"<td><b>Ativo</b></td>";
			telaCadastroContato += 		"</tr>";
			telaCadastroContato +=		tabelaViewBody;
			telaCadastroContato += 	"</table>";
			// 	telaCadastroContato += jk_table("table", "0",
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
			// telaCadastroContato += "</div>";	
		}
		telaCadastroContato += "</div>";
		$("#conteudoContato").html(telaCadastroContato);
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

