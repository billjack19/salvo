
function combo_cards(id, value){
	jk_comboVlrPreDataList(
		"Cards", "funcoes_cardsController", 
		{
			'pequisa_cards': true
		}, "cards_id", 
		[ "1","2","3","4","5","6","7","8","9" ], 
		0, [1], "", "cardsDiv", "", 8, id, value
	);
}

function combo_cards_NV(){
	jk_comboDataList(
		"Cards", "funcoes_cardsController", 
		{
			'pequisa_cards': true
		}, "cards_id", 
		[ "1","2","3","4","5","6","7","8","9" ], 
		0, [1], "", "cardsDiv", "", 8
	);
}