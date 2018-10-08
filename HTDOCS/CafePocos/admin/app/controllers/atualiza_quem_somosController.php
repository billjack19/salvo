
<?php 
	require_once "../classe/entidade/Quem_somos.php";
	require_once "../classe/dao/quem_somosDAO.php";

	$entidadeQuem_somos = new Quem_somos();
	$quem_somosDAO = new quem_somosDAO();
	
	$entidadeQuem_somos->set($_POST['titulo_quem_somos'], 'titulo_quem_somos');
	$entidadeQuem_somos->set($_POST['descricao_quem_somos'], 'descricao_quem_somos');
	$entidadeQuem_somos->set($_POST['imagem_quem_somos'], 'imagem_quem_somos');
	$entidadeQuem_somos->set($_POST['data_atualizacao_quem_somos'], 'data_atualizacao_quem_somos');

	$bool_ativo_quem_somos = $_POST['bool_ativo_quem_somos'] == '' ? 0 : $_POST['bool_ativo_quem_somos'];
	$entidadeQuem_somos->set($bool_ativo_quem_somos, 'bool_ativo_quem_somos');


	$retorno = $quem_somosDAO->atualizaQuem_somos($entidadeQuem_somos, $_POST['id_quem_somos']);
	echo $retorno;
?>
