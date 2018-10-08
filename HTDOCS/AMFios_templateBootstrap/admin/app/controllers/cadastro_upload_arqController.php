
<?php 
	require_once "../classe/entidade/Upload_arq.php";
	require_once "../classe/dao/upload_arqDAO.php";

	$entidadeUpload_arq = new Upload_arq();
	$upload_arqDAO = new upload_arqDAO();
	
	$entidadeUpload_arq->set($_POST['descricao_upload_arq'], 'descricao_upload_arq');
	$entidadeUpload_arq->set($_POST['tipo_upload_arq'], 'tipo_upload_arq');
	$entidadeUpload_arq->set($_POST['data_atualizacaoupload_arq'], 'data_atualizacaoupload_arq');

	$bool_ativo_upload_arq = $_POST['bool_ativo_upload_arq'] == '' ? 0 : $_POST['bool_ativo_upload_arq'];
	$entidadeUpload_arq->set($bool_ativo_upload_arq, 'bool_ativo_upload_arq');


	$retorno = $upload_arqDAO->cadastraUpload_arq($entidadeUpload_arq);
	echo $retorno;
?>
