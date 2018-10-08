
function combo_adicional_site(id, value){
	jk_comboVlrPreDataList(
		"Adicional_site", "funcoes_adicional_siteController", 
		{
			'pequisa_adicional_site': true
		}, "adicional_site_id", 
		[ "1","2","3","4","5","6","7","8" ], 
		0, [1], "", "adicional_siteDiv", "", 7, id, value
	);
}

function combo_adicional_site_NV(){
	jk_comboDataList(
		"Adicional_site", "funcoes_adicional_siteController", 
		{
			'pequisa_adicional_site': true
		}, "adicional_site_id", 
		[ "1","2","3","4","5","6","7","8" ], 
		0, [1], "", "adicional_siteDiv", "", 7
	);
}