
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_sub_grupo_estoque'])) {
	$cont = 1;
	$sql = "	SELECT sub_grupo_estoque.* 
				FROM sub_grupo_estoque sub_grupo_estoque 
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["GRUPO"].",".
					$dados["SUB_GRUPO"].",".
					$dados["DESCRICAO"].",".
					$dados["DataAtualizacao"].",".
					$dados["HoraAtualizacao"].",".
					$dados["UsuarioAtualizacao"];
		} else {
			echo    "[]".
					$dados["GRUPO"].",".
					$dados["SUB_GRUPO"].",".
					$dados["DESCRICAO"].",".
					$dados["DataAtualizacao"].",".
					$dados["HoraAtualizacao"].",".
					$dados["UsuarioAtualizacao"];
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_sub_grupo_estoque_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT sub_grupo_estoque.* 
				FROM sub_grupo_estoque sub_grupo_estoque
				WHERE id_sub_grupo_estoque = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["GRUPO"].",".
					$dados["SUB_GRUPO"].",".
					$dados["DESCRICAO"].",".
					$dados["DataAtualizacao"].",".
					$dados["HoraAtualizacao"].",".
					$dados["UsuarioAtualizacao"];
	}
}
?>
