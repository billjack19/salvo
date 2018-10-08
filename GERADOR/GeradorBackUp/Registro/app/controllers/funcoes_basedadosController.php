
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_basedados'])) {
	$cont = 1;
	$sql = "	SELECT basedados.* , regitros.* 
				FROM basedados basedados 
				INNER JOIN regitros regitros ON basedados.regitros_id = regitros.id_regitros
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_baseDados"].",".
					$dados["descricao_baseDados"].",".
					$dados["regitros_id"].",".
					$dados["Id_SQL"] /* Tabela regitros */ .",".
					$dados["ServerName"] /* Tabela regitros */ .",".
					$dados["ServiceName"] /* Tabela regitros */ .",".
					$dados["Key_SQL_servive"] /* Tabela regitros */ .",".
					$dados["Port_Number"] /* Tabela regitros */ .",".
					$dados["user_regitros"] /* Tabela regitros */ .",".
					$dados["senha_regitros"] /* Tabela regitros */ ;
		} else {
			echo    "[]".
					$dados["id_baseDados"].",".
					$dados["descricao_baseDados"].",".
					$dados["regitros_id"].",".
					$dados["Id_SQL"] /* Tabela regitros */ .",".
					$dados["ServerName"] /* Tabela regitros */ .",".
					$dados["ServiceName"] /* Tabela regitros */ .",".
					$dados["Key_SQL_servive"] /* Tabela regitros */ .",".
					$dados["Port_Number"] /* Tabela regitros */ .",".
					$dados["user_regitros"] /* Tabela regitros */ .",".
					$dados["senha_regitros"] /* Tabela regitros */ ;
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_basedados_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT basedados.* , regitros.* 
				FROM basedados basedados
				INNER JOIN regitros regitros ON basedados.regitros_id = regitros.id_regitros
				WHERE id_basedados = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_baseDados"].",".
					$dados["descricao_baseDados"].",".
					$dados["regitros_id"].",".
					$dados["Id_SQL"] /* Tabela regitros */ .",".
					$dados["ServerName"] /* Tabela regitros */ .",".
					$dados["ServiceName"] /* Tabela regitros */ .",".
					$dados["Key_SQL_servive"] /* Tabela regitros */ .",".
					$dados["Port_Number"] /* Tabela regitros */ .",".
					$dados["user_regitros"] /* Tabela regitros */ .",".
					$dados["senha_regitros"] /* Tabela regitros */ ;
	}
}
?>
