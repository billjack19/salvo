
$(document).ready(function(){
	zerarTabelaGrade();
	buscar_marca();
});

function buscar_marca(){
	
	var id_marca = "";
	var descricao_marca = "";
	var data_atualizacao_marca = "";
	var usuario_id = "";
	var bool_ativo_marca = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroMarca = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var numeroRegAtual = 1;
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	$("#conteudoMarca").html("Carregando...");
	$.ajax({
		url:'app/controllers/funcoes_marcaController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_marca': true,
			'filtro': $("#pesquisa_marca").val()
		}
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroMarca += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroMarca += "<br>";

			telaCadastroMarca += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_marca = subvetor[0];
				descricao_marca = subvetor[1];
				data_atualizacao_marca = subvetor[2];
				usuario_id = subvetor[3];
				bool_ativo_marca = subvetor[4];
				
				acumularFunctionId.push(id_marca);
				acumularFunctionCampo.push(usuario_id+"+usuario");

				if (bool_ativo_marca == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_marca' style='color: #f0ad4e;' data-id='"+id_marca+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_marca+"'>";
				tabelaViewBody += 				"<a href='#!marca' style='color: "+cor_ativo+"' data-id='"+id_marca+"' onclick=\"excluir(this , 'marca', "+bool_ativo_marca+", 'marca')\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody +=			"<td align='center'>";
				tabelaViewBody +=				numeroRegAtual;
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+descricao_marca+"</td>";
				tabelaViewBody += 			"<td>"+formatarData(data_atualizacao_marca)+"</td>";
				tabelaViewBody += 			"<td><div id='usuario_"+parseInt(id_marca)+"'></div></td>";
				tabelaViewBody += 		"</tr>";

				numeroRegAtual++;
				accesskeyEditar = "";
			}
			telaCadastroMarca += 	"<table class='table'>";
			telaCadastroMarca += 		"<tr bgcolor='white'>";
			telaCadastroMarca += 			"<td><b>Editar</b></td>";
			telaCadastroMarca += 			"<td><b>Ativo</b></td>";
			telaCadastroMarca += 			"<td><b>N°</b></td>";
			telaCadastroMarca += 			"<td><b>Descrição</b></td>";
			telaCadastroMarca += 			"<td><b>Data Atualização</b></td>";
			telaCadastroMarca += 			"<td><b>Usuário</b></td>";
			telaCadastroMarca += 		"</tr>";
			telaCadastroMarca +=		tabelaViewBody;
			telaCadastroMarca += 	"</table>";
		}
		telaCadastroMarca += "</div>";
		$("#conteudoMarca").html(telaCadastroMarca);
		for (var i = 0; i < acumularFunctionId.length; i++) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i], "");
		}
	});
}
