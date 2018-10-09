
$(document).ready(function(){
	
	var id_contato = "";
	var DT_CONTATO = "";
	var NOME_CONTATO = "";
	var EMAIL_CONTATO = "";
	var TELEFONE_CONTATO = "";
	var ASSUNTO_CONTATO = "";
	var MENSAGEM_CONTATO = "";
	var ARQUIVO_CONTATO = "";
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
				DT_CONTATO = subvetor[1];
				NOME_CONTATO = subvetor[2];
				EMAIL_CONTATO = subvetor[3];
				TELEFONE_CONTATO = subvetor[4];
				ASSUNTO_CONTATO = subvetor[5];
				MENSAGEM_CONTATO = subvetor[6];
				ARQUIVO_CONTATO = subvetor[7];
				bool_ativo_contato = subvetor[8];
				

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
				tabelaViewBody += 			"<td>"+formatarData(DT_CONTATO)+"</td>";
				tabelaViewBody += 			"<td>"+NOME_CONTATO+"</td>";
				tabelaViewBody += 			"<td>"+EMAIL_CONTATO+"</td>";
				tabelaViewBody += 			"<td>"+TELEFONE_CONTATO+"</td>";
				tabelaViewBody += 			"<td>"+ASSUNTO_CONTATO+"</td>";
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
			telaCadastroContato += 			"<td><b>DT</b></td>";
			telaCadastroContato += 			"<td><b>NOME</b></td>";
			telaCadastroContato += 			"<td><b>EMAIL</b></td>";
			telaCadastroContato += 			"<td><b>TELEFONE</b></td>";
			telaCadastroContato += 			"<td><b>ASSUNTO</b></td>";
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

