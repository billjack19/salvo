
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_contato'])) {
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$cont = 1;
	$sql = "	SELECT contato.* 
				FROM contato contato 
				INNER JOIN usuario usuario ON contato.usuario_id = usuario.id_usuario 
				WHERE contato.nome_contato LIKE '%$filtro%'
				   OR contato.email_contato LIKE '%$filtro%'
				   OR contato.telefone_contato LIKE '%$filtro%'
				   OR contato.assunto_contato LIKE '%$filtro%'
				   OR contato.mensagem_contato LIKE '%$filtro%'
				   OR usuario.nome_usuario LIKE '%$filtro%'
				   OR contato.data_atualizacao_contato LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_contato"]."{,}".
					$dados["nome_contato"]."{,}".
					$dados["email_contato"]."{,}".
					$dados["telefone_contato"]."{,}".
					$dados["assunto_contato"]."{,}".
					$dados["mensagem_contato"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["data_atualizacao_contato"]."{,}".
					$dados["bool_ativo_contato"];
		} else {
			echo    "[]".
					$dados["id_contato"]."{,}".
					$dados["nome_contato"]."{,}".
					$dados["email_contato"]."{,}".
					$dados["telefone_contato"]."{,}".
					$dados["assunto_contato"]."{,}".
					$dados["mensagem_contato"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["data_atualizacao_contato"]."{,}".
					$dados["bool_ativo_contato"];
		}
		$cont++;
	}
}




if (!empty($_POST['pequisa_contato_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT contato.* 
				FROM contato
				WHERE id_contato = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["id_contato"]."{,}".
					$dados["nome_contato"]."{,}".
					$dados["email_contato"]."{,}".
					$dados["telefone_contato"]."{,}".
					$dados["assunto_contato"]."{,}".
					$dados["mensagem_contato"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["data_atualizacao_contato"]."{,}".
					$dados["bool_ativo_contato"];
	}
}




if (!empty($_POST['pequisa_contato_grade'])) {
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT contato.* 
				FROM contato contato 
				INNER JOIN usuario usuario ON contato.usuario_id = usuario.id_usuario
				WHERE $coluna = $id 
				AND (
					   contato.nome_contato LIKE '%$filtro%'
					OR contato.email_contato LIKE '%$filtro%'
					OR contato.telefone_contato LIKE '%$filtro%'
					OR contato.assunto_contato LIKE '%$filtro%'
					OR contato.mensagem_contato LIKE '%$filtro%'
					OR usuario.nome_usuario LIKE '%$filtro%'
					OR contato.data_atualizacao_contato LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_contato"]."{,}".
					$dados["nome_contato"]."{,}".
					$dados["email_contato"]."{,}".
					$dados["telefone_contato"]."{,}".
					$dados["assunto_contato"]."{,}".
					$dados["mensagem_contato"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["data_atualizacao_contato"]."{,}".
					$dados["bool_ativo_contato"];
		} else {
			echo    "[]".
					$dados["id_contato"]."{,}".
					$dados["nome_contato"]."{,}".
					$dados["email_contato"]."{,}".
					$dados["telefone_contato"]."{,}".
					$dados["assunto_contato"]."{,}".
					$dados["mensagem_contato"]."{,}".
					$dados["usuario_id"]."{,}".
					$dados["data_atualizacao_contato"]."{,}".
					$dados["bool_ativo_contato"];
		}
		$cont++;
	}
}

?>
