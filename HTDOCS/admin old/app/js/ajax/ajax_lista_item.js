
$(document).ready(function(){
	
	var id_item = "";
	var descricao_item = "";
	var descricao_site_item = "";
	var unidade_medida_item = "";
	var imagem_item = "";
	var grupo_id = "";
	var usuario_id = "";
	var bool_ativo_item = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroItem = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var simOUnao = "";

	$.ajax({
		url:'app/controllers/funcoes_itemController.php',
		type: 'POST',
		dataType: 'text',
		data: { 'pequisa_item': true }
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split(",");
		if (subvetor[1] == undefined) {
			telaCadastroItem += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroItem += "<br>";

			telaCadastroItem += "<div class='bloco2'>";

			// var vetor = data.split("[]");
			// var subvetor = [];
			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(",");

				
				id_item = subvetor[0];
				descricao_item = subvetor[1];
				descricao_site_item = subvetor[2];
				unidade_medida_item = subvetor[3];
				imagem_item = subvetor[4];
				grupo_id = subvetor[5];
				usuario_id = subvetor[6];
				bool_ativo_item = subvetor[7];
				
				acumularFunctionId.push(id_item);
				acumularFunctionCampo.push(grupo_id+"+grupo");

				if (bool_ativo_item == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_item' style='color: #f0ad4e;' data-id='"+id_item+"' onclick='editar(this);' title='Editar' "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+descricao_item+"</td>";
				tabelaViewBody += 			"<td>"+descricao_site_item+"</td>";
				tabelaViewBody += 			"<td>"+unidade_medida_item+"</td>";
				tabelaViewBody += 			"<td>"+imagem_item+"</td>";
				tabelaViewBody += 			"<td><div id='grupo_"+parseInt(id_item)+"'></div></td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='#!item' style='color: "+cor_ativo+"' data-id='"+id_item+"' onclick=\"excluir(this , 'item')\" title='Excluir'>";
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
			telaCadastroItem += 	"<table class='table'>";
			telaCadastroItem += 		"<tr bgcolor='white'>";
			telaCadastroItem += 			"<td><b>Editar</b></td>";
			telaCadastroItem += 			"<td><b>Descrição</b></td>";
			telaCadastroItem += 			"<td><b>Descrição Site</b></td>";
			telaCadastroItem += 			"<td><b>Unidade Medida</b></td>";
			telaCadastroItem += 			"<td><b>Imagem</b></td>";
			telaCadastroItem += 			"<td><b>Grupo</b></td>";
			telaCadastroItem += 			"<td><b>Ativo</b></td>";
			telaCadastroItem += 		"</tr>";
			telaCadastroItem +=		tabelaViewBody;
			telaCadastroItem += 	"</table>";
			// 	telaCadastroItem += jk_table("table", "0",
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
			// telaCadastroItem += "</div>";	
		}
		telaCadastroItem += "</div>";
		$("#conteudoItem").html(telaCadastroItem);
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

