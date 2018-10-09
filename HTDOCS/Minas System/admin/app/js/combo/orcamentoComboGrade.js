
function jk_orcamentoDataListGrade(tabela, id_grade) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboDataList(
			"Orcamento", "funcoes_orcamentoController", 
			{
				'pequisa_orcamento_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "orcamento_id", 
			[ "1","2","3","4","5" ], 
			0, [1], "", "orcamentoDiv", "", 4
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='orcamento_id' disabled>";
		$("#orcamentoDiv").html(campo);
	}
}

function jk_orcamentoDataListGradePre(tabela, id_grade, id, valor) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboVlrPreDataList(
			"Orcamento", "funcoes_orcamentoController", 
			{
				'pequisa_orcamento_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "orcamento_id", 
			[ "1","2","3","4","5" ], 
			0, [1], "", "orcamentoDiv", "", 4, id, valor
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='orcamento_id' disabled>";
		$("#orcamentoDiv").html(campo);
	}
}