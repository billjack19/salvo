
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_videos'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$cont = 1;
	$sql = "	SELECT videos.* 
				FROM videos videos  
				WHERE descricao_videos LIKE '%$filtro%'
				OR link_videos LIKE '%$filtro%'
				OR data_atualizacao_videos LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_videos"]."{,}".
					$dados["descricao_videos"]."{,}".
					$dados["link_videos"]."{,}".
					$dados["data_atualizacao_videos"]."{,}".
					$dados["bool_ativo_videos"];
		} else {
			echo    "[]".
					$dados["id_videos"]."{,}".
					$dados["descricao_videos"]."{,}".
					$dados["link_videos"]."{,}".
					$dados["data_atualizacao_videos"]."{,}".
					$dados["bool_ativo_videos"];
		}
		$cont++;
	}
}




if (!empty($_POST['pequisa_videos_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT videos.* 
				FROM videos videos
				WHERE id_videos = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_videos"]."{,}".
					$dados["descricao_videos"]."{,}".
					$dados["link_videos"]."{,}".
					$dados["data_atualizacao_videos"]."{,}".
					$dados["bool_ativo_videos"];
	}
}




if (!empty($_POST['pequisa_videos_grade'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT videos.* 
				FROM videos videos 
				WHERE $coluna = $id 
				AND (
					   descricao_videos LIKE '%$filtro%'
					OR link_videos LIKE '%$filtro%'
					OR data_atualizacao_videos LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_videos"]."{,}".
					$dados["descricao_videos"]."{,}".
					$dados["link_videos"]."{,}".
					$dados["data_atualizacao_videos"]."{,}".
					$dados["bool_ativo_videos"];
		} else {
			echo    "[]".
					$dados["id_videos"]."{,}".
					$dados["descricao_videos"]."{,}".
					$dados["link_videos"]."{,}".
					$dados["data_atualizacao_videos"]."{,}".
					$dados["bool_ativo_videos"];
		}
		$cont++;
	}
}

?>
