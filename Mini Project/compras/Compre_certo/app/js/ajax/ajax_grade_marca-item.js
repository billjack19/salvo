
$(document).ready(function(){
	buscar_marca();
});

/*function setarValorEstrangeiroLista(id, tabelaEstrangeira){
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
}*/



function buscar_marca(){
	
	var id_marca = "";
	var descricao_marca = "";
	var item_id = "";
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

	var grades = document.getElementsByName("grade");
	var id_tabela_primaria = 0;
	for (var i = grades.length - 1; i >= 0; i--) {
		if ($(grades[i]).data("p") == "item" && $(grades[i]).data("g") == "marca") {
			id_tabela_primaria = $(grades[i]).val();
			if (id_tabela_primaria == 0)
				window.location.assign("principal.php#!item");
			else {
				$.ajax({
					url:'app/controllers/funcoes_itemController.php',
					type: 'POST',
					dataType: 'text',
					data: {
						'pequisa_item_id': true,
						'id': id_tabela_primaria
					}
				}).done( function(data){
					// console.log("funcoes_itemController: "+data);
					vetor = data.split("{,}");
					document.getElementById('nomeItem').innerHTML = vetor[1];
				});
			}
		}
	}


	$.ajax({
		url:'app/controllers/funcoes_marcaController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_marca_grade': true,
			'filtro': $("#pesquisa_marca").val(),
			'tabela': "item",
			'id': id_tabela_primaria
		}
	}).done( function(data){
		// _filtro_grade
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
				item_id = subvetor[2];
				data_atualizacao_marca = subvetor[3];
				usuario_id = subvetor[4];
				bool_ativo_marca = subvetor[5];
				
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
				tabelaViewBody +=				"<a href='principal.php#!editar_grade_marca-item' style='color: #f0ad4e;' data-id='"+id_marca+"' onclick='editar(this);' title='Editar'"+accesskeyEditar+" "+desabilitar+">";
				tabelaViewBody +=				 	"<b><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></b>";
				tabelaViewBody += 				"</a>";
				tabelaViewBody +=			"</td>";
				tabelaViewBody += 			"<td align='center'>";
				tabelaViewBody += 				"<div  id='ativo_"+id_marca+"'>";
				tabelaViewBody += 				"<a href='#!grade_marca-item' style='color: "+cor_ativo+"' data-id='"+id_marca+"' onclick=\"excluir(this , 'marca', "+bool_ativo_marca+", 'grade_marca-item')\" title='Excluir'>";
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
		for (var i = acumularFunctionId.length - 1; i >= 0; i--) {
			setarValorEstrangeiroLista(acumularFunctionId[i], acumularFunctionCampo[i], "");
		}
		var botaoBoltarGrade = verificaGrade('item', 'marca', 'Item');
		$("#botaoVoltarGrade").html(botaoBoltarGrade);
	});
}