
function jk_configurar_siteDataListGrade(tabela, id_grade) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboDataList(
			"Configurar_site", "funcoes_configurar_siteController", 
			{
				'pequisa_configurar_site_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "configurar_site_id", 
			[ "1","2","3","4","5","6","7","8","9" ], 
			0, [1], "", "configurar_siteDiv", "", 8
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='configurar_site_id' disabled>";
		$("#configurar_siteDiv").html(campo);
	}
}

function jk_configurar_siteDataListGradePre(tabela, id_grade, id, valor) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboVlrPreDataList(
			"Configurar_site", "funcoes_configurar_siteController", 
			{
				'pequisa_configurar_site_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "configurar_site_id", 
			[ "1","2","3","4","5","6","7","8","9" ], 
			0, [1], "", "configurar_siteDiv", "", 8, id, valor
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='configurar_site_id' disabled>";
		$("#configurar_siteDiv").html(campo);
	}
}