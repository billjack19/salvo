
function jk_cliente_siteDataListGrade(tabela, id_grade) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboDataList(
			"Cliente_site", "funcoes_cliente_siteController", 
			{
				'pequisa_cliente_site_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "cliente_site_id", 
			[ "1","2","3","4","5","6","7","8","9","10","11","12","13","14" ], 
			0, [1], "", "cliente_siteDiv", "", 13
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='cliente_site_id' disabled>";
		$("#cliente_siteDiv").html(campo);
	}
}

function jk_cliente_siteDataListGradePre(tabela, id_grade, id, valor) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboVlrPreDataList(
			"Cliente_site", "funcoes_cliente_siteController", 
			{
				'pequisa_cliente_site_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "cliente_site_id", 
			[ "1","2","3","4","5","6","7","8","9","10","11","12","13","14" ], 
			0, [1], "", "cliente_siteDiv", "", 13, id, valor
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='cliente_site_id' disabled>";
		$("#cliente_siteDiv").html(campo);
	}
}