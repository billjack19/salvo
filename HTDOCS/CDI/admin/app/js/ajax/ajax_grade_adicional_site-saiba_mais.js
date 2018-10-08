
$(document).ready(function(){
	buscar_adicional_site();
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



function buscar_adicional_site(){
	
	var id_adicional_site = "";
	var titulo_adicional_site = "";
	var descricao_adicional_site = "";
	var imagem_adicional_site = "";
	var saiba_mais_id = "";
	var usuario_id = "";
	var data_atualizacao_adicional_site = "";
	var bool_ativo_adicional_site = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroAdicional_site = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var numeroRegAtual = 1;
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	var grades = document.getElementsByName("grade");
	var id_tabela_primaria = 0;
	for (var i = grades.length - 1; i >= 0; i--) {
		if ($(grades[i]).data("p") == "saiba_mais" && $(grades[i]).data("g") == "adicional_site") {
			id_tabela_primaria = $(grades[i]).val();
			if (id_tabela_primaria == 0)
				window.location.assign("principal.php#!saiba_mais");
			else {
				$.ajax({
					url:'app/controllers/funcoes_saiba_maisController.php',
					type: 'POST',
					dataType: 'text',
					data: {
						'pequisa_saiba_mais_id': true,
						'id': id_tabela_primaria
					}
				}).done( function(data){
					// console.log("funcoes_saiba_maisController: "+data);
					vetor = data.split("{,}");
					document.getElementById('nomeSaiba_mais').innerHTML = vetor[1];
				});
			}
		}
	}


	$.ajax({
		url:'app/controllers/funcoes_adicional_siteController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_adicional_site_grade': true,
			'filtro': $("#pesquisa_adicional_site").val(),
			'tabela': "saiba_mais",
			'id': id_tabela_primaria
		}
	}).done( function(data){
		// _filtro_grade
		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroAdicional_site += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroAdicional_site += "<br>";

			telaCadastroAdicional_site += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_adicional_site = subvetor[0];
				titulo_adicional_site = subvetor[1];
				descricao_adicional_site = subvetor[2];
				imagem_adicional_site = subvetor[3];
				saiba_mais_id = subvetor[4];
				usuario_id = subvetor[5];
				data_atualizacao_adicional_site = subvetor[6];
				bool_ativo_adicional_site = subvetor[7];
				
				acumularFunctionId.push(id_adicional_site);
				acumularFunctionCampo.push(usuario_id+"+usuario");

				if (bool_ativo_adicional_site == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_grade_adicional_site-saiba_mais' style='color: #f0ad4e;' data-id='"+id_adicional_site+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_adicional_site+"'>";
				tabelaViewBody += 				"<a href='#!grade_adicional_site-saiba_mais' style='color: "+cor_ativo+"' data-id='"+id_adicional_site+"' onclick=\"excluir(this , 'adicional_site', "+bool_ativo_adicional_site+", 'grade_adicional_site-saiba_mais')\" title='Excluir'>";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody +=			"<td align='center'>";
				tabelaViewBody +=				numeroRegAtual;
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+titulo_adicional_site+"</td>";
				tabelaViewBody += 			"<td>"+descricao_adicional_site+"</td>";
				tabelaViewBody += 			"<td>"+imagem_adicional_site+"</td>";
				tabelaViewBody += 			"<td><div id='usuario_"+parseInt(id_adicional_site)+"'></div></td>";
				tabelaViewBody += 			"<td>"+formatarData(data_atualizacao_adicional_site)+"</td>";
				tabelaViewBody += 		"</tr>";

				numeroRegAtual++;
				accesskeyEditar = "";
			}
			telaCadastroAdicional_site += 	"<table class='table'>";
			telaCadastroAdicional_site += 		"<tr bgcolor='white'>";
			telaCadastroAdicional_site += 			"<td><b>Editar</b></td>";
			telaCadastroAdicional_site += 			"<td><b>Ativo</b></td>";
			telaCadastroAdicional_site += 			"<td><b>N°</b></td>";
			telaCadastroAdicional_site += 			"<td><b>Titulo</b></td>";
			telaCadastroAdicional_site += 			"<td><b>Descrição</b></td>";
			telaCadastroAdicional_site += 			"<td><b>Imagem</b></td>";
			telaCadastroAdicional_site += 			"<td><b>Usuário</b></td>";
			telaCadastroAdicional_site += 			"<td><b>Data Atualização</b></td>";
			telaCadastroAdicional_site += 		"</tr>";
			telaCadastroAdicional_site +=		tabelaViewBody;
			telaCadastroAdicional_site += 	"</table>";
		}
		telaCadastroAdicional_site += "</div>";
		$("#conteudoAdicional_site").html(telaCadastroAdicional_site);
		for (var i = acumularFunctionId.length - 1; i >= 0; i--) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i]);
		}
		var botaoBoltarGrade = verificaGrade('saiba_mais', 'adicional_site', 'Saiba Mais');
		$("#botaoVoltarGrade").html(botaoBoltarGrade);
	});
}

