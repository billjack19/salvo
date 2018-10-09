
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_grupo'])) {
	$cont = 1;
	$sql = "	SELECT grupo.* , usuario.* 
				FROM grupo grupo 
				INNER JOIN usuario usuario ON grupo.usuario_id = usuario.id_usuario
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_grupo"].",".
					$dados["descricao_grupo"].",".
					$dados["data_atualizacao_grupo"].",".
					$dados["usuario_id"].",".
					$dados["bool_ativo_grupo"].",".
					$dados["id_usuario"] /* Tabela usuario */ .",".
					$dados["nome_usuario"] /* Tabela usuario */ .",".
					$dados["login_usuario"] /* Tabela usuario */ .",".
					$dados["senha_usuario"] /* Tabela usuario */ .",".
					$dados["bool_ativo_usuario"] /* Tabela usuario */ ;
		} else {
			echo    "[]".
					$dados["id_grupo"].",".
					$dados["descricao_grupo"].",".
					$dados["data_atualizacao_grupo"].",".
					$dados["usuario_id"].",".
					$dados["bool_ativo_grupo"].",".
					$dados["id_usuario"] /* Tabela usuario */ .",".
					$dados["nome_usuario"] /* Tabela usuario */ .",".
					$dados["login_usuario"] /* Tabela usuario */ .",".
					$dados["senha_usuario"] /* Tabela usuario */ .",".
					$dados["bool_ativo_usuario"] /* Tabela usuario */ ;
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_grupo_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT grupo.* , usuario.* 
				FROM grupo grupo
				INNER JOIN usuario usuario ON grupo.usuario_id = usuario.id_usuario
				WHERE id_grupo = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_grupo"].",".
					$dados["descricao_grupo"].",".
					$dados["data_atualizacao_grupo"].",".
					$dados["usuario_id"].",".
					$dados["bool_ativo_grupo"].",".
					$dados["id_usuario"] /* Tabela usuario */ .",".
					$dados["nome_usuario"] /* Tabela usuario */ .",".
					$dados["login_usuario"] /* Tabela usuario */ .",".
					$dados["senha_usuario"] /* Tabela usuario */ .",".
					$dados["bool_ativo_usuario"] /* Tabela usuario */ ;
	}
}




if (!empty($_POST['pequisa_grupo_grade'])) {
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT grupo.* , usuario.* 
				FROM grupo grupo 
				INNER JOIN usuario usuario ON grupo.usuario_id = usuario.id_usuario
				WHERE $coluna = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_grupo"].",".
					$dados["descricao_grupo"].",".
					$dados["data_atualizacao_grupo"].",".
					$dados["usuario_id"].",".
					$dados["bool_ativo_grupo"].",".
					$dados["id_usuario"] /* Tabela usuario */ .",".
					$dados["nome_usuario"] /* Tabela usuario */ .",".
					$dados["login_usuario"] /* Tabela usuario */ .",".
					$dados["senha_usuario"] /* Tabela usuario */ .",".
					$dados["bool_ativo_usuario"] /* Tabela usuario */ ;
		} else {
			echo    "[]".
					$dados["id_grupo"].",".
					$dados["descricao_grupo"].",".
					$dados["data_atualizacao_grupo"].",".
					$dados["usuario_id"].",".
					$dados["bool_ativo_grupo"].",".
					$dados["id_usuario"] /* Tabela usuario */ .",".
					$dados["nome_usuario"] /* Tabela usuario */ .",".
					$dados["login_usuario"] /* Tabela usuario */ .",".
					$dados["senha_usuario"] /* Tabela usuario */ .",".
					$dados["bool_ativo_usuario"] /* Tabela usuario */ ;
		}
		$cont++;
	}
}

?>
