
function jk_cardsDataListGrade(tabela, id_grade) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboDataList(
			"Cards", "funcoes_cardsController", 
			{
				'pequisa_cards_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "cards_id", 
			[ "1","2","3","4","5","6","7" ], 
			0, [1], "", "cardsDiv", "", 6
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='cards_id' disabled>";
		$("#cardsDiv").html(campo);
	}
}

function jk_cardsDataListGradePre(tabela, id_grade, id, valor) {
	if (id_grade != "" && id_grade != 0) {
		jk_comboVlrPreDataList(
			"Cards", "funcoes_cardsController", 
			{
				'pequisa_cards_grade': true,
				'tabela': tabela,
				'id': id_grade
			}, "cards_id", 
			[ "1","2","3","4","5","6","7" ], 
			0, [1], "", "cardsDiv", "", 6, id, valor
		);
	}
	else {
		var campo = "<input type='text' value='Aguardando seleção...' class='form-control' id='cards_id' disabled>";
		$("#cardsDiv").html(campo);
	}
}