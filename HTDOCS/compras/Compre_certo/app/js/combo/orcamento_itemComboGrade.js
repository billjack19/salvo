
function jk_orcamento_itemDataListGrade(tabela, id_grade) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboDataList(
			"Orcamento_item", "funcoes_orcamento_itemController", 
			{
				'pequisa_orcamento_item_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "orcamento_item_id", 
			[ "1","2","3","4","5","6","7","8","9","10","11" ], 
			0, [1], "", "orcamento_itemDiv", "", 10
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='orcamento_item_id' disabled>";
		$("#orcamento_itemDiv").html(campo);
	}
}

function jk_orcamento_itemDataListGradePre(tabela, id_grade, id, valor) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboVlrPreDataList(
			"Orcamento_item", "funcoes_orcamento_itemController", 
			{
				'pequisa_orcamento_item_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "orcamento_item_id", 
			[ "1","2","3","4","5","6","7","8","9","10","11" ], 
			0, [1], "", "orcamento_itemDiv", "", 10, id, valor
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='orcamento_item_id' disabled>";
		$("#orcamento_itemDiv").html(campo);
	}
}