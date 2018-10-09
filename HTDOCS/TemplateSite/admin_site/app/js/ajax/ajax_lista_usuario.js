
$(document).ready(function(){
	
	var id_usuario = "";
	var nome_usuario = "";
	var login_usuario = "";
	var senha_usuario = "";
	var foto_usuario = "";
	var nivel_acesso_usuario = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroUsuario = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var simOUnao = "";

	$.ajax({
		url:'app/controllers/funcoes_usuarioController.php',
		type: 'POST',
		dataType: 'text',
		data: { 'pequisa_usuario': true }
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split(",");
		if (subvetor[1] == undefined) {
			telaCadastroUsuario += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroUsuario += "<br>";

			telaCadastroUsuario += "<div class='bloco2'>";

			// var vetor = data.split("[]");
			// var subvetor = [];
			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split(",");

				
				id_usuario = subvetor[0];
				nome_usuario = subvetor[1];
				login_usuario = subvetor[2];
				senha_usuario = subvetor[3];
				foto_usuario = subvetor[4];
				nivel_acesso_usuario = subvetor[5];
				

				if (bool_ativo_usuario == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_usuario' style='color: #f0ad4e;' data-id='"+id_usuario+"' onclick='editar(this);' title='Editar' "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+nome_usuario+"</td>";
				tabelaViewBody += 			"<td>"+login_usuario+"</td>";
				tabelaViewBody += 			"<td>"+senha_usuario+"</td>";
				tabelaViewBody += 			"<td>"+foto_usuario+"</td>";
				tabelaViewBody += 			"<td>"+nivel_acesso_usuario+"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='#!usuario' style='color: "+cor_ativo+"' data-id='"+id_usuario+"' onclick=\"excluir(this , 'usuario')\" title='Excluir'>";
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
			telaCadastroUsuario += 	"<table class='table'>";
			telaCadastroUsuario += 		"<tr bgcolor='white'>";
			telaCadastroUsuario += 			"<td><b>Editar</b></td>";
			telaCadastroUsuario += 			"<td><b>Nome</b></td>";
			telaCadastroUsuario += 			"<td><b>Login</b></td>";
			telaCadastroUsuario += 			"<td><b>Senha</b></td>";
			telaCadastroUsuario += 			"<td><b>Foto</b></td>";
			telaCadastroUsuario += 			"<td><b>Nivel Acesso</b></td>";
			telaCadastroUsuario += 			"<td><b>Ativo</b></td>";
			telaCadastroUsuario += 		"</tr>";
			telaCadastroUsuario +=		tabelaViewBody;
			telaCadastroUsuario += 	"</table>";
			// 	telaCadastroUsuario += jk_table("table", "0",
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
			// telaCadastroUsuario += "</div>";	
		}
		telaCadastroUsuario += "</div>";
		$("#conteudoUsuario").html(telaCadastroUsuario);
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

