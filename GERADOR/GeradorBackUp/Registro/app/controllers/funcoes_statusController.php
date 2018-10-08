
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_status'])) {
	$cont = 1;
	$sql = "	SELECT status.* , basedados.* 
				FROM status status 
				INNER JOIN basedados basedados ON status.basedados_id = basedados.id_basedados
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_status"].",".
					$dados["descricao_status"].",".
					$dados["basedados_id"].",".
					$dados["id_baseDados"] /* Tabela basedados */ .",".
					$dados["descricao_baseDados"] /* Tabela basedados */ .",".
					$dados["regitros_id"] /* Tabela basedados */ ;
		} else {
			echo    "[]".
					$dados["id_status"].",".
					$dados["descricao_status"].",".
					$dados["basedados_id"].",".
					$dados["id_baseDados"] /* Tabela basedados */ .",".
					$dados["descricao_baseDados"] /* Tabela basedados */ .",".
					$dados["regitros_id"] /* Tabela basedados */ ;
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_status_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT status.* , basedados.* 
				FROM status status
				INNER JOIN basedados basedados ON status.basedados_id = basedados.id_basedados
				WHERE id_status = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_status"].",".
					$dados["descricao_status"].",".
					$dados["basedados_id"].",".
					$dados["id_baseDados"] /* Tabela basedados */ .",".
					$dados["descricao_baseDados"] /* Tabela basedados */ .",".
					$dados["regitros_id"] /* Tabela basedados */ ;
	}
}
?>
