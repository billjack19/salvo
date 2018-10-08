
function jk_destaque_grupoDataListGrade(tabela, id_grade) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboDataList(
			"Destaque_grupo", "funcoes_destaque_grupoController", 
			{
				'pequisa_destaque_grupo_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "destaque_grupo_id", 
			[ "1","2","3","4","5","6","7","8" ], 
			0, [1], "", "destaque_grupoDiv", "", 7
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='destaque_grupo_id' disabled>";
		$("#destaque_grupoDiv").html(campo);
	}
}

function jk_destaque_grupoDataListGradePre(tabela, id_grade, id, valor) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboVlrPreDataList(
			"Destaque_grupo", "funcoes_destaque_grupoController", 
			{
				'pequisa_destaque_grupo_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "destaque_grupo_id", 
			[ "1","2","3","4","5","6","7","8" ], 
			0, [1], "", "destaque_grupoDiv", "", 7, id, valor
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='destaque_grupo_id' disabled>";
		$("#destaque_grupoDiv").html(campo);
	}
}