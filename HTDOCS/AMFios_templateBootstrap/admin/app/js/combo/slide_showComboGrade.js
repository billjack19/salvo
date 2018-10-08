
function jk_slide_showDataListGrade(tabela, id_grade) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboDataList(
			"Slide_show", "funcoes_slide_showController", 
			{
				'pequisa_slide_show_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "slide_show_id", 
			[ "1","2","3","4","5","6","7" ], 
			0, [1], "", "slide_showDiv", "", 6
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='slide_show_id' disabled>";
		$("#slide_showDiv").html(campo);
	}
}

function jk_slide_showDataListGradePre(tabela, id_grade, id, valor) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboVlrPreDataList(
			"Slide_show", "funcoes_slide_showController", 
			{
				'pequisa_slide_show_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "slide_show_id", 
			[ "1","2","3","4","5","6","7" ], 
			0, [1], "", "slide_showDiv", "", 6, id, valor
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='slide_show_id' disabled>";
		$("#slide_showDiv").html(campo);
	}
}