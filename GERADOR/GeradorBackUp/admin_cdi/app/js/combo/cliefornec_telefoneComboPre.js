
function combo_cliefornec_telefone(id, value){
	jk_comboVlrPreDataList(
		"Cliefornec_telefone", "funcoes_cliefornec_telefoneController", 
		{
			'pequisa_cliefornec_telefone': true
		}, "cliefornec_telefone_id", 
		[ "1","2","3","4" ], 
		0, [1], "", "cliefornec_telefoneDiv", "", 3, id, value
	);
}

function combo_cliefornec_telefone_NV(){
	jk_comboDataList(
		"Cliefornec_telefone", "funcoes_cliefornec_telefoneController", 
		{
			'pequisa_cliefornec_telefone': true
		}, "cliefornec_telefone_id", 
		[ "1","2","3","4" ], 
		0, [1], "", "cliefornec_telefoneDiv", "", 3
	);
}