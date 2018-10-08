
$(document).ready(function(){
	buscar_contato();
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


function buscar_contato(){
	
	var id_contato = "";
	var nome_contato = "";
	var email_contato = "";
	var telefone_contato = "";
	var assunto_contato = "";
	var mensagem_contato = "";
	var usuario_id = "";
	var data_atualizacao_contato = "";
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
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	$("#conteudoCards").html("Carregando...");
	$.ajax({
		url:'app/controllers/funcoes_contatoController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_contato': true,
			'filtro': $("#pesquisa_contato").val()
		}
	}).done( function(data){
		// _filtro

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
				nome_contato = subvetor[1];
				email_contato = subvetor[2];
				telefone_contato = subvetor[3];
				assunto_contato = subvetor[4];
				mensagem_contato = subvetor[5];
				usuario_id = subvetor[6];
				data_atualizacao_contato = subvetor[7];
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
				tabelaViewBody += 			"<td>"+nome_contato+"</td>";
				tabelaViewBody += 			"<td>"+email_contato+"</td>";
				tabelaViewBody += 			"<td>"+telefone_contato+"</td>";
				tabelaViewBody += 			"<td>"+assunto_contato+"</td>";
				tabelaViewBody += 			"<td>"+mensagem_contato+"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_contato+"'>";
				tabelaViewBody += 				"<a href='#!contato' style='color: "+cor_ativo+"' data-id='"+id_contato+"' onclick=\"excluir(this , 'contato', "+bool_ativo_contato+", 'contato')\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody += 		"</tr>";

				accesskeyEditar = "";
			}
			telaCadastroContato += 	"<table class='table'>";
			telaCadastroContato += 		"<tr bgcolor='white'>";
			telaCadastroContato += 			"<td><b>Editar</b></td>";
			telaCadastroContato += 			"<td><b>Nome</b></td>";
			telaCadastroContato += 			"<td><b>Email</b></td>";
			telaCadastroContato += 			"<td><b>Telefone</b></td>";
			telaCadastroContato += 			"<td><b>Assunto</b></td>";
			telaCadastroContato += 			"<td><b>Mensagem</b></td>";
			telaCadastroContato += 			"<td><b>Ativo</b></td>";
			telaCadastroContato += 		"</tr>";
			telaCadastroContato +=		tabelaViewBody;
			telaCadastroContato += 	"</table>";
		}
		telaCadastroContato += "</div>";
		$("#conteudoContato").html(telaCadastroContato);
		for (var i = acumularFunctionId.length - 1; i >= 0; i--) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i]);
		}
	});
}
