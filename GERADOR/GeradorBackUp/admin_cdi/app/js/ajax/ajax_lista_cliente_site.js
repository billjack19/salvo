
$(document).ready(function(){
	zerarTabelaGrade();
	buscar_cliente_site();
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
		vetor = data.split("{,}");
		document.getElementById(tabelaEstrangeira+'_'+id).innerHTML = vetor[1];
	});
}


function buscar_cliente_site(){
	
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
	var numeroRegAtual = 1;
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	$("#conteudoCliente_site").html("Carregando...");
	$.ajax({
		url:'app/controllers/funcoes_cliente_siteController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_cliente_site': true,
			'filtro': $("#pesquisa_cliente_site").val()
		}
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroCliente_site += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroCliente_site += "<br>";

			telaCadastroCliente_site += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
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
				tabelaViewBody +=				"<a href='principal.php#!editar_cliente_site' style='color: #f0ad4e;' data-id='"+id_cliente_site+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_cliente_site+"'>";
				tabelaViewBody += 				"<a href='#!cliente_site' style='color: "+cor_ativo+"' data-id='"+id_cliente_site+"' onclick=\"excluir(this , 'cliente_site', "+bool_ativo_cliente_site+", 'cliente_site')\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody +=			"<td align='center'>";
				tabelaViewBody +=				numeroRegAtual;
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+nome_cliente_site+"</td>";
				tabelaViewBody += 			"<td>"+login_cliente_site+"</td>";
				tabelaViewBody += 			"<td>"+telefone_cliente_site+"</td>";
				tabelaViewBody += 			"<td>"+celular_cliente_site+"</td>";
				tabelaViewBody += 			"<td>"+endereco_cliente_site+"</td>";
				if($("#n_acs_orcamento_cliente_site").val() == 1 || $("#n_acs_orcamento_cliente_site").val() == "1") {
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='principal.php#!grade_orcamento-cliente_site' style='color: green' data-id='"+id_cliente_site+"' onclick=\"grade(this , 'cliente_site', 'orcamento')\" title='Orçamento'>";
				tabelaViewBody += 					"<i class=\"fa fa-plus\" aria-hidden=\"true\"></i>";
				tabelaViewBody +=  				"</a>";
				tabelaViewBody +=  			"</td>";
				}
				tabelaViewBody += 		"</tr>";

				numeroRegAtual++;
				accesskeyEditar = "";
			}
			telaCadastroCliente_site += 	"<table class='table'>";
			telaCadastroCliente_site += 		"<tr bgcolor='white'>";
			telaCadastroCliente_site += 			"<td><b>Editar</b></td>";
			telaCadastroCliente_site += 			"<td><b>Ativo</b></td>";
			telaCadastroCliente_site += 			"<td><b>N°</b></td>";
			telaCadastroCliente_site += 			"<td><b>Nome</b></td>";
			telaCadastroCliente_site += 			"<td><b>Login</b></td>";
			telaCadastroCliente_site += 			"<td><b>Telefone</b></td>";
			telaCadastroCliente_site += 			"<td><b>Celular</b></td>";
			telaCadastroCliente_site += 			"<td><b>Endereço</b></td>";
			if($("#n_acs_orcamento_cliente_site").val() == 1 || $("#n_acs_orcamento_cliente_site").val() == "1") {
			telaCadastroCliente_site += 			"<td><b>Orçamento</b></td>";
			}
			telaCadastroCliente_site += 		"</tr>";
			telaCadastroCliente_site +=		tabelaViewBody;
			telaCadastroCliente_site += 	"</table>";
		}
		telaCadastroCliente_site += "</div>";
		$("#conteudoCliente_site").html(telaCadastroCliente_site);
		for (var i = 0; i < acumularFunctionId.length; i++) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i]);
		}
	});
}
