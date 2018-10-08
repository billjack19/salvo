
$(document).ready(function(){
	
	var id_baseDados = "";
	var descricao_baseDados = "";
	var regitros_id = "";


	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroBasedados = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";

	$.ajax({
		url:'controllers/funcoes_basedadosController.php',
		type: 'POST',
		dataType: 'text',
		data: { 'pequisa_basedados': true }
	}).done( function(data){
		if (data == "") {
			telaCadastroBasedados += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroBasedados += "<br>";

			telaCadastroBasedados += "<div class='bloco2'>";

			var vetor = data.split("[]");
			var subvetor = [];
			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(",");

				
				id_baseDados = subvetor[0];
				descricao_baseDados = subvetor[1];
				regitros_id = subvetor[2];

				if (bool_ativo_basedados == 1) { 
					desabilitar = "";
					icone_ativo = "<i class=\"fa fa-check\" aria-hidden=\"true\"></i>";
					cor_ativo = "#0f0;"
					valorAtivo = 0;
				} else {
					desabilitar = "disabled";
					cor_ativo = "#f00;";
					icone_ativo = "<i class=\"fa fa-times\" aria-hidden=\"true\"></i>";
					valorAtivo = 1;
				}

				tabelaViewBody += 		"<tr>";
				tabelaViewBody += 			"<td>"+descricao_baseDados+"</td>";
				tabelaViewBody +=			"<td align='center'>";
				tabelaViewBody +=				"<a href='#!editar_basedados' style='color: #f0ad4e;' data-id='"+id_baseDados+"' onclick='editar(this);' title='Editar'>";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='#!basedados' style='color: red;' data-id='"+id_baseDados+"' onclick=\"excluir(this , 'basedados')\" title='Excluir'>";
				tabelaViewBody += 					bool_ativo_basedados;
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
			telaCadastroBasedados += 	"<table class='table'>";
			telaCadastroBasedados += 		"<tr bgcolor='white'>";
			telaCadastroBasedados += 			"<td><b>Descrição</b></td>";
			telaCadastroBasedados += 			"<td>Editar</td>";
			telaCadastroBasedados += 			"<td>Ativo</td>";
			telaCadastroBasedados += 		"</tr>";
			telaCadastroBasedados +=		tabelaViewBody;
			telaCadastroBasedados += 	"</table>";
			// 	telaCadastroBasedados += jk_table("table", "0",
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
			// telaCadastroBasedados += "</div>";	
		}
		telaCadastroBasedados += "</div>";
		$("#conteudoBasedados").html(telaCadastroBasedados);
		montarComboBuscaCliente();
	});
}