
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_topicos_loja'])) {
	$cont = 1;
	$sql = "	SELECT topicos_loja.* , loja.* 
				FROM topicos_loja topicos_loja 
				INNER JOIN loja loja ON topicos_loja.loja_id = loja.id_loja
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_topicos_loja"].",".
					$dados["titulo_topicos_loja"].",".
					$dados["descricao_topicos_loja"].",".
					$dados["loja_id"].",".
					$dados["data_atualizacao_topicos_loja"].",".
					$dados["bool_ativo_topicos_loja"].",".
					$dados["id_loja"] /* Tabela loja */ .",".
					$dados["titulo_loja"] /* Tabela loja */ .",".
					$dados["descricao_loja"] /* Tabela loja */ .",".
					$dados["data_atualizacao_loja"] /* Tabela loja */ .",".
					$dados["bool_ativo_loja"] /* Tabela loja */ ;
		} else {
			echo    "[]".
					$dados["id_topicos_loja"].",".
					$dados["titulo_topicos_loja"].",".
					$dados["descricao_topicos_loja"].",".
					$dados["loja_id"].",".
					$dados["data_atualizacao_topicos_loja"].",".
					$dados["bool_ativo_topicos_loja"].",".
					$dados["id_loja"] /* Tabela loja */ .",".
					$dados["titulo_loja"] /* Tabela loja */ .",".
					$dados["descricao_loja"] /* Tabela loja */ .",".
					$dados["data_atualizacao_loja"] /* Tabela loja */ .",".
					$dados["bool_ativo_loja"] /* Tabela loja */ ;
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_topicos_loja_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT topicos_loja.* , loja.* 
				FROM topicos_loja topicos_loja
				INNER JOIN loja loja ON topicos_loja.loja_id = loja.id_loja
				WHERE id_topicos_loja = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_topicos_loja"].",".
					$dados["titulo_topicos_loja"].",".
					$dados["descricao_topicos_loja"].",".
					$dados["loja_id"].",".
					$dados["data_atualizacao_topicos_loja"].",".
					$dados["bool_ativo_topicos_loja"].",".
					$dados["id_loja"] /* Tabela loja */ .",".
					$dados["titulo_loja"] /* Tabela loja */ .",".
					$dados["descricao_loja"] /* Tabela loja */ .",".
					$dados["data_atualizacao_loja"] /* Tabela loja */ .",".
					$dados["bool_ativo_loja"] /* Tabela loja */ ;
	}
}




if (!empty($_POST['pequisa_topicos_loja_grade'])) {
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT topicos_loja.* , loja.* 
				FROM topicos_loja topicos_loja 
				INNER JOIN loja loja ON topicos_loja.loja_id = loja.id_loja
				WHERE $coluna = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_topicos_loja"].",".
					$dados["titulo_topicos_loja"].",".
					$dados["descricao_topicos_loja"].",".
					$dados["loja_id"].",".
					$dados["data_atualizacao_topicos_loja"].",".
					$dados["bool_ativo_topicos_loja"].",".
					$dados["id_loja"] /* Tabela loja */ .",".
					$dados["titulo_loja"] /* Tabela loja */ .",".
					$dados["descricao_loja"] /* Tabela loja */ .",".
					$dados["data_atualizacao_loja"] /* Tabela loja */ .",".
					$dados["bool_ativo_loja"] /* Tabela loja */ ;
		} else {
			echo    "[]".
					$dados["id_topicos_loja"].",".
					$dados["titulo_topicos_loja"].",".
					$dados["descricao_topicos_loja"].",".
					$dados["loja_id"].",".
					$dados["data_atualizacao_topicos_loja"].",".
					$dados["bool_ativo_topicos_loja"].",".
					$dados["id_loja"] /* Tabela loja */ .",".
					$dados["titulo_loja"] /* Tabela loja */ .",".
					$dados["descricao_loja"] /* Tabela loja */ .",".
					$dados["data_atualizacao_loja"] /* Tabela loja */ .",".
					$dados["bool_ativo_loja"] /* Tabela loja */ ;
		}
		$cont++;
	}
}

?>
