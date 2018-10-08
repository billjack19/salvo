
function combo_teste(id, value){
	jk_comboVlrPreDataList(
		"Teste", "funcoes_testeController", 
		{
			'pequisa_teste': true
		}, "teste_id", 
		[ "1","2","3","4","5" ], 
		0, [1], "", "testeDiv", "", 4, id, value
	);
}

function combo_teste_NV(){
	jk_comboDataList(
		"Teste", "funcoes_testeController", 
		{
			'pequisa_teste': true
		}, "teste_id", 
		[ "1","2","3","4","5" ], 
		0, [1], "", "testeDiv", "", 4
	);
}