
function combo_cliefornec(id, value){
	jk_comboVlrPreDataList(
		"Cliefornec", "funcoes_cliefornecController", 
		{
			'pequisa_cliefornec': true
		}, "cliefornec_id", 
		[ "1","2","3","4","5","6" ], 
		0, [1], "", "cliefornecDiv", "", 5, id, value
	);
}

function combo_cliefornec_NV(){
	jk_comboDataList(
		"Cliefornec", "funcoes_cliefornecController", 
		{
			'pequisa_cliefornec': true
		}, "cliefornec_id", 
		[ "1","2","3","4","5","6" ], 
		0, [1], "", "cliefornecDiv", "", 5
	);
}