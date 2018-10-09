
function combo_site(id, value){
	jk_comboVlrPreDataList(
		"Site", "funcoes_siteController", 
		{
			'pequisa_site': true
		}, "site_id", 
		[ "1","2","3","4","5","6","7","8","9","10","11","12","13","14","15" ], 
		0, [1], "", "siteDiv", "", 14, id, value
	);
}

function combo_site_NV(){
	jk_comboDataList(
		"Site", "funcoes_siteController", 
		{
			'pequisa_site': true
		}, "site_id", 
		[ "1","2","3","4","5","6","7","8","9","10","11","12","13","14","15" ], 
		0, [1], "", "siteDiv", "", 14
	);
}