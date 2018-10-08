
function combo_usuario(id, value){
	jk_comboVlrPreDataList(
		"Usuario", "funcoes_usuarioController", 
		{
			'pequisa_usuario': true
		}, "usuario_id", 
		[ "1","2","3","4","5" ], 
		0, [1], "", "usuarioDiv", "", 4, id, value
	);
}

function combo_usuario_NV(){
	jk_comboDataList(
		"Usuario", "funcoes_usuarioController", 
		{
			'pequisa_usuario': true
		}, "usuario_id", 
		[ "1","2","3","4","5" ], 
		0, [1], "", "usuarioDiv", "", 4
	);
}