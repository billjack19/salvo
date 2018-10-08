<?php 
	require_once "../classe/entidade/Slide_show.php";
	require_once "../classe/dao/slide_showDAO.php";

	$conn = new Conexao();
	$pdoVerifica = $conn->Connect();

	$gravar = true;
	$saida = "";
	

	if ($gravar) {
		$entidadeSlide_show = new Slide_show();
		$slide_showDAO = new slide_showDAO();
		
		$entidadeSlide_show->set($_POST['titulo_slide_show'], 'titulo_slide_show');
		$entidadeSlide_show->set($_POST['descricao_slide_show'], 'descricao_slide_show');
		$entidadeSlide_show->set($_POST['imagem_slide_show'], 'imagem_slide_show');

		$configurar_site_id = $_POST['configurar_site_id'] == '' ? 0 : $_POST['configurar_site_id'];
		$entidadeSlide_show->set($configurar_site_id, 'configurar_site_id');

		$entidadeSlide_show->set($_POST['data_atualizacao_slide_show'], 'data_atualizacao_slide_show');

		$bool_ativo_slide_show = $_POST['bool_ativo_slide_show'] == '' ? 0 : $_POST['bool_ativo_slide_show'];
		$entidadeSlide_show->set($bool_ativo_slide_show, 'bool_ativo_slide_show');


		$retorno = $slide_showDAO->cadastraSlide_show($entidadeSlide_show, $_POST['areaDeAtuacao']);
		echo $retorno;
	}
	else echo $saida;
?>