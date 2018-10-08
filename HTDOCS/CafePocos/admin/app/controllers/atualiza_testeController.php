
<?php 
	require_once "../classe/entidade/Teste.php";
	require_once "../classe/dao/testeDAO.php";

	$entidadeTeste = new Teste();
	$testeDAO = new testeDAO();
	
	$entidadeTeste->set($_POST['descricao_teste'], 'descricao_teste');
	$entidadeTeste->set($_POST['data_atualizacao_teste'], 'data_atualizacao_teste');

	$usuario_id = $_POST['usuario_id'] == '' ? 0 : $_POST['usuario_id'];
	$entidadeTeste->set($usuario_id, 'usuario_id');


	$bool_ativo_teste = $_POST['bool_ativo_teste'] == '' ? 0 : $_POST['bool_ativo_teste'];
	$entidadeTeste->set($bool_ativo_teste, 'bool_ativo_teste');


	$retorno = $testeDAO->atualizaTeste($entidadeTeste, $_POST['id_teste']);
	echo $retorno;
?>
