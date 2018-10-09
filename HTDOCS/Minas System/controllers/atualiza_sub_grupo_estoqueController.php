
<?php 
	require_once "../classe/entidade/Sub_grupo_estoque.php";
	require_once "../classe/dao/sub_grupo_estoqueDAO.php";

	$entidadeSub_grupo_estoque = new Sub_grupo_estoque();
	$sub_grupo_estoqueDAO = new sub_grupo_estoqueDAO();
	
	$entidadeSub_grupo_estoque->set($_POST['DESCRICAO'], 'DESCRICAO');
	$entidadeSub_grupo_estoque->set($_POST['DataAtualizacao'], 'DataAtualizacao');
	$entidadeSub_grupo_estoque->set($_POST['HoraAtualizacao'], 'HoraAtualizacao');
	$entidadeSub_grupo_estoque->set($_POST['UsuarioAtualizacao'], 'UsuarioAtualizacao');

	$retorno = $sub_grupo_estoqueDAO->atualizaSub_grupo_estoque($entidadeSub_grupo_estoque, $_POST['SUB_GRUPO']);
	echo $retorno;
?>
