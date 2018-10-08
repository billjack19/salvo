
<?php 
	require_once "../classe/entidade/Cliefornec.php";
	require_once "../classe/dao/cliefornecDAO.php";

	$entidadeCliefornec = new Cliefornec();
	$cliefornecDAO = new cliefornecDAO();
	
	$entidadeCliefornec->set($_POST['CPF_CGC'], 'CPF_CGC');
	$entidadeCliefornec->set($_POST['RAZAOSOCIAL'], 'RAZAOSOCIAL');
	$entidadeCliefornec->set($_POST['NOMEFANTASIA'], 'NOMEFANTASIA');
	$entidadeCliefornec->set($_POST['senha_site'], 'senha_site');

	$bool_ativo_cliefornec = $_POST['bool_ativo_cliefornec'] == '' ? 0 : $_POST['bool_ativo_cliefornec'];
	$entidadeCliefornec->set($bool_ativo_cliefornec, 'bool_ativo_cliefornec');


	$retorno = $cliefornecDAO->atualizaCliefornec($entidadeCliefornec, $_POST['CODIGO']);
	echo $retorno;
?>
