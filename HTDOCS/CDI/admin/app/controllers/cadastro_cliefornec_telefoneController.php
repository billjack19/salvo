
<?php 
	require_once "../classe/entidade/Cliefornec_telefone.php";
	require_once "../classe/dao/cliefornec_telefoneDAO.php";

	$conn = new Conexao();
	$pdoVerifica = $conn->Connect();

	$gravar = true;
	$saida = "";


	


	if ($gravar) {
		$entidadeCliefornec_telefone = new Cliefornec_telefone();
		$cliefornec_telefoneDAO = new cliefornec_telefoneDAO();
		
		$entidadeCliefornec_telefone->set($_POST['Telefone'], 'Telefone');
		$entidadeCliefornec_telefone->set($_POST['EMail'], 'EMail');

		$retorno = $cliefornec_telefoneDAO->cadastraCliefornec_telefone($entidadeCliefornec_telefone);
		echo $retorno;
	}
	else echo $saida;
?>
