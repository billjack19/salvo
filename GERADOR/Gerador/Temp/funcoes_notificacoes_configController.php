
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_notificacoes_config'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$cont = 1;
	$sql = "	SELECT notificacoes_config.* 
				FROM notificacoes_config notificacoes_config  
				WHERE area_notificacoes_config LIKE '%$filtro%'
				OR tipo_alteracao_notificacoes_config LIKE '%$filtro%'
				OR data_atualizacao_notificacoes_config LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_notificacoes_config"]."{,}".
					$dados["area_notificacoes_config"]."{,}".
					$dados["tipo_alteracao_notificacoes_config"]."{,}".
					$dados["data_atualizacao_notificacoes_config"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_notificacoes_config"];
		} else {
			echo    "[]".
					$dados["id_notificacoes_config"]."{,}".
					$dados["area_notificacoes_config"]."{,}".
					$dados["tipo_alteracao_notificacoes_config"]."{,}".
					$dados["data_atualizacao_notificacoes_config"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_notificacoes_config"];
		}
		$cont++;
	}
}




if (!empty($_POST['pequisa_notificacoes_config_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT notificacoes_config.* 
				FROM notificacoes_config notificacoes_config
				WHERE id_notificacoes_config = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_notificacoes_config"]."{,}".
					$dados["area_notificacoes_config"]."{,}".
					$dados["tipo_alteracao_notificacoes_config"]."{,}".
					$dados["data_atualizacao_notificacoes_config"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_notificacoes_config"];
	}
}




if (!empty($_POST['pequisa_notificacoes_config_grade'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT notificacoes_config.* 
				FROM notificacoes_config notificacoes_config 
				WHERE $coluna = $id 
				AND (
					   area_notificacoes_config LIKE '%$filtro%'
					OR tipo_alteracao_notificacoes_config LIKE '%$filtro%'
					OR data_atualizacao_notificacoes_config LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_notificacoes_config"]."{,}".
					$dados["area_notificacoes_config"]."{,}".
					$dados["tipo_alteracao_notificacoes_config"]."{,}".
					$dados["data_atualizacao_notificacoes_config"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_notificacoes_config"];
		} else {
			echo    "[]".
					$dados["id_notificacoes_config"]."{,}".
					$dados["area_notificacoes_config"]."{,}".
					$dados["tipo_alteracao_notificacoes_config"]."{,}".
					$dados["data_atualizacao_notificacoes_config"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_notificacoes_config"];
		}
		$cont++;
	}
}

?>
