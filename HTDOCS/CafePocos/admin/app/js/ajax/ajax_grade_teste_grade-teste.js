
$(document).ready(function(){
	buscar_teste_grade();
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



function buscar_teste_grade(){
	
	var id_teste_grade = "";
	var descricao_teste_grade = "";
	var teste_id = "";
	var data_atualizacao_teste_grade = "";
	var usuario_id = "";
	var bool_ativo_teste_grade = "";

	var acumularFunctionId = [];
	var acumularFunctionCampo = [];
	var desabilitar = "";
	var icone_ativo = "";
	var cor_ativo = "";
	var telaCadastroTeste_grade = "";
	var valorAtivo = 0;
	var tabela_cliente = "";
	var tabelaViewBody = "";
	var simOUnao = "";
	var accesskeyEditar = " accesskey='w'";

	var grades = document.getElementsByName("grade");
	var id_tabela_primaria = 0;
	for (var i = grades.length - 1; i >= 0; i--) {
		if ($(grades[i]).data("p") == "teste" && $(grades[i]).data("g") == "teste_grade") {
			id_tabela_primaria = $(grades[i]).val();
			if (id_tabela_primaria == 0)
				window.location.assign("principal.php#!teste");
			else {
				$.ajax({
					url:'app/controllers/funcoes_testeController.php',
					type: 'POST',
					dataType: 'text',
					data: {
						'pequisa_teste_id': true,
						'id': id_tabela_primaria
					}
				}).done( function(data){
					// console.log("funcoes_testeController: "+data);
					vetor = data.split("{,}");
					document.getElementById('nomeTeste').innerHTML = vetor[1];
				});
			}
		}
	}


	$.ajax({
		url:'app/controllers/funcoes_teste_gradeController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_teste_grade_grade': true,
			'filtro': $("#pesquisa_teste_grade").val(),
			'tabela': "teste",
			'id': id_tabela_primaria
		}
	}).done( function(data){
		// _filtro_grade
		var vetor = data.split("[]");
		var subvetor = vetor[0].split("{,}");
		if (subvetor[1] == undefined) {
			telaCadastroTeste_grade += "<h3>Nenhum registro encontrado!</h3>";
		} else {
			telaCadastroTeste_grade += "<br>";

			telaCadastroTeste_grade += "<div class='bloco2'>";

			for (var i = 0; i < vetor.length; i++) {
				subvetor = vetor[i].split("{,}");

				
				id_teste_grade = subvetor[0];
				descricao_teste_grade = subvetor[1];
				teste_id = subvetor[2];
				data_atualizacao_teste_grade = subvetor[3];
				usuario_id = subvetor[4];
				bool_ativo_teste_grade = subvetor[5];
				
				acumularFunctionId.push(id_teste_grade);
				acumularFunctionCampo.push(usuario_id+"+usuario");

				if (bool_ativo_teste_grade == 1) { 
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
				tabelaViewBody +=				"<a href='principal.php#!editar_grade_teste_grade-teste' style='color: #f0ad4e;' data-id='"+id_teste_grade+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td>"+descricao_teste_grade+"</td>";
				tabelaViewBody += 			"<td>"+formatarData(data_atualizacao_teste_grade)+"</td>";
				tabelaViewBody += 			"<td><div id='usuario_"+parseInt(id_teste_grade)+"'></div></td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_teste_grade+"'>";
				tabelaViewBody += 				"<a href='#!grade_teste_grade-teste' style='color: "+cor_ativo+"' data-id='"+id_teste_grade+"' onclick=\"excluir(this , 'teste_grade', "+bool_ativo_teste_grade+", 'grade_teste_grade-teste')\" title='Excluir'>";
				tabelaViewBody += 					icone_ativo;
				tabelaViewBody +=  				"</a>";
				tabelaViewBody += 				"</div>";
				tabelaViewBody +=  			"</td>";
				tabelaViewBody += 		"</tr>";

				accesskeyEditar = "";
			}
			telaCadastroTeste_grade += 	"<table class='table'>";
			telaCadastroTeste_grade += 		"<tr bgcolor='white'>";
			telaCadastroTeste_grade += 			"<td><b>Editar</b></td>";
			telaCadastroTeste_grade += 			"<td><b>Descrição</b></td>";
			telaCadastroTeste_grade += 			"<td><b>Data Atualização</b></td>";
			telaCadastroTeste_grade += 			"<td><b>Usuário</b></td>";
			telaCadastroTeste_grade += 			"<td><b>Ativo</b></td>";
			telaCadastroTeste_grade += 		"</tr>";
			telaCadastroTeste_grade +=		tabelaViewBody;
			telaCadastroTeste_grade += 	"</table>";
		}
		telaCadastroTeste_grade += "</div>";
		$("#conteudoTeste_grade").html(telaCadastroTeste_grade);
		for (var i = acumularFunctionId.length - 1; i >= 0; i--) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i]);
		}
		var botaoBoltarGrade = verificaGrade('teste', 'teste_grade', 'Teste');
		$("#botaoVoltarGrade").html(botaoBoltarGrade);
	});
}

