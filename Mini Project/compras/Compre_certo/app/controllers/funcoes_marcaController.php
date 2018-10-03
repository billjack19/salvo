
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_marca'])) {
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$cont = 1;
	$sql = "	SELECT marca.* 
				FROM marca marca 
				INNER JOIN usuario usuario ON marca.usuario_id = usuario.id_usuario 
				WHERE marca.descricao_marca LIKE '%$filtro%'
				   OR marca.data_atualizacao_marca LIKE '%$filtro%'
				   OR usuario.nome_usuario LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont !=  1) 
			echo    "[]";
			echo 	
					$dados["id_marca"]."{,}".
					$dados["descricao_marca"]."{,}".
					$dados["data_atualizacao_marca"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_marca"];
		$cont++;
	}
}




if (!empty($_POST['pequisa_marca_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT marca.* 
				FROM marca
				WHERE id_marca = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_marca"]."{,}".
					$dados["descricao_marca"]."{,}".
					$dados["data_atualizacao_marca"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_marca"];
	}
}




if (!empty($_POST['pequisa_marca_grade'])) {
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT marca.* 
				FROM marca marca 
				INNER JOIN usuario usuario ON marca.usuario_id = usuario.id_usuario
				WHERE $coluna = $id 
				AND (
					   marca.descricao_marca LIKE '%$filtro%'
					OR marca.data_atualizacao_marca LIKE '%$filtro%'
					OR usuario.nome_usuario LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont !=  1) 
			echo    "[]";
			echo 	
					$dados["id_marca"]."{,}".
					$dados["descricao_marca"]."{,}".
					$dados["data_atualizacao_marca"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_marca"];
		$cont++;
	}
}
?>