
function combo_saiba_mais(id, value){
	jk_comboVlrPreDataList(
		"Saiba_mais", "funcoes_saiba_maisController", 
		{
			'pequisa_saiba_mais': true
		}, "saiba_mais_id", 
		[ "1","2","3","4","5" ], 
		0, [1], "", "saiba_maisDiv", "", 4, id, value
	);
}

function combo_saiba_mais_NV(){
	jk_comboDataList(
		"Saiba_mais", "funcoes_saiba_maisController", 
		{
			'pequisa_saiba_mais': true
		}, "saiba_mais_id", 
		[ "1","2","3","4","5" ], 
		0, [1], "", "saiba_maisDiv", "", 4
	);
}