
$(document).ready(function(){
	zerarTabelaGrade();
	buscar_supermercado();
});

function buscar_supermercado(){
	
	var id_supermercado = "";
	var descricao_supermercado = "";
	var data_atualizacao_supermercado = "";
	var usuario_id = "";
	var bool_ativo_supermercado = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroSupermercado = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var numeroRegAtual = 1;
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	$("#conteudoSupermercado").html("Carregando...");
	$.ajax({
		url:'app/controllers/funcoes_supermercadoController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_supermercado': true,
			'filtro': $("#pesquisa_supermercado").val()
		}
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroSupermercado += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroSupermercado += "<br>";

			telaCadastroSupermercado += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_supermercado = subvetor[0];
				descricao_supermercado = subvetor[1];
				data_atualizacao_supermercado = subvetor[2];
				usuario_id = subvetor[3];
				bool_ativo_supermercado = subvetor[4];
				
				acumularFunctionId.push(id_supermercado);
				acumularFunctionCampo.push(usuario_id+"+usuario");

				if (bool_ativo_supermercado == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_supermercado' style='color: #f0ad4e;' data-id='"+id_supermercado+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_supermercado+"'>";
				tabelaViewBody += 				"<a href='#!supermercado' style='color: "+cor_ativo+"' data-id='"+id_supermercado+"' onclick=\"excluir(this , 'supermercado', "+bool_ativo_supermercado+", 'supermercado')\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody +=			"<td align='center'>";
				tabelaViewBody +=				numeroRegAtual;
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+descricao_supermercado+"</td>";
				tabelaViewBody += 			"<td>"+formatarData(data_atualizacao_supermercado)+"</td>";
				tabelaViewBody += 			"<td><div id='usuario_"+parseInt(id_supermercado)+"'></div></td>";
				tabelaViewBody += 		"</tr>";

				numeroRegAtual++;
				accesskeyEditar = "";
			}
			telaCadastroSupermercado += 	"<table class='table'>";
			telaCadastroSupermercado += 		"<tr bgcolor='white'>";
			telaCadastroSupermercado += 			"<td><b>Editar</b></td>";
			telaCadastroSupermercado += 			"<td><b>Ativo</b></td>";
			telaCadastroSupermercado += 			"<td><b>N°</b></td>";
			telaCadastroSupermercado += 			"<td><b>Descrição</b></td>";
			telaCadastroSupermercado += 			"<td><b>Data Atualização</b></td>";
			telaCadastroSupermercado += 			"<td><b>Usuário</b></td>";
			telaCadastroSupermercado += 		"</tr>";
			telaCadastroSupermercado +=		tabelaViewBody;
			telaCadastroSupermercado += 	"</table>";
		}
		telaCadastroSupermercado += "</div>";
		$("#conteudoSupermercado").html(telaCadastroSupermercado);
		for (var i = 0; i < acumularFunctionId.length; i++) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i], "");
		}
	});
}
