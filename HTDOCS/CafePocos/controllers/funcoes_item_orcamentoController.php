
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_item_orcamento'])) {
	$cont = 1;
	$sql = "	SELECT item_orcamento.* , orcamento.* , item.* 
				FROM item_orcamento item_orcamento 
				INNER JOIN orcamento orcamento ON item_orcamento.orcamento_id = orcamento.id_orcamento
				INNER JOIN item item ON item_orcamento.item_id = item.id_item
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_item_orcamento"].",".
					$dados["data_lanc_item_orcamento"].",".
					$dados["orcamento_id"].",".
					$dados["item_id"].",".
					$dados["quantidade_item_orcamento"].",".
					$dados["total_item_orcamento"].",".
					$dados["bool_ativo_item_orcamento"].",".
					$dados["id_orcamento"] /* Tabela orcamento */ .",".
					$dados["descricao_orcamento"] /* Tabela orcamento */ .",".
					$dados["cliente_site_id"] /* Tabela orcamento */ .",".
					$dados["data_lanc_orcamento"] /* Tabela orcamento */ .",".
					$dados["bool_ativo_orcamento"] /* Tabela orcamento */ .",".
					$dados["id_item"] /* Tabela item */ .",".
					$dados["descricao_item"] /* Tabela item */ .",".
					$dados["descricao_site_item"] /* Tabela item */ .",".
					$dados["unidade_medida_item"] /* Tabela item */ .",".
					$dados["imagem_item"] /* Tabela item */ .",".
					$dados["grupo_id"] /* Tabela item */ .",".
					$dados["usuario_id"] /* Tabela item */ .",".
					$dados["bool_ativo_item"] /* Tabela item */ ;
		} else {
			echo    "[]".
					$dados["id_item_orcamento"].",".
					$dados["data_lanc_item_orcamento"].",".
					$dados["orcamento_id"].",".
					$dados["item_id"].",".
					$dados["quantidade_item_orcamento"].",".
					$dados["total_item_orcamento"].",".
					$dados["bool_ativo_item_orcamento"].",".
					$dados["id_orcamento"] /* Tabela orcamento */ .",".
					$dados["descricao_orcamento"] /* Tabela orcamento */ .",".
					$dados["cliente_site_id"] /* Tabela orcamento */ .",".
					$dados["data_lanc_orcamento"] /* Tabela orcamento */ .",".
					$dados["bool_ativo_orcamento"] /* Tabela orcamento */ .",".
					$dados["id_item"] /* Tabela item */ .",".
					$dados["descricao_item"] /* Tabela item */ .",".
					$dados["descricao_site_item"] /* Tabela item */ .",".
					$dados["unidade_medida_item"] /* Tabela item */ .",".
					$dados["imagem_item"] /* Tabela item */ .",".
					$dados["grupo_id"] /* Tabela item */ .",".
					$dados["usuario_id"] /* Tabela item */ .",".
					$dados["bool_ativo_item"] /* Tabela item */ ;
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_item_orcamento_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT item_orcamento.* , orcamento.* , item.* 
				FROM item_orcamento item_orcamento
				INNER JOIN orcamento orcamento ON item_orcamento.orcamento_id = orcamento.id_orcamento
				INNER JOIN item item ON item_orcamento.item_id = item.id_item
				WHERE id_item_orcamento = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_item_orcamento"].",".
					$dados["data_lanc_item_orcamento"].",".
					$dados["orcamento_id"].",".
					$dados["item_id"].",".
					$dados["quantidade_item_orcamento"].",".
					$dados["total_item_orcamento"].",".
					$dados["bool_ativo_item_orcamento"].",".
					$dados["id_orcamento"] /* Tabela orcamento */ .",".
					$dados["descricao_orcamento"] /* Tabela orcamento */ .",".
					$dados["cliente_site_id"] /* Tabela orcamento */ .",".
					$dados["data_lanc_orcamento"] /* Tabela orcamento */ .",".
					$dados["bool_ativo_orcamento"] /* Tabela orcamento */ .",".
					$dados["id_item"] /* Tabela item */ .",".
					$dados["descricao_item"] /* Tabela item */ .",".
					$dados["descricao_site_item"] /* Tabela item */ .",".
					$dados["unidade_medida_item"] /* Tabela item */ .",".
					$dados["imagem_item"] /* Tabela item */ .",".
					$dados["grupo_id"] /* Tabela item */ .",".
					$dados["usuario_id"] /* Tabela item */ .",".
					$dados["bool_ativo_item"] /* Tabela item */ ;
	}
}




if (!empty($_POST['pequisa_item_orcamento_grade'])) {
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT item_orcamento.* , orcamento.* , item.* 
				FROM item_orcamento item_orcamento 
				INNER JOIN orcamento orcamento ON item_orcamento.orcamento_id = orcamento.id_orcamento
				INNER JOIN item item ON item_orcamento.item_id = item.id_item
				WHERE $coluna = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_item_orcamento"].",".
					$dados["data_lanc_item_orcamento"].",".
					$dados["orcamento_id"].",".
					$dados["item_id"].",".
					$dados["quantidade_item_orcamento"].",".
					$dados["total_item_orcamento"].",".
					$dados["bool_ativo_item_orcamento"].",".
					$dados["id_orcamento"] /* Tabela orcamento */ .",".
					$dados["descricao_orcamento"] /* Tabela orcamento */ .",".
					$dados["cliente_site_id"] /* Tabela orcamento */ .",".
					$dados["data_lanc_orcamento"] /* Tabela orcamento */ .",".
					$dados["bool_ativo_orcamento"] /* Tabela orcamento */ .",".
					$dados["id_item"] /* Tabela item */ .",".
					$dados["descricao_item"] /* Tabela item */ .",".
					$dados["descricao_site_item"] /* Tabela item */ .",".
					$dados["unidade_medida_item"] /* Tabela item */ .",".
					$dados["imagem_item"] /* Tabela item */ .",".
					$dados["grupo_id"] /* Tabela item */ .",".
					$dados["usuario_id"] /* Tabela item */ .",".
					$dados["bool_ativo_item"] /* Tabela item */ ;
		} else {
			echo    "[]".
					$dados["id_item_orcamento"].",".
					$dados["data_lanc_item_orcamento"].",".
					$dados["orcamento_id"].",".
					$dados["item_id"].",".
					$dados["quantidade_item_orcamento"].",".
					$dados["total_item_orcamento"].",".
					$dados["bool_ativo_item_orcamento"].",".
					$dados["id_orcamento"] /* Tabela orcamento */ .",".
					$dados["descricao_orcamento"] /* Tabela orcamento */ .",".
					$dados["cliente_site_id"] /* Tabela orcamento */ .",".
					$dados["data_lanc_orcamento"] /* Tabela orcamento */ .",".
					$dados["bool_ativo_orcamento"] /* Tabela orcamento */ .",".
					$dados["id_item"] /* Tabela item */ .",".
					$dados["descricao_item"] /* Tabela item */ .",".
					$dados["descricao_site_item"] /* Tabela item */ .",".
					$dados["unidade_medida_item"] /* Tabela item */ .",".
					$dados["imagem_item"] /* Tabela item */ .",".
					$dados["grupo_id"] /* Tabela item */ .",".
					$dados["usuario_id"] /* Tabela item */ .",".
					$dados["bool_ativo_item"] /* Tabela item */ ;
		}
		$cont++;
	}
}

?>
