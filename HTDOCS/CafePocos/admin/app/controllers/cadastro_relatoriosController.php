
<?php 
	require_once "../classe/entidade/Relatorios.php";
	require_once "../classe/dao/relatoriosDAO.php";

	$entidadeRelatorios = new Relatorios();
	$relatoriosDAO = new relatoriosDAO();
	
	$entidadeRelatorios->set($_POST['tabela_relatorios'], 'tabela_relatorios');
	$entidadeRelatorios->set($_POST['colunas_relatorios'], 'colunas_relatorios');
	$entidadeRelatorios->set($_POST['data_atualizacao_relatorios'], 'data_atualizacao_relatorios');

	$usuario_id = $_POST['usuario_id'] == '' ? 0 : $_POST['usuario_id'];
	$entidadeRelatorios->set($usuario_id, 'usuario_id');


	$bool_ativo_relatorios = $_POST['bool_ativo_relatorios'] == '' ? 0 : $_POST['bool_ativo_relatorios'];
	$entidadeRelatorios->set($bool_ativo_relatorios, 'bool_ativo_relatorios');


	$retorno = $relatoriosDAO->cadastraRelatorios($entidadeRelatorios);
	echo $retorno;
?>
