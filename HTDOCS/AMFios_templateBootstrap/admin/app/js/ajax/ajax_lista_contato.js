
$(document).ready(function(){
	zerarTabelaGrade();
	buscar_contato();
});

function buscar_contato(){
	
	var id_contato = "";
	var DT_CONTATO = "";
	var NOME_CONTATO = "";
	var EMAIL_CONTATO = "";
	var TELEFONE_CONTATO = "";
	var ASSUNTO_CONTATO = "";
	var MENSAGEM_CONTATO = "";
	var ARQUIVO_CONTATO = "";
	var bool_ativo_contato = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroContato = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var numeroRegAtual = 1;
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	$("#conteudoContato").html("Carregando...");
	$.ajax({
		url:'app/controllers/funcoes_contatoController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_contato': true,
			'filtro': $("#pesquisa_contato").val()
		}
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroContato += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroContato += "<br>";

			telaCadastroContato += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_contato = subvetor[0];
				DT_CONTATO = subvetor[1];
				NOME_CONTATO = subvetor[2];
				EMAIL_CONTATO = subvetor[3];
				TELEFONE_CONTATO = subvetor[4];
				ASSUNTO_CONTATO = subvetor[5];
				MENSAGEM_CONTATO = subvetor[6];
				ARQUIVO_CONTATO = subvetor[7];
				bool_ativo_contato = subvetor[8];
				

				if (bool_ativo_contato == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_contato' style='color: #f0ad4e;' data-id='"+id_contato+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_contato+"'>";
				tabelaViewBody += 				"<a href='#!contato' style='color: "+cor_ativo+"' data-id='"+id_contato+"' onclick=\"excluir(this , 'contato', "+bool_ativo_contato+", 'contato')\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody +=			"<td align='center'>";
				tabelaViewBody +=				numeroRegAtual;
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+formatarData(DT_CONTATO)+"</td>";
				tabelaViewBody += 			"<td>"+NOME_CONTATO+"</td>";
				tabelaViewBody += 			"<td>"+EMAIL_CONTATO+"</td>";
				tabelaViewBody += 			"<td>"+TELEFONE_CONTATO+"</td>";
				tabelaViewBody += 			"<td>"+ASSUNTO_CONTATO+"</td>";
				tabelaViewBody += 		"</tr>";

				numeroRegAtual++;
				accesskeyEditar = "";
			}
			telaCadastroContato += 	"<table class='table'>";
			telaCadastroContato += 		"<tr bgcolor='white'>";
			telaCadastroContato += 			"<td><b>Editar</b></td>";
			telaCadastroContato += 			"<td><b>Ativo</b></td>";
			telaCadastroContato += 			"<td><b>N°</b></td>";
			telaCadastroContato += 			"<td><b>DT</b></td>";
			telaCadastroContato += 			"<td><b>NOME</b></td>";
			telaCadastroContato += 			"<td><b>EMAIL</b></td>";
			telaCadastroContato += 			"<td><b>TELEFONE</b></td>";
			telaCadastroContato += 			"<td><b>ASSUNTO</b></td>";
			telaCadastroContato += 		"</tr>";
			telaCadastroContato +=		tabelaViewBody;
			telaCadastroContato += 	"</table>";
		}
		telaCadastroContato += "</div>";
		$("#conteudoContato").html(telaCadastroContato);
		for (var i = 0; i < acumularFunctionId.length; i++) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i], "");
		}
	});
}
