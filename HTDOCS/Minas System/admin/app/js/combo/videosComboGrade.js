
function jk_videosDataListGrade(tabela, id_grade) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboDataList(
			"Videos", "funcoes_videosController", 
			{
				'pequisa_videos_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "videos_id", 
			[ "1","2","3","4","5" ], 
			0, [1], "", "videosDiv", "", 4
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='videos_id' disabled>";
		$("#videosDiv").html(campo);
	}
}

function jk_videosDataListGradePre(tabela, id_grade, id, valor) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboVlrPreDataList(
			"Videos", "funcoes_videosController", 
			{
				'pequisa_videos_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "videos_id", 
			[ "1","2","3","4","5" ], 
			0, [1], "", "videosDiv", "", 4, id, valor
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='videos_id' disabled>";
		$("#videosDiv").html(campo);
	}
}