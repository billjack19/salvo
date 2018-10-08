
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_regitros'])) {
	$cont = 1;
	$sql = "	SELECT regitros.* 
				FROM regitros regitros 
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["Id_SQL"].",".
					$dados["ServerName"].",".
					$dados["ServiceName"].",".
					$dados["Key_SQL_servive"].",".
					$dados["Port_Number"].",".
					$dados["user_regitros"].",".
					$dados["senha_regitros"];
		} else {
			echo    "[]".
					$dados["Id_SQL"].",".
					$dados["ServerName"].",".
					$dados["ServiceName"].",".
					$dados["Key_SQL_servive"].",".
					$dados["Port_Number"].",".
					$dados["user_regitros"].",".
					$dados["senha_regitros"];
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_regitros_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT regitros.* 
				FROM regitros regitros
				WHERE id_regitros = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["Id_SQL"].",".
					$dados["ServerName"].",".
					$dados["ServiceName"].",".
					$dados["Key_SQL_servive"].",".
					$dados["Port_Number"].",".
					$dados["user_regitros"].",".
					$dados["senha_regitros"];
	}
}
?>
