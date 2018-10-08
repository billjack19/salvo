
function combo_relatorios(id, value){
	jk_comboVlrPreDataList(
		"Relatorios", "funcoes_relatoriosController", 
		{
			'pequisa_relatorios': true
		}, "relatorios_id", 
		[ "1","2","3","4","5","6" ], 
		0, [1], "", "relatoriosDiv", "", 5, id, value
	);
}

function combo_relatorios_NV(){
	jk_comboDataList(
		"Relatorios", "funcoes_relatoriosController", 
		{
			'pequisa_relatorios': true
		}, "relatorios_id", 
		[ "1","2","3","4","5","6" ], 
		0, [1], "", "relatoriosDiv", "", 5
	);
}