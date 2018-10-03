
function combo_lanc_preco(id, value){
	jk_comboVlrPreDataList(
		"Lanc_preco", "funcoes_lanc_precoController", 
		{
			'pequisa_lanc_preco': true
		}, "lanc_preco_id", 
		[ "1","2","3","4","5","6","7","8" ], 
		0, [1], "", "lanc_precoDiv", "", 7, id, value
	);
}

function combo_lanc_preco_NV(){
	jk_comboDataList(
		"Lanc_preco", "funcoes_lanc_precoController", 
		{
			'pequisa_lanc_preco': true
		}, "lanc_preco_id", 
		[ "1","2","3","4","5","6","7","8" ], 
		0, [1], "", "lanc_precoDiv", "", 7
	);
}