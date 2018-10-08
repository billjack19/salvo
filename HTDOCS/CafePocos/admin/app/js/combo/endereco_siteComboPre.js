
function combo_endereco_site(id, value){
	jk_comboVlrPreDataList(
		"Endereco_site", "funcoes_endereco_siteController", 
		{
			'pequisa_endereco_site': true
		}, "endereco_site_id", 
		[ "1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18" ], 
		0, [1], "", "endereco_siteDiv", "", 17, id, value
	);
}

function combo_endereco_site_NV(){
	jk_comboDataList(
		"Endereco_site", "funcoes_endereco_siteController", 
		{
			'pequisa_endereco_site': true
		}, "endereco_site_id", 
		[ "1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18" ], 
		0, [1], "", "endereco_siteDiv", "", 17
	);
}