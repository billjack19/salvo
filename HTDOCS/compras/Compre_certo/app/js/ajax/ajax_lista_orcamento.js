
$(document).ready(function(){
	zerarTabelaGrade();
	buscar_orcamento();
});

function buscar_orcamento(){
	
	var id_orcamento = "";
	var emissao_orcamento = "";
	var descricao_orcamento = "";
	var data_atualizacao_orcamento = "";
	var usuario_id = "";
	var bool_ativo_orcamento = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroOrcamento = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var numeroRegAtual = 1;
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	$("#conteudoOrcamento").html("Carregando...");
	$.ajax({
		url:'app/controllers/funcoes_orcamentoController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_orcamento': true,
			'filtro': $("#pesquisa_orcamento").val()
		}
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroOrcamento += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroOrcamento += "<br>";

			telaCadastroOrcamento += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_orcamento = subvetor[0];
				emissao_orcamento = subvetor[1];
				descricao_orcamento = subvetor[2];
				data_atualizacao_orcamento = subvetor[3];
				usuario_id = subvetor[4];
				bool_ativo_orcamento = subvetor[5];
				
				acumularFunctionId.push(id_orcamento);
				acumularFunctionCampo.push(usuario_id+"+usuario");

				if (bool_ativo_orcamento == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_orcamento' style='color: #f0ad4e;' data-id='"+id_orcamento+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_orcamento+"'>";
				tabelaViewBody += 				"<a href='#!orcamento' style='color: "+cor_ativo+"' data-id='"+id_orcamento+"' onclick=\"excluir(this , 'orcamento', "+bool_ativo_orcamento+", 'orcamento')\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody +=			"<td align='center'>";
				tabelaViewBody +=				numeroRegAtual;
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+formatarData(emissao_orcamento)+"</td>";
				tabelaViewBody += 			"<td>"+descricao_orcamento+"</td>";
				tabelaViewBody += 			"<td>"+formatarData(data_atualizacao_orcamento)+"</td>";
				tabelaViewBody += 			"<td><div id='usuario_"+parseInt(id_orcamento)+"'></div></td>";
				if($("#n_acs_orcamento_item_orcamento").val() == 1 || $("#n_acs_orcamento_item_orcamento").val() == "1") {
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='principal.php#!grade_orcamento_item-orcamento' style='color: green' data-id='"+id_orcamento+"' onclick=\"grade(this , 'orcamento', 'orcamento_item')\" title='Orçamento Item'>";
				tabelaViewBody += 					"<i class=\"fa fa-plus\" aria-hidden=\"true\"></i>";
				tabelaViewBody +=  				"</a>";
				tabelaViewBody +=  			"</td>";
				}
				tabelaViewBody += 		"</tr>";

				numeroRegAtual++;
				accesskeyEditar = "";
			}
			telaCadastroOrcamento += 	"<table class='table'>";
			telaCadastroOrcamento += 		"<tr bgcolor='white'>";
			telaCadastroOrcamento += 			"<td><b>Editar</b></td>";
			telaCadastroOrcamento += 			"<td><b>Ativo</b></td>";
			telaCadastroOrcamento += 			"<td><b>N°</b></td>";
			telaCadastroOrcamento += 			"<td><b>Emissao</b></td>";
			telaCadastroOrcamento += 			"<td><b>Descrição</b></td>";
			telaCadastroOrcamento += 			"<td><b>Data Atualização</b></td>";
			telaCadastroOrcamento += 			"<td><b>Usuário</b></td>";
			if($("#n_acs_orcamento_item_orcamento").val() == 1 || $("#n_acs_orcamento_item_orcamento").val() == "1") {
			telaCadastroOrcamento += 			"<td><b>Orçamento Item</b></td>";
			}
			telaCadastroOrcamento += 		"</tr>";
			telaCadastroOrcamento +=		tabelaViewBody;
			telaCadastroOrcamento += 	"</table>";
		}
		telaCadastroOrcamento += "</div>";
		$("#conteudoOrcamento").html(telaCadastroOrcamento);
		for (var i = 0; i < acumularFunctionId.length; i++) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i], "");
		}
	});
}
