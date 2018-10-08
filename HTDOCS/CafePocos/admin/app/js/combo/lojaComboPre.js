
function combo_loja(id, value){
	jk_comboVlrPreDataList(
		"Loja", "funcoes_lojaController", 
		{
			'pequisa_loja': true
		}, "loja_id", 
		[ "1","2","3","4","5","6","7" ], 
		0, [1], "", "lojaDiv", "", 6, id, value
	);
}

function combo_loja_NV(){
	jk_comboDataList(
		"Loja", "funcoes_lojaController", 
		{
			'pequisa_loja': true
		}, "loja_id", 
		[ "1","2","3","4","5","6","7" ], 
		0, [1], "", "lojaDiv", "", 6
	);
}