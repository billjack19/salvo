
<?php 
	require_once "../classe/entidade/Teste_grade.php";
	require_once "../classe/dao/teste_gradeDAO.php";

	$entidadeTeste_grade = new Teste_grade();
	$teste_gradeDAO = new teste_gradeDAO();
	
	$entidadeTeste_grade->set($_POST['descricao_teste_grade'], 'descricao_teste_grade');

	$teste_id = $_POST['teste_id'] == '' ? 0 : $_POST['teste_id'];
	$entidadeTeste_grade->set($teste_id, 'teste_id');

	$entidadeTeste_grade->set($_POST['data_atualizacao_teste_grade'], 'data_atualizacao_teste_grade');

	$usuario_id = $_POST['usuario_id'] == '' ? 0 : $_POST['usuario_id'];
	$entidadeTeste_grade->set($usuario_id, 'usuario_id');


	$bool_ativo_teste_grade = $_POST['bool_ativo_teste_grade'] == '' ? 0 : $_POST['bool_ativo_teste_grade'];
	$entidadeTeste_grade->set($bool_ativo_teste_grade, 'bool_ativo_teste_grade');


	$retorno = $teste_gradeDAO->cadastraTeste_grade($entidadeTeste_grade);
	echo $retorno;
?>
