<?php 
	require_once "../classe/entidade/Videos.php";
	require_once "../classe/dao/videosDAO.php";

	$conn = new Conexao();
	$pdoVerifica = $conn->Connect();

	$gravar = true;
	$saida = "";
	

	if ($gravar) {
		$entidadeVideos = new Videos();
		$videosDAO = new videosDAO();
		
		$entidadeVideos->set($_POST['descricao_videos'], 'descricao_videos');
		$entidadeVideos->set($_POST['link_videos'], 'link_videos');
		$entidadeVideos->set($_POST['data_atualizacao_videos'], 'data_atualizacao_videos');

		$bool_ativo_videos = $_POST['bool_ativo_videos'] == '' ? 0 : $_POST['bool_ativo_videos'];
		$entidadeVideos->set($bool_ativo_videos, 'bool_ativo_videos');


		$retorno = $videosDAO->atualizaVideos($entidadeVideos, $_POST['id_videos'], $_POST['areaDeAtuacao']);
		echo $retorno;
	}
	else echo $saida;
?>