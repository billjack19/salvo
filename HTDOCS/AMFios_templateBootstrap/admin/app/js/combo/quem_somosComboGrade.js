
function jk_quem_somosDataListGrade(tabela, id_grade) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboDataList(
			"Quem_somos", "funcoes_quem_somosController", 
			{
				'pequisa_quem_somos_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "quem_somos_id", 
			[ "1","2","3","4","5" ], 
			0, [1], "", "quem_somosDiv", "", 4
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='quem_somos_id' disabled>";
		$("#quem_somosDiv").html(campo);
	}
}

function jk_quem_somosDataListGradePre(tabela, id_grade, id, valor) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboVlrPreDataList(
			"Quem_somos", "funcoes_quem_somosController", 
			{
				'pequisa_quem_somos_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "quem_somos_id", 
			[ "1","2","3","4","5" ], 
			0, [1], "", "quem_somosDiv", "", 4, id, valor
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='quem_somos_id' disabled>";
		$("#quem_somosDiv").html(campo);
	}
}