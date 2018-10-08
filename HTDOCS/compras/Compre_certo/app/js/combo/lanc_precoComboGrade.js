
function jk_lanc_precoDataListGrade(tabela, id_grade) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboDataList(
			"Lanc_preco", "funcoes_lanc_precoController", 
			{
				'pequisa_lanc_preco_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "lanc_preco_id", 
			[ "1","2","3","4","5","6","7","8" ], 
			0, [1], "", "lanc_precoDiv", "", 7
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='lanc_preco_id' disabled>";
		$("#lanc_precoDiv").html(campo);
	}
}

function jk_lanc_precoDataListGradePre(tabela, id_grade, id, valor) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboVlrPreDataList(
			"Lanc_preco", "funcoes_lanc_precoController", 
			{
				'pequisa_lanc_preco_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "lanc_preco_id", 
			[ "1","2","3","4","5","6","7","8" ], 
			0, [1], "", "lanc_precoDiv", "", 7, id, valor
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='lanc_preco_id' disabled>";
		$("#lanc_precoDiv").html(campo);
	}
}