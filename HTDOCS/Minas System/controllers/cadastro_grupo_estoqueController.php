
<?php 
	require_once "../classe/entidade/Grupo_estoque.php";
	require_once "../classe/dao/grupo_estoqueDAO.php";

	$entidadeGrupo_estoque = new Grupo_estoque();
	$grupo_estoqueDAO = new grupo_estoqueDAO();
	
	$entidadeGrupo_estoque->set($_POST['DESCRICAO'], 'DESCRICAO');
	$entidadeGrupo_estoque->set($_POST['DataAtualizacao'], 'DataAtualizacao');
	$entidadeGrupo_estoque->set($_POST['HoraAtualizacao'], 'HoraAtualizacao');
	$entidadeGrupo_estoque->set($_POST['UsuarioAtualizacao'], 'UsuarioAtualizacao');
	$entidadeGrupo_estoque->set($_POST['Conta_Contabil'], 'Conta_Contabil');

	$retorno = $grupo_estoqueDAO->cadastraGrupo_estoque($entidadeGrupo_estoque);
	echo $retorno;
?>
