
function combo_marca(id, value){
	jk_comboVlrPreDataList(
		"Marca", "funcoes_marcaController", 
		{
			'pequisa_marca': true
		}, "marca_id", 
		[ "1","2","3","4","5" ], 
		0, [1], "", "marcaDiv", "", 4, id, value
	);
}

function combo_marca_NV(){
	jk_comboDataList(
		"Marca", "funcoes_marcaController", 
		{
			'pequisa_marca': true
		}, "marca_id", 
		[ "1","2","3","4","5" ], 
		0, [1], "", "marcaDiv", "", 4
	);
}