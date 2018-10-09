
function jk_saiba_maisDataListGrade(tabela, id_grade) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboDataList(
			"Saiba_mais", "funcoes_saiba_maisController", 
			{
				'pequisa_saiba_mais_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "saiba_mais_id", 
			[ "1","2","3","4","5" ], 
			0, [1], "", "saiba_maisDiv", "", 4
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='saiba_mais_id' disabled>";
		$("#saiba_maisDiv").html(campo);
	}
}

function jk_saiba_maisDataListGradePre(tabela, id_grade, id, valor) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboVlrPreDataList(
			"Saiba_mais", "funcoes_saiba_maisController", 
			{
				'pequisa_saiba_mais_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "saiba_mais_id", 
			[ "1","2","3","4","5" ], 
			0, [1], "", "saiba_maisDiv", "", 4, id, valor
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='saiba_mais_id' disabled>";
		$("#saiba_maisDiv").html(campo);
	}
}