
function combo_orcamento(id, value){
	jk_comboVlrPreDataList(
		"Orcamento", "funcoes_orcamentoController", 
		{
			'pequisa_orcamento': true
		}, "orcamento_id", 
		[ "1","2","3","4","5","6" ], 
		0, [1], "", "orcamentoDiv", "", 5, id, value
	);
}

function combo_orcamento_NV(){
	jk_comboDataList(
		"Orcamento", "funcoes_orcamentoController", 
		{
			'pequisa_orcamento': true
		}, "orcamento_id", 
		[ "1","2","3","4","5","6" ], 
		0, [1], "", "orcamentoDiv", "", 5
	);
}