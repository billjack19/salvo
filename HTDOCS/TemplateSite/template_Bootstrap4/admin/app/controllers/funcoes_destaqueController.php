
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_destaque'])) {
	$cont = 1;
	$sql = "	SELECT destaque.* , grupo.* 
				FROM destaque destaque 
				INNER JOIN grupo grupo ON destaque.grupo_id = grupo.id_grupo
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_destaque"].",".
					$dados["descricao_destaque"].",".
					$dados["grupo_id"].",".
					$dados["imagem_destaque"].",".
					$dados["data_atualizacao_destaque"].",".
					$dados["bool_ativo_destaque"].",".
					$dados["id_grupo"] /* Tabela grupo */ .",".
					$dados["descricao_grupo"] /* Tabela grupo */ .",".
					$dados["data_atualizacao_grupo"] /* Tabela grupo */ .",".
					$dados["usuario_id"] /* Tabela grupo */ .",".
					$dados["bool_ativo_grupo"] /* Tabela grupo */ ;
		} else {
			echo    "[]".
					$dados["id_destaque"].",".
					$dados["descricao_destaque"].",".
					$dados["grupo_id"].",".
					$dados["imagem_destaque"].",".
					$dados["data_atualizacao_destaque"].",".
					$dados["bool_ativo_destaque"].",".
					$dados["id_grupo"] /* Tabela grupo */ .",".
					$dados["descricao_grupo"] /* Tabela grupo */ .",".
					$dados["data_atualizacao_grupo"] /* Tabela grupo */ .",".
					$dados["usuario_id"] /* Tabela grupo */ .",".
					$dados["bool_ativo_grupo"] /* Tabela grupo */ ;
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_destaque_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT destaque.* , grupo.* 
				FROM destaque destaque
				INNER JOIN grupo grupo ON destaque.grupo_id = grupo.id_grupo
				WHERE id_destaque = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_destaque"].",".
					$dados["descricao_destaque"].",".
					$dados["grupo_id"].",".
					$dados["imagem_destaque"].",".
					$dados["data_atualizacao_destaque"].",".
					$dados["bool_ativo_destaque"].",".
					$dados["id_grupo"] /* Tabela grupo */ .",".
					$dados["descricao_grupo"] /* Tabela grupo */ .",".
					$dados["data_atualizacao_grupo"] /* Tabela grupo */ .",".
					$dados["usuario_id"] /* Tabela grupo */ .",".
					$dados["bool_ativo_grupo"] /* Tabela grupo */ ;
	}
}




if (!empty($_POST['pequisa_destaque_grade'])) {
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT destaque.* , grupo.* 
				FROM destaque destaque 
				INNER JOIN grupo grupo ON destaque.grupo_id = grupo.id_grupo
				WHERE $coluna = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_destaque"].",".
					$dados["descricao_destaque"].",".
					$dados["grupo_id"].",".
					$dados["imagem_destaque"].",".
					$dados["data_atualizacao_destaque"].",".
					$dados["bool_ativo_destaque"].",".
					$dados["id_grupo"] /* Tabela grupo */ .",".
					$dados["descricao_grupo"] /* Tabela grupo */ .",".
					$dados["data_atualizacao_grupo"] /* Tabela grupo */ .",".
					$dados["usuario_id"] /* Tabela grupo */ .",".
					$dados["bool_ativo_grupo"] /* Tabela grupo */ ;
		} else {
			echo    "[]".
					$dados["id_destaque"].",".
					$dados["descricao_destaque"].",".
					$dados["grupo_id"].",".
					$dados["imagem_destaque"].",".
					$dados["data_atualizacao_destaque"].",".
					$dados["bool_ativo_destaque"].",".
					$dados["id_grupo"] /* Tabela grupo */ .",".
					$dados["descricao_grupo"] /* Tabela grupo */ .",".
					$dados["data_atualizacao_grupo"] /* Tabela grupo */ .",".
					$dados["usuario_id"] /* Tabela grupo */ .",".
					$dados["bool_ativo_grupo"] /* Tabela grupo */ ;
		}
		$cont++;
	}
}

?>
