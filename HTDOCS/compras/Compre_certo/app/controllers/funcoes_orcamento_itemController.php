
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_orcamento_item'])) {
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$cont = 1;
	$sql = "	SELECT orcamento_item.* 
				FROM orcamento_item orcamento_item 
				INNER JOIN supermercado supermercado ON orcamento_item.supermercado_id = supermercado.id_supermercado
				INNER JOIN item item ON orcamento_item.item_id = item.id_item
				INNER JOIN marca marca ON orcamento_item.marca_id = marca.id_marca
				INNER JOIN orcamento orcamento ON orcamento_item.orcamento_id = orcamento.id_orcamento
				INNER JOIN usuario usuario ON orcamento_item.usuario_id = usuario.id_usuario 
				WHERE supermercado.descricao_supermercado LIKE '%$filtro%'
				   OR item.descricao_item LIKE '%$filtro%'
				   OR marca.descricao_marca LIKE '%$filtro%'
				   OR orcamento_item.quantidade_orcamento_item LIKE '%$filtro%'
				   OR orcamento_item.preco_orcamento_item LIKE '%$filtro%'
				   OR orcamento_item.total_orcamento_item LIKE '%$filtro%'
				   OR orcamento.emissao_orcamento LIKE '%$filtro%'
				   OR orcamento_item.data_atualizacao_orcamento_item LIKE '%$filtro%'
				   OR usuario.nome_usuario LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont !=  1) 
			echo    "[]";
			echo 	
					$dados["id_orcamento_item"]."{,}".
					$dados["supermercado_id"]."{,}".
					$dados["item_id"]."{,}".
					$dados["marca_id"]."{,}".
					$dados["quantidade_orcamento_item"]."{,}".
					$dados["preco_orcamento_item"]."{,}".
					$dados["total_orcamento_item"]."{,}".
					$dados["orcamento_id"]."{,}".
					$dados["data_atualizacao_orcamento_item"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_orcamento_item"];
		$cont++;
	}
}




if (!empty($_POST['pequisa_orcamento_item_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT orcamento_item.* 
				FROM orcamento_item
				WHERE id_orcamento_item = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_orcamento_item"]."{,}".
					$dados["supermercado_id"]."{,}".
					$dados["item_id"]."{,}".
					$dados["marca_id"]."{,}".
					$dados["quantidade_orcamento_item"]."{,}".
					$dados["preco_orcamento_item"]."{,}".
					$dados["total_orcamento_item"]."{,}".
					$dados["orcamento_id"]."{,}".
					$dados["data_atualizacao_orcamento_item"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_orcamento_item"];
	}
}




if (!empty($_POST['pequisa_orcamento_item_grade'])) {
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT orcamento_item.* 
				FROM orcamento_item orcamento_item 
				INNER JOIN supermercado supermercado ON orcamento_item.supermercado_id = supermercado.id_supermercado
				INNER JOIN item item ON orcamento_item.item_id = item.id_item
				INNER JOIN marca marca ON orcamento_item.marca_id = marca.id_marca
				INNER JOIN orcamento orcamento ON orcamento_item.orcamento_id = orcamento.id_orcamento
				INNER JOIN usuario usuario ON orcamento_item.usuario_id = usuario.id_usuario
				WHERE $coluna = $id 
				AND (
					   supermercado.descricao_supermercado LIKE '%$filtro%'
					OR item.descricao_item LIKE '%$filtro%'
					OR marca.descricao_marca LIKE '%$filtro%'
					OR orcamento_item.quantidade_orcamento_item LIKE '%$filtro%'
					OR orcamento_item.preco_orcamento_item LIKE '%$filtro%'
					OR orcamento_item.total_orcamento_item LIKE '%$filtro%'
					OR orcamento.emissao_orcamento LIKE '%$filtro%'
					OR orcamento_item.data_atualizacao_orcamento_item LIKE '%$filtro%'
					OR usuario.nome_usuario LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont !=  1) 
			echo    "[]";
			echo 	
					$dados["id_orcamento_item"]."{,}".
					$dados["supermercado_id"]."{,}".
					$dados["item_id"]."{,}".
					$dados["marca_id"]."{,}".
					$dados["quantidade_orcamento_item"]."{,}".
					$dados["preco_orcamento_item"]."{,}".
					$dados["total_orcamento_item"]."{,}".
					$dados["orcamento_id"]."{,}".
					$dados["data_atualizacao_orcamento_item"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_orcamento_item"];
		$cont++;
	}
}
?>