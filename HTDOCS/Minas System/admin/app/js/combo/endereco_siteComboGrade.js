
function jk_endereco_siteDataListGrade(tabela, id_grade) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboDataList(
			"Endereco_site", "funcoes_endereco_siteController", 
			{
				'pequisa_endereco_site_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "endereco_site_id", 
			[ "1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18" ], 
			0, [1], "", "endereco_siteDiv", "", 17
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='endereco_site_id' disabled>";
		$("#endereco_siteDiv").html(campo);
	}
}

function jk_endereco_siteDataListGradePre(tabela, id_grade, id, valor) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboVlrPreDataList(
			"Endereco_site", "funcoes_endereco_siteController", 
			{
				'pequisa_endereco_site_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "endereco_site_id", 
			[ "1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18" ], 
			0, [1], "", "endereco_siteDiv", "", 17, id, valor
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='endereco_site_id' disabled>";
		$("#endereco_siteDiv").html(campo);
	}
}