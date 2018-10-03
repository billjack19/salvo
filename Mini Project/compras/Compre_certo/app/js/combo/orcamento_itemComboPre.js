
function combo_orcamento_item(id, value){
	jk_comboVlrPreDataList(
		"Orcamento_item", "funcoes_orcamento_itemController", 
		{
			'pequisa_orcamento_item': true
		}, "orcamento_item_id", 
		[ "1","2","3","4","5","6","7","8","9","10","11" ], 
		0, [1], "", "orcamento_itemDiv", "", 10, id, value
	);
}

function combo_orcamento_item_NV(){
	jk_comboDataList(
		"Orcamento_item", "funcoes_orcamento_itemController", 
		{
			'pequisa_orcamento_item': true
		}, "orcamento_item_id", 
		[ "1","2","3","4","5","6","7","8","9","10","11" ], 
		0, [1], "", "orcamento_itemDiv", "", 10
	);
}