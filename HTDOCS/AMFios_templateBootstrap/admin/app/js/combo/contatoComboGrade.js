
function jk_contatoDataListGrade(tabela, id_grade) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboDataList(
			"Contato", "funcoes_contatoController", 
			{
				'pequisa_contato_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "contato_id", 
			[ "1","2","3","4","5","6","7","8","9" ], 
			0, [1], "", "contatoDiv", "", 8
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='contato_id' disabled>";
		$("#contatoDiv").html(campo);
	}
}

function jk_contatoDataListGradePre(tabela, id_grade, id, valor) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboVlrPreDataList(
			"Contato", "funcoes_contatoController", 
			{
				'pequisa_contato_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "contato_id", 
			[ "1","2","3","4","5","6","7","8","9" ], 
			0, [1], "", "contatoDiv", "", 8, id, valor
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='contato_id' disabled>";
		$("#contatoDiv").html(campo);
	}
}