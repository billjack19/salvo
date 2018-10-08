
function jk_siteDataListGrade(tabela, id_grade) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboDataList(
			"Site", "funcoes_siteController", 
			{
				'pequisa_site_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "site_id", 
			[ "1","2","3","4","5","6","7","8","9","10","11","12","13","14","15" ], 
			0, [1], "", "siteDiv", "", 14
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='site_id' disabled>";
		$("#siteDiv").html(campo);
	}
}

function jk_siteDataListGradePre(tabela, id_grade, id, valor) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboVlrPreDataList(
			"Site", "funcoes_siteController", 
			{
				'pequisa_site_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "site_id", 
			[ "1","2","3","4","5","6","7","8","9","10","11","12","13","14","15" ], 
			0, [1], "", "siteDiv", "", 14, id, valor
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='site_id' disabled>";
		$("#siteDiv").html(campo);
	}
}