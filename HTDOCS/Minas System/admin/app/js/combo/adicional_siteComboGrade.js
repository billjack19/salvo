
function jk_adicional_siteDataListGrade(tabela, id_grade) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboDataList(
			"Adicional_site", "funcoes_adicional_siteController", 
			{
				'pequisa_adicional_site_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "adicional_site_id", 
			[ "1","2","3","4","5","6","7","8" ], 
			0, [1], "", "adicional_siteDiv", "", 7
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='adicional_site_id' disabled>";
		$("#adicional_siteDiv").html(campo);
	}
}

function jk_adicional_siteDataListGradePre(tabela, id_grade, id, valor) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboVlrPreDataList(
			"Adicional_site", "funcoes_adicional_siteController", 
			{
				'pequisa_adicional_site_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "adicional_site_id", 
			[ "1","2","3","4","5","6","7","8" ], 
			0, [1], "", "adicional_siteDiv", "", 7, id, valor
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='adicional_site_id' disabled>";
		$("#adicional_siteDiv").html(campo);
	}
}