<?php
require_once "../class/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_cacamba'])) {
	$cnpj = $_POST['cnpj'];
	$cont = 1;
	$sql = "SELECT * FROM cacamba WHERE cnpj_user = $cnpj";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 
					$dados["id_cacamba"].",".
					$dados["descricao_cacamba"].",".
					$dados["cnpj_user"];
		} else {
			echo    "[]".
					$dados["id_cacamba"].",".
					$dados["descricao_cacamba"].",".
					$dados["cnpj_user"];
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_cacamba_disponivel'])) {
	$cnpj = $_POST['cnpj'];
	$cont = 1;
	$sql = "SELECT * FROM cacamba WHERE cnpj_user = '$cnpj' AND disponivel = 1";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 
					$dados["id_cacamba"].",".
					$dados["descricao_cacamba"].",".
					$dados["cnpj_user"];
		} else {
			echo    "[]".
					$dados["id_cacamba"].",".
					$dados["descricao_cacamba"].",".
					$dados["cnpj_user"];
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_cacamba_id'])) {
	$id = $_POST['id'];
	$cont = 1;
	$sql = "SELECT * FROM cacamba WHERE id_cacamba = $id";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 
					$dados["id_cacamba"].",".
					$dados["descricao_cacamba"].",".
					$dados["cnpj_user"];
		} else {
			echo    "[]".
					$dados["id_cacamba"].",".
					$dados["descricao_cacamba"].",".
					$dados["cnpj_user"];
		}
		$cont++;
	}
}


if (!empty($_POST['diponivel_cacamba'])) {
	$id = $_POST['id'];
	$bool_disponivel = $_POST['diponivel'];
	$cont = 1;
	$sql = "UPDATE cacamba
			SET disponivel = $bool_disponivel
			WHERE id_cacamba = $id";
	$verifica = $pdo->query($sql);
}

?>