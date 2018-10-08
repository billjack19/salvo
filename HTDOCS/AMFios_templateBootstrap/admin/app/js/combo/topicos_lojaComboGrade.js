
function jk_topicos_lojaDataListGrade(tabela, id_grade) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboDataList(
			"Topicos_loja", "funcoes_topicos_lojaController", 
			{
				'pequisa_topicos_loja_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "topicos_loja_id", 
			[ "1","2","3","4","5","6" ], 
			0, [1], "", "topicos_lojaDiv", "", 5
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='topicos_loja_id' disabled>";
		$("#topicos_lojaDiv").html(campo);
	}
}

function jk_topicos_lojaDataListGradePre(tabela, id_grade, id, valor) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboVlrPreDataList(
			"Topicos_loja", "funcoes_topicos_lojaController", 
			{
				'pequisa_topicos_loja_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "topicos_loja_id", 
			[ "1","2","3","4","5","6" ], 
			0, [1], "", "topicos_lojaDiv", "", 5, id, valor
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='topicos_loja_id' disabled>";
		$("#topicos_lojaDiv").html(campo);
	}
}