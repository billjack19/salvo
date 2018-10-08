
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_orcamento'])) {
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$cont = 1;
	$sql = "	SELECT orcamento.* 
				FROM orcamento orcamento 
				INNER JOIN usuario usuario ON orcamento.usuario_id = usuario.id_usuario 
				WHERE orcamento.emissao_orcamento LIKE '%$filtro%'
				   OR orcamento.descricao_orcamento LIKE '%$filtro%'
				   OR orcamento.data_atualizacao_orcamento LIKE '%$filtro%'
				   OR usuario.nome_usuario LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont !=  1) 
			echo    "[]";
			echo 	
					$dados["id_orcamento"]."{,}".
					$dados["emissao_orcamento"]."{,}".
					$dados["descricao_orcamento"]."{,}".
					$dados["data_atualizacao_orcamento"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_orcamento"];
		$cont++;
	}
}




if (!empty($_POST['pequisa_orcamento_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT orcamento.* 
				FROM orcamento
				WHERE id_orcamento = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_orcamento"]."{,}".
					$dados["emissao_orcamento"]."{,}".
					$dados["descricao_orcamento"]."{,}".
					$dados["data_atualizacao_orcamento"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_orcamento"];
	}
}




if (!empty($_POST['pequisa_orcamento_grade'])) {
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT orcamento.* 
				FROM orcamento orcamento 
				INNER JOIN usuario usuario ON orcamento.usuario_id = usuario.id_usuario
				WHERE $coluna = $id 
				AND (
					   orcamento.emissao_orcamento LIKE '%$filtro%'
					OR orcamento.descricao_orcamento LIKE '%$filtro%'
					OR orcamento.data_atualizacao_orcamento LIKE '%$filtro%'
					OR usuario.nome_usuario LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont !=  1) 
			echo    "[]";
			echo 	
					$dados["id_orcamento"]."{,}".
					$dados["emissao_orcamento"]."{,}".
					$dados["descricao_orcamento"]."{,}".
					$dados["data_atualizacao_orcamento"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_orcamento"];
		$cont++;
	}
}
?>