
function combo_estado(id, value){
	jk_comboVlrPreDataList(
		"Estado", "funcoes_estadoController", 
		{
			'pequisa_estado': true
		}, "estado_id", 
		[ "1","2","3","4" ], 
		0, [1], "", "estadoDiv", "", 3, id, value
	);
}

function combo_estado_NV(){
	jk_comboDataList(
		"Estado", "funcoes_estadoController", 
		{
			'pequisa_estado': true
		}, "estado_id", 
		[ "1","2","3","4" ], 
		0, [1], "", "estadoDiv", "", 3
	);
}