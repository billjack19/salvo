
function combo_videos(id, value){
	jk_comboVlrPreDataList(
		"Videos", "funcoes_videosController", 
		{
			'pequisa_videos': true
		}, "videos_id", 
		[ "1","2","3","4","5" ], 
		0, [1], "", "videosDiv", "", 4, id, value
	);
}

function combo_videos_NV(){
	jk_comboDataList(
		"Videos", "funcoes_videosController", 
		{
			'pequisa_videos': true
		}, "videos_id", 
		[ "1","2","3","4","5" ], 
		0, [1], "", "videosDiv", "", 4
	);
}