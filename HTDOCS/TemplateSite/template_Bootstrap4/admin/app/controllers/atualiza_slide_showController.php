
<?php 
	require_once "../classe/entidade/Slide_show.php";
	require_once "../classe/dao/slide_showDAO.php";

	$entidadeSlide_show = new Slide_show();
	$slide_showDAO = new slide_showDAO();
	
	$entidadeSlide_show->set($_POST['titulo_slide_show'], 'titulo_slide_show');
	$entidadeSlide_show->set($_POST['descricao_slide_show'], 'descricao_slide_show');
	$entidadeSlide_show->set($_POST['imagem_slide_show'], 'imagem_slide_show');
	$entidadeSlide_show->set($_POST['data_atualizacao_slide_show'], 'data_atualizacao_slide_show');
	$entidadeSlide_show->set($_POST['bool_ativo_slide_show'], 'bool_ativo_slide_show');

	$retorno = $slide_showDAO->atualizaSlide_show($entidadeSlide_show, $_POST['id_slide_show']);
	echo $retorno;
?>
