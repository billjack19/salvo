
function jk_item_orcamentoDataListGrade(tabela, id_grade) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboDataList(
			"Item_orcamento", "funcoes_item_orcamentoController", 
			{
				'pequisa_item_orcamento_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "item_orcamento_id", 
			[ "1","2","3","4","5","6","7" ], 
			0, [1], "", "item_orcamentoDiv", "", 6
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='item_orcamento_id' disabled>";
		$("#item_orcamentoDiv").html(campo);
	}
}

function jk_item_orcamentoDataListGradePre(tabela, id_grade, id, valor) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboVlrPreDataList(
			"Item_orcamento", "funcoes_item_orcamentoController", 
			{
				'pequisa_item_orcamento_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "item_orcamento_id", 
			[ "1","2","3","4","5","6","7" ], 
			0, [1], "", "item_orcamentoDiv", "", 6, id, valor
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='item_orcamento_id' disabled>";
		$("#item_orcamentoDiv").html(campo);
	}
}