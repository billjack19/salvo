
function combo_slide_show(id, value){
	jk_comboVlrPreDataList(
		"Slide_show", "funcoes_slide_showController", 
		{
			'pequisa_slide_show': true
		}, "slide_show_id", 
		[ "1","2","3","4","5","6","7" ], 
		0, [1], "", "slide_showDiv", "", 6, id, value
	);
}

function combo_slide_show_NV(){
	jk_comboDataList(
		"Slide_show", "funcoes_slide_showController", 
		{
			'pequisa_slide_show': true
		}, "slide_show_id", 
		[ "1","2","3","4","5","6","7" ], 
		0, [1], "", "slide_showDiv", "", 6
	);
}