
function combo_quem_somos(id, value){
	jk_comboVlrPreDataList(
		"Quem_somos", "funcoes_quem_somosController", 
		{
			'pequisa_quem_somos': true
		}, "quem_somos_id", 
		[ "1","2","3","4","5" ], 
		0, [1], "", "quem_somosDiv", "", 4, id, value
	);
}

function combo_quem_somos_NV(){
	jk_comboDataList(
		"Quem_somos", "funcoes_quem_somosController", 
		{
			'pequisa_quem_somos': true
		}, "quem_somos_id", 
		[ "1","2","3","4","5" ], 
		0, [1], "", "quem_somosDiv", "", 4
	);
}