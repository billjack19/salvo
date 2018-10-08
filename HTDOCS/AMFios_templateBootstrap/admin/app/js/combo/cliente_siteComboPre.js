
function combo_cliente_site(id, value){
	jk_comboVlrPreDataList(
		"Cliente_site", "funcoes_cliente_siteController", 
		{
			'pequisa_cliente_site': true
		}, "cliente_site_id", 
		[ "1","2","3","4","5","6","7","8","9","10","11","12","13","14" ], 
		0, [1], "", "cliente_siteDiv", "", 13, id, value
	);
}

function combo_cliente_site_NV(){
	jk_comboDataList(
		"Cliente_site", "funcoes_cliente_siteController", 
		{
			'pequisa_cliente_site': true
		}, "cliente_site_id", 
		[ "1","2","3","4","5","6","7","8","9","10","11","12","13","14" ], 
		0, [1], "", "cliente_siteDiv", "", 13
	);
}