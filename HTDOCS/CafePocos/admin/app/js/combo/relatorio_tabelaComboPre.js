
function combo_relatorio_tabela(id, value){
	jk_comboVlrPreDataList(
		"Relatorio_tabela", "funcoes_relatorio_tabelaController", 
		{
			'pequisa_relatorio_tabela': true
		}, "relatorio_tabela_id", 
		[ "1","2","3","4" ], 
		0, [1], "", "relatorio_tabelaDiv", "", 3, id, value
	);
}

function combo_relatorio_tabela_NV(){
	jk_comboDataList(
		"Relatorio_tabela", "funcoes_relatorio_tabelaController", 
		{
			'pequisa_relatorio_tabela': true
		}, "relatorio_tabela_id", 
		[ "1","2","3","4" ], 
		0, [1], "", "relatorio_tabelaDiv", "", 3
	);
}