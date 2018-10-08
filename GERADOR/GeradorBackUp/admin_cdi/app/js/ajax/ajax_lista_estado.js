
$(document).ready(function(){
	zerarTabelaGrade();
	buscar_estado();
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


function buscar_estado(){
	
	var id_estado = "";
	var descricao_estado = "";
	var sigla_estado = "";
	var bool_ativo_estado = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroEstado = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var numeroRegAtual = 1;
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	$("#conteudoEstado").html("Carregando...");
	$.ajax({
		url:'app/controllers/funcoes_estadoController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_estado': true,
			'filtro': $("#pesquisa_estado").val()
		}
	}).done( function(data){
		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroEstado += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroEstado += "<br>";

			telaCadastroEstado += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_estado = subvetor[0];
				descricao_estado = subvetor[1];
				sigla_estado = subvetor[2];
				bool_ativo_estado = subvetor[3];
				

				if (bool_ativo_estado == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_estado' style='color: #f0ad4e;' data-id='"+id_estado+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_estado+"'>";
				tabelaViewBody += 				"<a href='#!estado' style='color: "+cor_ativo+"' data-id='"+id_estado+"' onclick=\"excluir(this , 'estado', "+bool_ativo_estado+", 'estado')\">";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody +=			"<td align='center'>";
				tabelaViewBody +=				numeroRegAtual;
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+descricao_estado+"</td>";
				tabelaViewBody += 			"<td>"+sigla_estado+"</td>";
				tabelaViewBody += 		"</tr>";

				numeroRegAtual++;
				accesskeyEditar = "";
			}
			telaCadastroEstado += 	"<table class='table'>";
			telaCadastroEstado += 		"<tr bgcolor='white'>";
			telaCadastroEstado += 			"<td><b>Editar</b></td>";
			telaCadastroEstado += 			"<td><b>Ativo</b></td>";
			telaCadastroEstado += 			"<td><b>N°</b></td>";
			telaCadastroEstado += 			"<td><b>Descrição</b></td>";
			telaCadastroEstado += 			"<td><b>Sigla</b></td>";
			telaCadastroEstado += 		"</tr>";
			telaCadastroEstado +=		tabelaViewBody;
			telaCadastroEstado += 	"</table>";
		}
		telaCadastroEstado += "</div>";
		$("#conteudoEstado").html(telaCadastroEstado);
		for (var i = 0; i < acumularFunctionId.length; i++) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i]);
		}
	});
}
