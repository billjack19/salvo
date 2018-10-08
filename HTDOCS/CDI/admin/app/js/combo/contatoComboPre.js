
function combo_contato(id, value){
	jk_comboVlrPreDataList(
		"Contato", "funcoes_contatoController", 
		{
			'pequisa_contato': true
		}, "contato_id", 
		[ "1","2","3","4","5","6","7","8","9" ], 
		0, [1], "", "contatoDiv", "", 8, id, value
	);
}

function combo_contato_NV(){
	jk_comboDataList(
		"Contato", "funcoes_contatoController", 
		{
			'pequisa_contato': true
		}, "contato_id", 
		[ "1","2","3","4","5","6","7","8","9" ], 
		0, [1], "", "contatoDiv", "", 8
	);
}