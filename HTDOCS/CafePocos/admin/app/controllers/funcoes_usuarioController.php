
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_usuario'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$cont = 1;
	$sql = "	SELECT usuario.* 
				FROM usuario usuario  
				WHERE nome_usuario LIKE '%$filtro%'
				OR login_usuario LIKE '%$filtro%'
				OR senha_usuario LIKE '%$filtro%'
				OR bool_ativo_usuario LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_usuario"]."{,}".
					$dados["nome_usuario"]."{,}".
					$dados["login_usuario"]."{,}".
					$dados["senha_usuario"]."{,}".
					$dados["bool_ativo_usuario"];
		} else {
			echo    "[]".
					$dados["id_usuario"]."{,}".
					$dados["nome_usuario"]."{,}".
					$dados["login_usuario"]."{,}".
					$dados["senha_usuario"]."{,}".
					$dados["bool_ativo_usuario"];
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_usuario_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT usuario.* 
				FROM usuario usuario
				WHERE id_usuario = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_usuario"]."{,}".
					$dados["nome_usuario"]."{,}".
					$dados["login_usuario"]."{,}".
					$dados["senha_usuario"]."{,}".
					$dados["bool_ativo_usuario"];
	}
}




if (!empty($_POST['pequisa_usuario_grade'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT usuario.* 
				FROM usuario usuario 
				WHERE $coluna = $id 
				AND (
					   nome_usuario LIKE '%$filtro%'
					OR login_usuario LIKE '%$filtro%'
					OR senha_usuario LIKE '%$filtro%'
					OR bool_ativo_usuario LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_usuario"]."{,}".
					$dados["nome_usuario"]."{,}".
					$dados["login_usuario"]."{,}".
					$dados["senha_usuario"]."{,}".
					$dados["bool_ativo_usuario"];
		} else {
			echo    "[]".
					$dados["id_usuario"]."{,}".
					$dados["nome_usuario"]."{,}".
					$dados["login_usuario"]."{,}".
					$dados["senha_usuario"]."{,}".
					$dados["bool_ativo_usuario"];
		}
		$cont++;
	}
}

?>
