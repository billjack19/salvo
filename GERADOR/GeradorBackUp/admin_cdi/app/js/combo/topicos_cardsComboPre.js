
function combo_topicos_cards(id, value){
	jk_comboVlrPreDataList(
		"Topicos_cards", "funcoes_topicos_cardsController", 
		{
			'pequisa_topicos_cards': true
		}, "topicos_cards_id", 
		[ "1","2","3","4","5","6" ], 
		0, [1], "", "topicos_cardsDiv", "", 5, id, value
	);
}

function combo_topicos_cards_NV(){
	jk_comboDataList(
		"Topicos_cards", "funcoes_topicos_cardsController", 
		{
			'pequisa_topicos_cards': true
		}, "topicos_cards_id", 
		[ "1","2","3","4","5","6" ], 
		0, [1], "", "topicos_cardsDiv", "", 5
	);
}