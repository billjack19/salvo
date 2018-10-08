
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_contato'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$cont = 1;
	$sql = "	SELECT contato.* 
				FROM contato contato  
				WHERE nome_contato LIKE '%$filtro%'
				OR email_contato LIKE '%$filtro%'
				OR telefone_contato LIKE '%$filtro%'
				OR assunto_contato LIKE '%$filtro%'
				OR mensagem_contato LIKE '%$filtro%'
				OR data_atualizacao_contato LIKE '%$filtro%'
				OR bool_ativo_contato LIKE '%$filtro%'
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
				FROM contato contato
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
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT contato.* 
				FROM contato contato 
				WHERE $coluna = $id 
				AND (
					   nome_contato LIKE '%$filtro%'
					OR email_contato LIKE '%$filtro%'
					OR telefone_contato LIKE '%$filtro%'
					OR assunto_contato LIKE '%$filtro%'
					OR mensagem_contato LIKE '%$filtro%'
					OR data_atualizacao_contato LIKE '%$filtro%'
					OR bool_ativo_contato LIKE '%$filtro%'
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
