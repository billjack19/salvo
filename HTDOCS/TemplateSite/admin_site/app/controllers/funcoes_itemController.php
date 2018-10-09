
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_item'])) {
	$cont = 1;
	$sql = "	SELECT item.* , grupo.* , usuario.* 
				FROM item item 
				INNER JOIN grupo grupo ON item.grupo_id = grupo.id_grupo
				INNER JOIN usuario usuario ON item.usuario_id = usuario.id_usuario
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_item"].",".
					$dados["descricao_item"].",".
					$dados["descricao_site_item"].",".
					$dados["unidade_medida_item"].",".
					$dados["imagem_item"].",".
					$dados["grupo_id"].",".
					$dados["usuario_id"].",".
					$dados["bool_ativo_item"].",".
					$dados["id_grupo"] /* Tabela grupo */ .",".
					$dados["descricao_grupo"] /* Tabela grupo */ .",".
					$dados["data_atualizacao_grupo"] /* Tabela grupo */ .",".
					$dados["usuario_id"] /* Tabela grupo */ .",".
					$dados["bool_ativo_grupo"] /* Tabela grupo */ .",".
					$dados["id_usuario"] /* Tabela usuario */ .",".
					$dados["nome_usuario"] /* Tabela usuario */ .",".
					$dados["login_usuario"] /* Tabela usuario */ .",".
					$dados["senha_usuario"] /* Tabela usuario */ .",".
					$dados["foto_usuario"] /* Tabela usuario */ .",".
					$dados["nivel_acesso_usuario"] /* Tabela usuario */ ;
		} else {
			echo    "[]".
					$dados["id_item"].",".
					$dados["descricao_item"].",".
					$dados["descricao_site_item"].",".
					$dados["unidade_medida_item"].",".
					$dados["imagem_item"].",".
					$dados["grupo_id"].",".
					$dados["usuario_id"].",".
					$dados["bool_ativo_item"].",".
					$dados["id_grupo"] /* Tabela grupo */ .",".
					$dados["descricao_grupo"] /* Tabela grupo */ .",".
					$dados["data_atualizacao_grupo"] /* Tabela grupo */ .",".
					$dados["usuario_id"] /* Tabela grupo */ .",".
					$dados["bool_ativo_grupo"] /* Tabela grupo */ .",".
					$dados["id_usuario"] /* Tabela usuario */ .",".
					$dados["nome_usuario"] /* Tabela usuario */ .",".
					$dados["login_usuario"] /* Tabela usuario */ .",".
					$dados["senha_usuario"] /* Tabela usuario */ .",".
					$dados["foto_usuario"] /* Tabela usuario */ .",".
					$dados["nivel_acesso_usuario"] /* Tabela usuario */ ;
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_item_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT item.* , grupo.* , usuario.* 
				FROM item item
				INNER JOIN grupo grupo ON item.grupo_id = grupo.id_grupo
				INNER JOIN usuario usuario ON item.usuario_id = usuario.id_usuario
				WHERE id_item = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_item"].",".
					$dados["descricao_item"].",".
					$dados["descricao_site_item"].",".
					$dados["unidade_medida_item"].",".
					$dados["imagem_item"].",".
					$dados["grupo_id"].",".
					$dados["usuario_id"].",".
					$dados["bool_ativo_item"].",".
					$dados["id_grupo"] /* Tabela grupo */ .",".
					$dados["descricao_grupo"] /* Tabela grupo */ .",".
					$dados["data_atualizacao_grupo"] /* Tabela grupo */ .",".
					$dados["usuario_id"] /* Tabela grupo */ .",".
					$dados["bool_ativo_grupo"] /* Tabela grupo */ .",".
					$dados["id_usuario"] /* Tabela usuario */ .",".
					$dados["nome_usuario"] /* Tabela usuario */ .",".
					$dados["login_usuario"] /* Tabela usuario */ .",".
					$dados["senha_usuario"] /* Tabela usuario */ .",".
					$dados["foto_usuario"] /* Tabela usuario */ .",".
					$dados["nivel_acesso_usuario"] /* Tabela usuario */ ;
	}
}




if (!empty($_POST['pequisa_item_grade'])) {
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT item.* , grupo.* , usuario.* 
				FROM item item 
				INNER JOIN grupo grupo ON item.grupo_id = grupo.id_grupo
				INNER JOIN usuario usuario ON item.usuario_id = usuario.id_usuario
				WHERE $coluna = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_item"].",".
					$dados["descricao_item"].",".
					$dados["descricao_site_item"].",".
					$dados["unidade_medida_item"].",".
					$dados["imagem_item"].",".
					$dados["grupo_id"].",".
					$dados["usuario_id"].",".
					$dados["bool_ativo_item"].",".
					$dados["id_grupo"] /* Tabela grupo */ .",".
					$dados["descricao_grupo"] /* Tabela grupo */ .",".
					$dados["data_atualizacao_grupo"] /* Tabela grupo */ .",".
					$dados["usuario_id"] /* Tabela grupo */ .",".
					$dados["bool_ativo_grupo"] /* Tabela grupo */ .",".
					$dados["id_usuario"] /* Tabela usuario */ .",".
					$dados["nome_usuario"] /* Tabela usuario */ .",".
					$dados["login_usuario"] /* Tabela usuario */ .",".
					$dados["senha_usuario"] /* Tabela usuario */ .",".
					$dados["foto_usuario"] /* Tabela usuario */ .",".
					$dados["nivel_acesso_usuario"] /* Tabela usuario */ ;
		} else {
			echo    "[]".
					$dados["id_item"].",".
					$dados["descricao_item"].",".
					$dados["descricao_site_item"].",".
					$dados["unidade_medida_item"].",".
					$dados["imagem_item"].",".
					$dados["grupo_id"].",".
					$dados["usuario_id"].",".
					$dados["bool_ativo_item"].",".
					$dados["id_grupo"] /* Tabela grupo */ .",".
					$dados["descricao_grupo"] /* Tabela grupo */ .",".
					$dados["data_atualizacao_grupo"] /* Tabela grupo */ .",".
					$dados["usuario_id"] /* Tabela grupo */ .",".
					$dados["bool_ativo_grupo"] /* Tabela grupo */ .",".
					$dados["id_usuario"] /* Tabela usuario */ .",".
					$dados["nome_usuario"] /* Tabela usuario */ .",".
					$dados["login_usuario"] /* Tabela usuario */ .",".
					$dados["senha_usuario"] /* Tabela usuario */ .",".
					$dados["foto_usuario"] /* Tabela usuario */ .",".
					$dados["nivel_acesso_usuario"] /* Tabela usuario */ ;
		}
		$cont++;
	}
}

?>
