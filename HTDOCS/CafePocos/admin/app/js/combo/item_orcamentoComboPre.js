
function combo_item_orcamento(id, value){
	jk_comboVlrPreDataList(
		"Item_orcamento", "funcoes_item_orcamentoController", 
		{
			'pequisa_item_orcamento': true
		}, "item_orcamento_id", 
		[ "1","2","3","4","5","6","7" ], 
		0, [1], "", "item_orcamentoDiv", "", 6, id, value
	);
}

function combo_item_orcamento_NV(){
	jk_comboDataList(
		"Item_orcamento", "funcoes_item_orcamentoController", 
		{
			'pequisa_item_orcamento': true
		}, "item_orcamento_id", 
		[ "1","2","3","4","5","6","7" ], 
		0, [1], "", "item_orcamentoDiv", "", 6
	);
}