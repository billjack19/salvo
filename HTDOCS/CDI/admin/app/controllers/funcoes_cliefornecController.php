
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_cliefornec'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$cont = 1;
	$sql = "	SELECT cliefornec.* 
				FROM cliefornec cliefornec  
				WHERE CPF_CGC LIKE '%$filtro%'
				OR RAZAOSOCIAL LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["CODIGO"]."{,}".
					$dados["CPF_CGC"]."{,}".
					$dados["RAZAOSOCIAL"];
		} else {
			echo    "[]".
					$dados["CODIGO"]."{,}".
					$dados["CPF_CGC"]."{,}".
					$dados["RAZAOSOCIAL"];
		}
		$cont++;
	}
}




if (!empty($_POST['pequisa_cliefornec_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT cliefornec.* 
				FROM cliefornec cliefornec
				WHERE id_cliefornec = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["CODIGO"]."{,}".
					$dados["CPF_CGC"]."{,}".
					$dados["RAZAOSOCIAL"];
	}
}




if (!empty($_POST['pequisa_cliefornec_grade'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT cliefornec.* 
				FROM cliefornec cliefornec 
				WHERE $coluna = $id 
				AND (
					   CPF_CGC LIKE '%$filtro%'
					OR RAZAOSOCIAL LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["CODIGO"]."{,}".
					$dados["CPF_CGC"]."{,}".
					$dados["RAZAOSOCIAL"];
		} else {
			echo    "[]".
					$dados["CODIGO"]."{,}".
					$dados["CPF_CGC"]."{,}".
					$dados["RAZAOSOCIAL"];
		}
		$cont++;
	}
}

?>
