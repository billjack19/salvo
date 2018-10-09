
$(document).ready(function(){
	
	var id_destaque_grupo = "";
	var titulo_destaque_grupo = "";
	var grupo_id = "";
	var imagem_destaque_grupo = "";
	var descricao_destaque_grupo = "";
	var configurar_site_id = "";
	var data_atualizacao_destaque_grupo = "";
	var bool_ativo_destaque_grupo = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroDestaque_grupo = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var simOUnao = "";

	$.ajax({
		url:'app/controllers/funcoes_destaque_grupoController.php',
		type: 'POST',
		dataType: 'text',
		data: { 'pequisa_destaque_grupo': true }
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split(",");
		if (subvetor[1] == undefined) {
			telaCadastroDestaque_grupo += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroDestaque_grupo += "<br>";

			telaCadastroDestaque_grupo += "<div class='bloco2'>";

			// var vetor = data.split("[]");
			// var subvetor = [];
			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(",");

				
				id_destaque_grupo = subvetor[0];
				titulo_destaque_grupo = subvetor[1];
				grupo_id = subvetor[2];
				imagem_destaque_grupo = subvetor[3];
				descricao_destaque_grupo = subvetor[4];
				configurar_site_id = subvetor[5];
				data_atualizacao_destaque_grupo = subvetor[6];
				bool_ativo_destaque_grupo = subvetor[7];
				
				acumularFunctionId.push(id_destaque_grupo);
				acumularFunctionCampo.push(grupo_id+"+grupo");
				acumularFunctionId.push(id_destaque_grupo);
				acumularFunctionCampo.push(configurar_site_id+"+configurar_site");

				if (bool_ativo_destaque_grupo == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_destaque_grupo' style='color: #f0ad4e;' data-id='"+id_destaque_grupo+"' onclick='editar(this);' title='Editar' "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+titulo_destaque_grupo+"</td>";
				tabelaViewBody += 			"<td><div id='grupo_"+parseInt(id_destaque_grupo)+"'></div></td>";
				tabelaViewBody += 			"<td>"+imagem_destaque_grupo+"</td>";
				tabelaViewBody += 			"<td>"+descricao_destaque_grupo+"</td>";
				tabelaViewBody += 			"<td><div id='configurar_site_"+parseInt(id_destaque_grupo)+"'></div></td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='#!destaque_grupo' style='color: "+cor_ativo+"' data-id='"+id_destaque_grupo+"' onclick=\"excluir(this , 'destaque_grupo')\" title='Excluir'>";
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
			telaCadastroDestaque_grupo += 	"<table class='table'>";
			telaCadastroDestaque_grupo += 		"<tr bgcolor='white'>";
			telaCadastroDestaque_grupo += 			"<td><b>Editar</b></td>";
			telaCadastroDestaque_grupo += 			"<td><b>Titulo</b></td>";
			telaCadastroDestaque_grupo += 			"<td><b>Grupo</b></td>";
			telaCadastroDestaque_grupo += 			"<td><b>Imagem</b></td>";
			telaCadastroDestaque_grupo += 			"<td><b>Descrição</b></td>";
			telaCadastroDestaque_grupo += 			"<td><b>Configurar Site</b></td>";
			telaCadastroDestaque_grupo += 			"<td><b>Ativo</b></td>";
			telaCadastroDestaque_grupo += 		"</tr>";
			telaCadastroDestaque_grupo +=		tabelaViewBody;
			telaCadastroDestaque_grupo += 	"</table>";
			// 	telaCadastroDestaque_grupo += jk_table("table", "0",
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
			// telaCadastroDestaque_grupo += "</div>";	
		}
		telaCadastroDestaque_grupo += "</div>";
		$("#conteudoDestaque_grupo").html(telaCadastroDestaque_grupo);
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

