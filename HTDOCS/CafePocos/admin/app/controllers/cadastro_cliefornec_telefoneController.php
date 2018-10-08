
<?php 
	require_once "../classe/entidade/Cliefornec_telefone.php";
	require_once "../classe/dao/cliefornec_telefoneDAO.php";

	$entidadeCliefornec_telefone = new Cliefornec_telefone();
	$cliefornec_telefoneDAO = new cliefornec_telefoneDAO();
	
	$entidadeCliefornec_telefone->set($_POST['Email'], 'Email');

	$retorno = $cliefornec_telefoneDAO->cadastraCliefornec_telefone($entidadeCliefornec_telefone);
	echo $retorno;
?>
