
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_cliefornec_telefone'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$cont = 1;
	$sql = "	SELECT cliefornec_telefone.* 
				FROM cliefornec_telefone cliefornec_telefone  
				WHERE Sequencia LIKE '%$filtro%'
				OR Email LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["Cliente"]."{,}".
					$dados["Sequencia"]."{,}".
					$dados["Email"];
		} else {
			echo    "[]".
					$dados["Cliente"]."{,}".
					$dados["Sequencia"]."{,}".
					$dados["Email"];
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_cliefornec_telefone_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT cliefornec_telefone.* 
				FROM cliefornec_telefone cliefornec_telefone
				WHERE id_cliefornec_telefone = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["Cliente"]."{,}".
					$dados["Sequencia"]."{,}".
					$dados["Email"];
	}
}




if (!empty($_POST['pequisa_cliefornec_telefone_grade'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT cliefornec_telefone.* 
				FROM cliefornec_telefone cliefornec_telefone 
				WHERE $coluna = $id 
				AND (
					   Sequencia LIKE '%$filtro%'
					OR Email LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["Cliente"]."{,}".
					$dados["Sequencia"]."{,}".
					$dados["Email"];
		} else {
			echo    "[]".
					$dados["Cliente"]."{,}".
					$dados["Sequencia"]."{,}".
					$dados["Email"];
		}
		$cont++;
	}
}

?>
