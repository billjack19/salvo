
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_relatorio_tabela'])) {
	$cont = 1;
	$sql = "	SELECT relatorio_tabela.* 
				FROM relatorio_tabela relatorio_tabela 
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_relatorio_tabela"]."{,}".
					$dados["descricao_relatorio_tabela"]."{,}".
					$dados["data_atualizacao_relatorio_tabela"]."{,}".
					$dados["bool_ativo_relatorio_tabela"];
		} else {
			echo    "[]".
					$dados["id_relatorio_tabela"]."{,}".
					$dados["descricao_relatorio_tabela"]."{,}".
					$dados["data_atualizacao_relatorio_tabela"]."{,}".
					$dados["bool_ativo_relatorio_tabela"];
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_relatorio_tabela_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT relatorio_tabela.* 
				FROM relatorio_tabela relatorio_tabela
				WHERE id_relatorio_tabela = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_relatorio_tabela"]."{,}".
					$dados["descricao_relatorio_tabela"]."{,}".
					$dados["data_atualizacao_relatorio_tabela"]."{,}".
					$dados["bool_ativo_relatorio_tabela"];
	}
}




if (!empty($_POST['pequisa_relatorio_tabela_grade'])) {
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT relatorio_tabela.* 
				FROM relatorio_tabela relatorio_tabela 
				WHERE $coluna = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_relatorio_tabela"]."{,}".
					$dados["descricao_relatorio_tabela"]."{,}".
					$dados["data_atualizacao_relatorio_tabela"]."{,}".
					$dados["bool_ativo_relatorio_tabela"];
		} else {
			echo    "[]".
					$dados["id_relatorio_tabela"]."{,}".
					$dados["descricao_relatorio_tabela"]."{,}".
					$dados["data_atualizacao_relatorio_tabela"]."{,}".
					$dados["bool_ativo_relatorio_tabela"];
		}
		$cont++;
	}
}


if (!empty($_POST['pequisa_relatorio_tabela_filtro'])) {
	$filtro = $_POST['filtro'];
	$cont = 1;
	$sql = "	SELECT relatorio_tabela.* 
				FROM relatorio_tabela relatorio_tabela  
				WHERE descricao_relatorio_tabela LIKE '%$filtro%'
				OR data_atualizacao_relatorio_tabela LIKE '%$filtro%'
				OR bool_ativo_relatorio_tabela LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_relatorio_tabela"]."{,}".
					$dados["descricao_relatorio_tabela"]."{,}".
					$dados["data_atualizacao_relatorio_tabela"]."{,}".
					$dados["bool_ativo_relatorio_tabela"];
		} else {
			echo    "[]".
					$dados["id_relatorio_tabela"]."{,}".
					$dados["descricao_relatorio_tabela"]."{,}".
					$dados["data_atualizacao_relatorio_tabela"]."{,}".
					$dados["bool_ativo_relatorio_tabela"];
		}
		$cont++;
	}
}



if (!empty($_POST['pequisa_relatorio_tabela_filtro_grade'])) {
	$filtro = $_POST['filtro'];
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];

	$cont = 1;
	$sql = "	SELECT relatorio_tabela.* 
				FROM relatorio_tabela relatorio_tabela 
				WHERE $coluna = $id 
				AND (
					   descricao_relatorio_tabela LIKE '%$filtro%'
					OR data_atualizacao_relatorio_tabela LIKE '%$filtro%'
					OR bool_ativo_relatorio_tabela LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_relatorio_tabela"]."{,}".
					$dados["descricao_relatorio_tabela"]."{,}".
					$dados["data_atualizacao_relatorio_tabela"]."{,}".
					$dados["bool_ativo_relatorio_tabela"];
		} else {
			echo    "[]".
					$dados["id_relatorio_tabela"]."{,}".
					$dados["descricao_relatorio_tabela"]."{,}".
					$dados["data_atualizacao_relatorio_tabela"]."{,}".
					$dados["bool_ativo_relatorio_tabela"];
		}
		$cont++;
	}
}

?>
