
jk_comboDataList(
	"Orcamento", "funcoes_orcamentoController", 
	{
		'pequisa_orcamento_grade': true,
		'tabela': "cliente_site",
		'id': $("#cliente_site_id").val()
	}, "orcamento_id", 
	[ "1","2","3","4","5" ], 
	0, [1], "", "orcamentoDiv", "", 4
);