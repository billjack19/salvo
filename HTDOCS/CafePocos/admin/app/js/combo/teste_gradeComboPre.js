
function combo_teste_grade(id, value){
	jk_comboVlrPreDataList(
		"Teste_grade", "funcoes_teste_gradeController", 
		{
			'pequisa_teste_grade': true
		}, "teste_grade_id", 
		[ "1","2","3","4","5","6" ], 
		0, [1], "", "teste_gradeDiv", "", 5, id, value
	);
}

function combo_teste_grade_NV(){
	jk_comboDataList(
		"Teste_grade", "funcoes_teste_gradeController", 
		{
			'pequisa_teste_grade': true
		}, "teste_grade_id", 
		[ "1","2","3","4","5","6" ], 
		0, [1], "", "teste_gradeDiv", "", 5
	);
}