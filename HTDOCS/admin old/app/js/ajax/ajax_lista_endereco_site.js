
$(document).ready(function(){
	
	var id_endereco_site = "";
	var descricao_endereco_site = "";
	var endereco_endereco_site = "";
	var numero_endereco_site = "";
	var complemento_endereco_site = "";
	var bairro_endereco_site = "";
	var cidade_endereco_site = "";
	var estado_id = "";
	var cep_endereco_site = "";
	var telefone_endereco_site = "";
	var celular_endereco_site = "";
	var email_endereco_site = "";
	var horario_funcionamento_endereco_site = "";
	var latitude_endereco_site = "";
	var longitude_endereco_site = "";
	var configurar_site_id = "";
	var data_atualizacao_endereco_site = "";
	var bool_ativo_endereco_site = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroEndereco_site = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var simOUnao = "";

	$.ajax({
		url:'app/controllers/funcoes_endereco_siteController.php',
		type: 'POST',
		dataType: 'text',
		data: { 'pequisa_endereco_site': true }
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split(",");
		if (subvetor[1] == undefined) {
			telaCadastroEndereco_site += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroEndereco_site += "<br>";

			telaCadastroEndereco_site += "<div class='bloco2'>";

			// var vetor = data.split("[]");
			// var subvetor = [];
			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(",");

				
				id_endereco_site = subvetor[0];
				descricao_endereco_site = subvetor[1];
				endereco_endereco_site = subvetor[2];
				numero_endereco_site = subvetor[3];
				complemento_endereco_site = subvetor[4];
				bairro_endereco_site = subvetor[5];
				cidade_endereco_site = subvetor[6];
				estado_id = subvetor[7];
				cep_endereco_site = subvetor[8];
				telefone_endereco_site = subvetor[9];
				celular_endereco_site = subvetor[10];
				email_endereco_site = subvetor[11];
				horario_funcionamento_endereco_site = subvetor[12];
				latitude_endereco_site = subvetor[13];
				longitude_endereco_site = subvetor[14];
				configurar_site_id = subvetor[15];
				data_atualizacao_endereco_site = subvetor[16];
				bool_ativo_endereco_site = subvetor[17];
				

				if (bool_ativo_endereco_site == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_endereco_site' style='color: #f0ad4e;' data-id='"+id_endereco_site+"' onclick='editar(this);' title='Editar' "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+descricao_endereco_site+"</td>";
				tabelaViewBody += 			"<td>"+endereco_endereco_site+"</td>";
				tabelaViewBody += 			"<td>"+numero_endereco_site+"</td>";
				tabelaViewBody += 			"<td>"+complemento_endereco_site+"</td>";
				tabelaViewBody += 			"<td>"+bairro_endereco_site+"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='#!endereco_site' style='color: "+cor_ativo+"' data-id='"+id_endereco_site+"' onclick=\"excluir(this , 'endereco_site')\" title='Excluir'>";
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
			telaCadastroEndereco_site += 	"<table class='table'>";
			telaCadastroEndereco_site += 		"<tr bgcolor='white'>";
			telaCadastroEndereco_site += 			"<td><b>Editar</b></td>";
			telaCadastroEndereco_site += 			"<td><b>Descrição</b></td>";
			telaCadastroEndereco_site += 			"<td><b>Endereço</b></td>";
			telaCadastroEndereco_site += 			"<td><b>Número</b></td>";
			telaCadastroEndereco_site += 			"<td><b>Complemento</b></td>";
			telaCadastroEndereco_site += 			"<td><b>Bairro</b></td>";
			telaCadastroEndereco_site += 			"<td><b>Ativo</b></td>";
			telaCadastroEndereco_site += 		"</tr>";
			telaCadastroEndereco_site +=		tabelaViewBody;
			telaCadastroEndereco_site += 	"</table>";
			// 	telaCadastroEndereco_site += jk_table("table", "0",
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
			// telaCadastroEndereco_site += "</div>";	
		}
		telaCadastroEndereco_site += "</div>";
		$("#conteudoEndereco_site").html(telaCadastroEndereco_site);
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

