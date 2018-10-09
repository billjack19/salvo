
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_upload_arq'])) {
	$cont = 1;
	$sql = "	SELECT upload_arq.* 
				FROM upload_arq upload_arq 
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_upload_arq"].",".
					$dados["descricao_upload_arq"].",".
					$dados["tipo_upload_arq"].",".
					$dados["data_atualizacaoupload_arq"].",".
					$dados["bool_ativo_upload_arq"];
		} else {
			echo    "[]".
					$dados["id_upload_arq"].",".
					$dados["descricao_upload_arq"].",".
					$dados["tipo_upload_arq"].",".
					$dados["data_atualizacaoupload_arq"].",".
					$dados["bool_ativo_upload_arq"];
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_upload_arq_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT upload_arq.* 
				FROM upload_arq upload_arq
				WHERE id_upload_arq = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_upload_arq"].",".
					$dados["descricao_upload_arq"].",".
					$dados["tipo_upload_arq"].",".
					$dados["data_atualizacaoupload_arq"].",".
					$dados["bool_ativo_upload_arq"];
	}
}




if (!empty($_POST['pequisa_upload_arq_grade'])) {
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT upload_arq.* 
				FROM upload_arq upload_arq 
				WHERE $coluna = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_upload_arq"].",".
					$dados["descricao_upload_arq"].",".
					$dados["tipo_upload_arq"].",".
					$dados["data_atualizacaoupload_arq"].",".
					$dados["bool_ativo_upload_arq"];
		} else {
			echo    "[]".
					$dados["id_upload_arq"].",".
					$dados["descricao_upload_arq"].",".
					$dados["tipo_upload_arq"].",".
					$dados["data_atualizacaoupload_arq"].",".
					$dados["bool_ativo_upload_arq"];
		}
		$cont++;
	}
}

?>
