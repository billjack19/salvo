
$(document).ready(function(){
	var id_videos = "";
	var descricao_videos = "";
	var link_videos = "";
	var data_atualizacao_videos = "";
	var bool_ativo_videos = "";

	var vetor = [];
	$.ajax({
		url:'app/controllers/funcoesController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'editar': true,
			'id': $("#editar").val()
		}
	}).done( function(data){});

	$.ajax({
		url:'app/controllers/funcoes_videosController.php',
		type: 'POST',
		dataType: 'text',
		data: { 
			'pequisa_videos_id': true,
			'id': $("#editar").val()
		}
	}).done( function(data){
		vetor = data.split("{,}");

		id_videos = vetor[0];
		
		descricao_videos = vetor[1];
		link_videos = vetor[2];
		data_atualizacao_videos = vetor[3];
		bool_ativo_videos = vetor[4];
		
		$("#descricao_videos").val(descricao_videos);
		$("#link_videos").val(link_videos);
		$("#data_atualizacao_videos").val(data_atualizacao_videos);
		$("#bool_ativo_videos").val(bool_ativo_videos);
		
	});
});


function atualizarrRegistro(){
	var campoFocus = "";
		 if($("#link_videos").val() == "") campoFocus = "link_videos";


	else {
		$.ajax({
			url:'app/controllers/atualiza_videosController.php',
			type: 'POST',
			dataType: 'text',
			data: {
				'id_videos': $("#editar").val(),
				'descricao_videos': $("#descricao_videos").val(),
				'link_videos': $("#link_videos").val(),
				'data_atualizacao_videos': $("#data_atualizacao_videos").val(),
				'bool_ativo_videos': $("#bool_ativo_videos").val(),
				'areaDeAtuacao': $("#areaDeAtuacao").val()
			}
		}).done( function(data){
			console.log(data);
			if (data != 1 && data != "1") 	toast.danger("Falha: "+data);
			else 								toast.success("Atualizado com sucesso!");
		});
	} 

	if (campoFocus != "") {
		document.getElementById(campoFocus).focus();
		toast.danger('Preencha no mínimo todos os campos obrigatórios!');
	}
}