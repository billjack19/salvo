
function combo_jogadores(id, value){
	jk_comboVlrPreDataList(
		"Jogadores", "funcoes_jogadoresController", 
		{
			'pequisa_jogadores': true
		}, "jogadores_id", 
		[ "1","2","3","4","5","6","7" ], 
		0, [1], "", "jogadoresDiv", "", 6, id, value
	);
}

function combo_jogadores_NV(){
	jk_comboDataList(
		"Jogadores", "funcoes_jogadoresController", 
		{
			'pequisa_jogadores': true
		}, "jogadores_id", 
		[ "1","2","3","4","5","6","7" ], 
		0, [1], "", "jogadoresDiv", "", 6
	);
}