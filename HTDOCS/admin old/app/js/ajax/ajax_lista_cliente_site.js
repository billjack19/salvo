
$(document).ready(function(){
	
	var id_cliente_site = "";
	var nome_cliente_site = "";
	var login_cliente_site = "";
	var senha_cliente_site = "";
	var telefone_cliente_site = "";
	var celular_cliente_site = "";
	var endereco_cliente_site = "";
	var numero_cliente_site = "";
	var complemento_cliente_site = "";
	var bairro_cliente_site = "";
	var cidade_cliente_site = "";
	var estado_id = "";
	var cep_cliente_site = "";
	var bool_ativo_cliente_site = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroCliente_site = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var simOUnao = "";

	$.ajax({
		url:'app/controllers/funcoes_cliente_siteController.php',
		type: 'POST',
		dataType: 'text',
		data: { 'pequisa_cliente_site': true }
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split(",");
		if (subvetor[1] == undefined) {
			telaCadastroCliente_site += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroCliente_site += "<br>";

			telaCadastroCliente_site += "<div class='bloco2'>";

			// var vetor = data.split("[]");
			// var subvetor = [];
			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(",");

				
				id_cliente_site = subvetor[0];
				nome_cliente_site = subvetor[1];
				login_cliente_site = subvetor[2];
				senha_cliente_site = subvetor[3];
				telefone_cliente_site = subvetor[4];
				celular_cliente_site = subvetor[5];
				endereco_cliente_site = subvetor[6];
				numero_cliente_site = subvetor[7];
				complemento_cliente_site = subvetor[8];
				bairro_cliente_site = subvetor[9];
				cidade_cliente_site = subvetor[10];
				estado_id = subvetor[11];
				cep_cliente_site = subvetor[12];
				bool_ativo_cliente_site = subvetor[13];
				

				if (bool_ativo_cliente_site == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_cliente_site' style='color: #f0ad4e;' data-id='"+id_cliente_site+"' onclick='editar(this);' title='Editar' "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+nome_cliente_site+"</td>";
				tabelaViewBody += 			"<td>"+login_cliente_site+"</td>";
				tabelaViewBody += 			"<td>"+senha_cliente_site+"</td>";
				tabelaViewBody += 			"<td>"+telefone_cliente_site+"</td>";
				tabelaViewBody += 			"<td>"+celular_cliente_site+"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='principal.php#!grade_orcamento-cliente_site' style='color: green' data-id='"+id_cliente_site+"' onclick=\"grade(this , 'cliente_site', 'orcamento')\" title='Orçamento'>";
				tabelaViewBody += 					"<i class=\"fa fa-plus\" aria-hidden=\"true\"></i>";
				tabelaViewBody +=  				"</a>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='#!cliente_site' style='color: "+cor_ativo+"' data-id='"+id_cliente_site+"' onclick=\"excluir(this , 'cliente_site')\" title='Excluir'>";
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
			telaCadastroCliente_site += 	"<table class='table'>";
			telaCadastroCliente_site += 		"<tr bgcolor='white'>";
			telaCadastroCliente_site += 			"<td><b>Editar</b></td>";
			telaCadastroCliente_site += 			"<td><b>Nome</b></td>";
			telaCadastroCliente_site += 			"<td><b>Login</b></td>";
			telaCadastroCliente_site += 			"<td><b>Senha</b></td>";
			telaCadastroCliente_site += 			"<td><b>Telefone</b></td>";
			telaCadastroCliente_site += 			"<td><b>Celular</b></td>";
			telaCadastroCliente_site += 			"<td><b>Orçamento</b></td>";
			telaCadastroCliente_site += 			"<td><b>Ativo</b></td>";
			telaCadastroCliente_site += 		"</tr>";
			telaCadastroCliente_site +=		tabelaViewBody;
			telaCadastroCliente_site += 	"</table>";
			// 	telaCadastroCliente_site += jk_table("table", "0",
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
			// telaCadastroCliente_site += "</div>";	
		}
		telaCadastroCliente_site += "</div>";
		$("#conteudoCliente_site").html(telaCadastroCliente_site);
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

