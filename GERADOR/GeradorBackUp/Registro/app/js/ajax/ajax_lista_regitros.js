
$(document).ready(function(){
	
	var Id_SQL = "";
	var ServerName = "";
	var ServiceName = "";
	var Key_SQL_servive = "";
	var Port Number = "";


	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroRegitros = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";

	$.ajax({
		url:'controllers/funcoes_regitrosController.php',
		type: 'POST',
		dataType: 'text',
		data: { 'pequisa_regitros': true }
	}).done( function(data){
		if (data == "") {
			telaCadastroRegitros += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroRegitros += "<br>";

			telaCadastroRegitros += "<div class='bloco2'>";

			var vetor = data.split("[]");
			var subvetor = [];
			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(",");

				
				Id_SQL = subvetor[0];
				ServerName = subvetor[1];
				ServiceName = subvetor[2];
				Key_SQL_servive = subvetor[3];
				Port Number = subvetor[4];

				if (bool_ativo_regitros == 1) { 
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
				tabelaViewBody += 			"<td>"+ServerName+"</td>";
				tabelaViewBody += 			"<td>"+ServiceName+"</td>";
				tabelaViewBody += 			"<td>"+Key_SQL_servive+"</td>";
				tabelaViewBody += 			"<td>"+Port Number+"</td>";
				tabelaViewBody +=			"<td align='center'>";
				tabelaViewBody +=				"<a href='#!editar_regitros' style='color: #f0ad4e;' data-id='"+Id_SQL+"' onclick='editar(this);' title='Editar'>";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='#!regitros' style='color: red;' data-id='"+Id_SQL+"' onclick=\"excluir(this , 'regitros')\" title='Excluir'>";
				tabelaViewBody += 					bool_ativo_regitros;
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
			telaCadastroRegitros += 	"<table class='table'>";
			telaCadastroRegitros += 		"<tr bgcolor='white'>";
			telaCadastroRegitros += 			"<td><b>ServerName</b></td>";
			telaCadastroRegitros += 			"<td><b>ServiceName</b></td>";
			telaCadastroRegitros += 			"<td><b>Key SQL</b></td>";
			telaCadastroRegitros += 			"<td><b>Port Number</b></td>";
			telaCadastroRegitros += 			"<td>Editar</td>";
			telaCadastroRegitros += 			"<td>Ativo</td>";
			telaCadastroRegitros += 		"</tr>";
			telaCadastroRegitros +=		tabelaViewBody;
			telaCadastroRegitros += 	"</table>";
			// 	telaCadastroRegitros += jk_table("table", "0",
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
			// telaCadastroRegitros += "</div>";	
		}
		telaCadastroRegitros += "</div>";
		$("#conteudoRegitros").html(telaCadastroRegitros);
		montarComboBuscaCliente();
	});
}