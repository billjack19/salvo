
$(document).ready(function(){
	zerarTabelaGrade();
	buscar_quem_somos();
});

function buscar_quem_somos(){
	
	var id_quem_somos = "";
	var titulo_quem_somos = "";
	var descricao_quem_somos = "";
	var imagem_quem_somos = "";
	var data_atualizacao_quem_somos = "";
	var bool_ativo_quem_somos = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroQuem_somos = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var numeroRegAtual = 1;
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	$("#conteudoQuem_somos").html("Carregando...");
	$.ajax({
		url:'app/controllers/funcoes_quem_somosController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_quem_somos': true,
			'filtro': $("#pesquisa_quem_somos").val()
		}
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroQuem_somos += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroQuem_somos += "<br>";

			telaCadastroQuem_somos += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_quem_somos = subvetor[0];
				titulo_quem_somos = subvetor[1];
				descricao_quem_somos = subvetor[2];
				imagem_quem_somos = subvetor[3];
				data_atualizacao_quem_somos = subvetor[4];
				bool_ativo_quem_somos = subvetor[5];
				

				if (bool_ativo_quem_somos == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_quem_somos' style='color: #f0ad4e;' data-id='"+id_quem_somos+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_quem_somos+"'>";
				tabelaViewBody += 				"<a href='#!quem_somos' style='color: "+cor_ativo+"' data-id='"+id_quem_somos+"' onclick=\"excluir(this , 'quem_somos', "+bool_ativo_quem_somos+", 'quem_somos')\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody +=			"<td align='center'>";
				tabelaViewBody +=				numeroRegAtual;
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+titulo_quem_somos+"</td>";
				tabelaViewBody += 			"<td>"+descricao_quem_somos+"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<a href='app/upload/img/"+imagem_quem_somos+"' target='_blank'>";
				tabelaViewBody += 					"<img src='app/upload/img/"+imagem_quem_somos+"' style='max-height: 500px; max-width: 15%;'>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody += 			"</td>";
				tabelaViewBody += 			"<td>"+formatarData(data_atualizacao_quem_somos)+"</td>";
				tabelaViewBody += 		"</tr>";

				numeroRegAtual++;
				accesskeyEditar = "";
			}
			telaCadastroQuem_somos += 	"<table class='table'>";
			telaCadastroQuem_somos += 		"<tr bgcolor='white'>";
			telaCadastroQuem_somos += 			"<td><b>Editar</b></td>";
			telaCadastroQuem_somos += 			"<td><b>Ativo</b></td>";
			telaCadastroQuem_somos += 			"<td><b>N°</b></td>";
			telaCadastroQuem_somos += 			"<td><b>Titulo</b></td>";
			telaCadastroQuem_somos += 			"<td><b>Descrição</b></td>";
			telaCadastroQuem_somos += 			"<td><b>Imagem</b></td>";
			telaCadastroQuem_somos += 			"<td><b>Data Atualização</b></td>";
			telaCadastroQuem_somos += 		"</tr>";
			telaCadastroQuem_somos +=		tabelaViewBody;
			telaCadastroQuem_somos += 	"</table>";
		}
		telaCadastroQuem_somos += "</div>";
		$("#conteudoQuem_somos").html(telaCadastroQuem_somos);
		for (var i = 0; i < acumularFunctionId.length; i++) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i], "");
		}
	});
}
