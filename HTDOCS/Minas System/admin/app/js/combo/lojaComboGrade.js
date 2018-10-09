
function jk_lojaDataListGrade(tabela, id_grade) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboDataList(
			"Loja", "funcoes_lojaController", 
			{
				'pequisa_loja_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "loja_id", 
			[ "1","2","3","4","5","6","7" ], 
			0, [1], "", "lojaDiv", "", 6
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='loja_id' disabled>";
		$("#lojaDiv").html(campo);
	}
}

function jk_lojaDataListGradePre(tabela, id_grade, id, valor) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboVlrPreDataList(
			"Loja", "funcoes_lojaController", 
			{
				'pequisa_loja_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "loja_id", 
			[ "1","2","3","4","5","6","7" ], 
			0, [1], "", "lojaDiv", "", 6, id, valor
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='loja_id' disabled>";
		$("#lojaDiv").html(campo);
	}
}