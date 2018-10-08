
function jk_marcaDataListGrade(tabela, id_grade) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboDataList(
			"Marca", "funcoes_marcaController", 
			{
				'pequisa_marca_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "marca_id", 
			[ "1","2","3","4","5" ], 
			0, [1], "", "marcaDiv", "", 4
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='marca_id' disabled>";
		$("#marcaDiv").html(campo);
	}
}

function jk_marcaDataListGradePre(tabela, id_grade, id, valor) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboVlrPreDataList(
			"Marca", "funcoes_marcaController", 
			{
				'pequisa_marca_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "marca_id", 
			[ "1","2","3","4","5" ], 
			0, [1], "", "marcaDiv", "", 4, id, valor
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='marca_id' disabled>";
		$("#marcaDiv").html(campo);
	}
}