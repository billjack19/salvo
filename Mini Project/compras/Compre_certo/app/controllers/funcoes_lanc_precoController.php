
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_lanc_preco'])) {
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$cont = 1;
	$sql = "	SELECT lanc_preco.* 
				FROM lanc_preco lanc_preco 
				INNER JOIN supermercado supermercado ON lanc_preco.supermercado_id = supermercado.id_supermercado
				INNER JOIN item item ON lanc_preco.item_id = item.id_item
				INNER JOIN marca marca ON lanc_preco.marca_id = marca.id_marca
				INNER JOIN usuario usuario ON lanc_preco.usuario_id = usuario.id_usuario 
				WHERE supermercado.descricao_supermercado LIKE '%$filtro%'
				   OR item.descricao_item LIKE '%$filtro%'
				   OR marca.descricao_marca LIKE '%$filtro%'
				   OR lanc_preco.preco_lanc_preco LIKE '%$filtro%'
				   OR lanc_preco.data_atualizacao_lanc_preco LIKE '%$filtro%'
				   OR usuario.nome_usuario LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont !=  1) 
			echo    "[]";
			echo 	
					$dados["id_lanc_preco"]."{,}".
					$dados["supermercado_id"]."{,}".
					$dados["item_id"]."{,}".
					$dados["marca_id"]."{,}".
					$dados["preco_lanc_preco"]."{,}".
					$dados["data_atualizacao_lanc_preco"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_lanc_preco"];
		$cont++;
	}
}




if (!empty($_POST['pequisa_lanc_preco_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT lanc_preco.* 
				FROM lanc_preco
				WHERE id_lanc_preco = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_lanc_preco"]."{,}".
					$dados["supermercado_id"]."{,}".
					$dados["item_id"]."{,}".
					$dados["marca_id"]."{,}".
					$dados["preco_lanc_preco"]."{,}".
					$dados["data_atualizacao_lanc_preco"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_lanc_preco"];
	}
}




if (!empty($_POST['pequisa_lanc_preco_grade'])) {
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT lanc_preco.* 
				FROM lanc_preco lanc_preco 
				INNER JOIN supermercado supermercado ON lanc_preco.supermercado_id = supermercado.id_supermercado
				INNER JOIN item item ON lanc_preco.item_id = item.id_item
				INNER JOIN marca marca ON lanc_preco.marca_id = marca.id_marca
				INNER JOIN usuario usuario ON lanc_preco.usuario_id = usuario.id_usuario
				WHERE $coluna = $id 
				AND (
					   supermercado.descricao_supermercado LIKE '%$filtro%'
					OR item.descricao_item LIKE '%$filtro%'
					OR marca.descricao_marca LIKE '%$filtro%'
					OR lanc_preco.preco_lanc_preco LIKE '%$filtro%'
					OR lanc_preco.data_atualizacao_lanc_preco LIKE '%$filtro%'
					OR usuario.nome_usuario LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont !=  1) 
			echo    "[]";
			echo 	
					$dados["id_lanc_preco"]."{,}".
					$dados["supermercado_id"]."{,}".
					$dados["item_id"]."{,}".
					$dados["marca_id"]."{,}".
					$dados["preco_lanc_preco"]."{,}".
					$dados["data_atualizacao_lanc_preco"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_lanc_preco"];
		$cont++;
	}
}
?>