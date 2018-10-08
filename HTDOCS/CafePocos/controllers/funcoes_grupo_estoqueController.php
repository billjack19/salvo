
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_grupo_estoque'])) {
	$cont = 1;
	$sql = "	SELECT grupo_estoque.* 
				FROM grupo_estoque grupo_estoque 
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["GRUPO"].",".
					$dados["DESCRICAO"].",".
					$dados["DataAtualizacao"].",".
					$dados["HoraAtualizacao"].",".
					$dados["UsuarioAtualizacao"].",".
					$dados["Conta_Contabil"];
		} else {
			echo    "[]".
					$dados["GRUPO"].",".
					$dados["DESCRICAO"].",".
					$dados["DataAtualizacao"].",".
					$dados["HoraAtualizacao"].",".
					$dados["UsuarioAtualizacao"].",".
					$dados["Conta_Contabil"];
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_grupo_estoque_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT grupo_estoque.* 
				FROM grupo_estoque grupo_estoque
				WHERE id_grupo_estoque = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["GRUPO"].",".
					$dados["DESCRICAO"].",".
					$dados["DataAtualizacao"].",".
					$dados["HoraAtualizacao"].",".
					$dados["UsuarioAtualizacao"].",".
					$dados["Conta_Contabil"];
	}
}
?>
