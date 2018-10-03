
function jk_supermercadoDataListGrade(tabela, id_grade) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboDataList(
			"Supermercado", "funcoes_supermercadoController", 
			{
				'pequisa_supermercado_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "supermercado_id", 
			[ "1","2","3","4","5" ], 
			0, [1], "", "supermercadoDiv", "", 4
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='supermercado_id' disabled>";
		$("#supermercadoDiv").html(campo);
	}
}

function jk_supermercadoDataListGradePre(tabela, id_grade, id, valor) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboVlrPreDataList(
			"Supermercado", "funcoes_supermercadoController", 
			{
				'pequisa_supermercado_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "supermercado_id", 
			[ "1","2","3","4","5" ], 
			0, [1], "", "supermercadoDiv", "", 4, id, valor
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='supermercado_id' disabled>";
		$("#supermercadoDiv").html(campo);
	}
}