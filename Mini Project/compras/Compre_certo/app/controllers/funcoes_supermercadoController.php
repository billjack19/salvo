
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_supermercado'])) {
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$cont = 1;
	$sql = "	SELECT supermercado.* 
				FROM supermercado supermercado 
				INNER JOIN usuario usuario ON supermercado.usuario_id = usuario.id_usuario 
				WHERE supermercado.descricao_supermercado LIKE '%$filtro%'
				   OR supermercado.data_atualizacao_supermercado LIKE '%$filtro%'
				   OR usuario.nome_usuario LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont !=  1) 
			echo    "[]";
			echo 	
					$dados["id_supermercado"]."{,}".
					$dados["descricao_supermercado"]."{,}".
					$dados["data_atualizacao_supermercado"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_supermercado"];
		$cont++;
	}
}




if (!empty($_POST['pequisa_supermercado_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT supermercado.* 
				FROM supermercado
				WHERE id_supermercado = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_supermercado"]."{,}".
					$dados["descricao_supermercado"]."{,}".
					$dados["data_atualizacao_supermercado"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_supermercado"];
	}
}




if (!empty($_POST['pequisa_supermercado_grade'])) {
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT supermercado.* 
				FROM supermercado supermercado 
				INNER JOIN usuario usuario ON supermercado.usuario_id = usuario.id_usuario
				WHERE $coluna = $id 
				AND (
					   supermercado.descricao_supermercado LIKE '%$filtro%'
					OR supermercado.data_atualizacao_supermercado LIKE '%$filtro%'
					OR usuario.nome_usuario LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont !=  1) 
			echo    "[]";
			echo 	
					$dados["id_supermercado"]."{,}".
					$dados["descricao_supermercado"]."{,}".
					$dados["data_atualizacao_supermercado"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_supermercado"];
		$cont++;
	}
}
?>