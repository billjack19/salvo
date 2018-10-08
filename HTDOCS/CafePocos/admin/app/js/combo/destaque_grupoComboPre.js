
function combo_destaque_grupo(id, value){
	jk_comboVlrPreDataList(
		"Destaque_grupo", "funcoes_destaque_grupoController", 
		{
			'pequisa_destaque_grupo': true
		}, "destaque_grupo_id", 
		[ "1","2","3","4","5","6","7","8" ], 
		0, [1], "", "destaque_grupoDiv", "", 7, id, value
	);
}

function combo_destaque_grupo_NV(){
	jk_comboDataList(
		"Destaque_grupo", "funcoes_destaque_grupoController", 
		{
			'pequisa_destaque_grupo': true
		}, "destaque_grupo_id", 
		[ "1","2","3","4","5","6","7","8" ], 
		0, [1], "", "destaque_grupoDiv", "", 7
	);
}