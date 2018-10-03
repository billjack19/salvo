
function combo_supermercado(id, value){
	jk_comboVlrPreDataList(
		"Supermercado", "funcoes_supermercadoController", 
		{
			'pequisa_supermercado': true
		}, "supermercado_id", 
		[ "1","2","3","4","5" ], 
		0, [1], "", "supermercadoDiv", "", 4, id, value
	);
}

function combo_supermercado_NV(){
	jk_comboDataList(
		"Supermercado", "funcoes_supermercadoController", 
		{
			'pequisa_supermercado': true
		}, "supermercado_id", 
		[ "1","2","3","4","5" ], 
		0, [1], "", "supermercadoDiv", "", 4
	);
}