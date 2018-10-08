
function combo_upload_arq(id, value){
	jk_comboVlrPreDataList(
		"Upload_arq", "funcoes_upload_arqController", 
		{
			'pequisa_upload_arq': true
		}, "upload_arq_id", 
		[ "1","2","3","4","5" ], 
		0, [1], "", "upload_arqDiv", "", 4, id, value
	);
}

function combo_upload_arq_NV(){
	jk_comboDataList(
		"Upload_arq", "funcoes_upload_arqController", 
		{
			'pequisa_upload_arq': true
		}, "upload_arq_id", 
		[ "1","2","3","4","5" ], 
		0, [1], "", "upload_arqDiv", "", 4
	);
}