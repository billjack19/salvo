
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_links_uteis'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$cont = 1;
	$sql = "	SELECT links_uteis.* 
				FROM links_uteis links_uteis  
				WHERE descricao_links_uteis LIKE '%$filtro%'
				OR link_links_uteis LIKE '%$filtro%'
				OR data_atualizacao_links_uteis LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_links_uteis"]."{,}".
					$dados["descricao_links_uteis"]."{,}".
					$dados["link_links_uteis"]."{,}".
					$dados["data_atualizacao_links_uteis"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_links_uteis"];
		} else {
			echo    "[]".
					$dados["id_links_uteis"]."{,}".
					$dados["descricao_links_uteis"]."{,}".
					$dados["link_links_uteis"]."{,}".
					$dados["data_atualizacao_links_uteis"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_links_uteis"];
		}
		$cont++;
	}
}




if (!empty($_POST['pequisa_links_uteis_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT links_uteis.* 
				FROM links_uteis links_uteis
				WHERE id_links_uteis = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_links_uteis"]."{,}".
					$dados["descricao_links_uteis"]."{,}".
					$dados["link_links_uteis"]."{,}".
					$dados["data_atualizacao_links_uteis"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_links_uteis"];
	}
}




if (!empty($_POST['pequisa_links_uteis_grade'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT links_uteis.* 
				FROM links_uteis links_uteis 
				WHERE $coluna = $id 
				AND (
					   descricao_links_uteis LIKE '%$filtro%'
					OR link_links_uteis LIKE '%$filtro%'
					OR data_atualizacao_links_uteis LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_links_uteis"]."{,}".
					$dados["descricao_links_uteis"]."{,}".
					$dados["link_links_uteis"]."{,}".
					$dados["data_atualizacao_links_uteis"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_links_uteis"];
		} else {
			echo    "[]".
					$dados["id_links_uteis"]."{,}".
					$dados["descricao_links_uteis"]."{,}".
					$dados["link_links_uteis"]."{,}".
					$dados["data_atualizacao_links_uteis"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["bool_ativo_links_uteis"];
		}
		$cont++;
	}
}

?>
