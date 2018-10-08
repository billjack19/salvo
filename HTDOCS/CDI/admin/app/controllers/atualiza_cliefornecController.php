
<?php 
	require_once "../classe/entidade/Cliefornec.php";
	require_once "../classe/dao/cliefornecDAO.php";

	$conn = new Conexao();
	$pdoVerifica = $conn->Connect();

	$gravar = true;
	$saida = "";

	

	if ($gravar) {
		$entidadeCliefornec = new Cliefornec();
		$cliefornecDAO = new cliefornecDAO();
		
		$entidadeCliefornec->set($_POST['CPF_CGC'], 'CPF_CGC');
		$entidadeCliefornec->set($_POST['RAZAOSOCIAL'], 'RAZAOSOCIAL');

		$retorno = $cliefornecDAO->atualizaCliefornec($entidadeCliefornec, $_POST['CODIGO']);
		echo $retorno;
	}
	else echo $saida;
?>
