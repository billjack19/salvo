
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_contato'])) {
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$cont = 1;
	$sql = "	SELECT contato.* 
				FROM contato contato  
				WHERE contato.DT_CONTATO LIKE '%$filtro%'
				   OR contato.NOME_CONTATO LIKE '%$filtro%'
				   OR contato.EMAIL_CONTATO LIKE '%$filtro%'
				   OR contato.TELEFONE_CONTATO LIKE '%$filtro%'
				   OR contato.ASSUNTO_CONTATO LIKE '%$filtro%'
				   OR contato.MENSAGEM_CONTATO LIKE '%$filtro%'
				   OR contato.ARQUIVO_CONTATO LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_contato"]."{,}".
					$dados["DT_CONTATO"]."{,}".
					$dados["NOME_CONTATO"]."{,}".
					$dados["EMAIL_CONTATO"]."{,}".
					$dados["TELEFONE_CONTATO"]."{,}".
					$dados["ASSUNTO_CONTATO"]."{,}".
					$dados["MENSAGEM_CONTATO"]."{,}".
					$dados["ARQUIVO_CONTATO"]."{,}".
					$dados["bool_ativo_contato"];
		} else {
			echo    "[]".
					$dados["id_contato"]."{,}".
					$dados["DT_CONTATO"]."{,}".
					$dados["NOME_CONTATO"]."{,}".
					$dados["EMAIL_CONTATO"]."{,}".
					$dados["TELEFONE_CONTATO"]."{,}".
					$dados["ASSUNTO_CONTATO"]."{,}".
					$dados["MENSAGEM_CONTATO"]."{,}".
					$dados["ARQUIVO_CONTATO"]."{,}".
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
					$dados["DT_CONTATO"]."{,}".
					$dados["NOME_CONTATO"]."{,}".
					$dados["EMAIL_CONTATO"]."{,}".
					$dados["TELEFONE_CONTATO"]."{,}".
					$dados["ASSUNTO_CONTATO"]."{,}".
					$dados["MENSAGEM_CONTATO"]."{,}".
					$dados["ARQUIVO_CONTATO"]."{,}".
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
				WHERE $coluna = $id 
				AND (
					   contato.DT_CONTATO LIKE '%$filtro%'
					OR contato.NOME_CONTATO LIKE '%$filtro%'
					OR contato.EMAIL_CONTATO LIKE '%$filtro%'
					OR contato.TELEFONE_CONTATO LIKE '%$filtro%'
					OR contato.ASSUNTO_CONTATO LIKE '%$filtro%'
					OR contato.MENSAGEM_CONTATO LIKE '%$filtro%'
					OR contato.ARQUIVO_CONTATO LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_contato"]."{,}".
					$dados["DT_CONTATO"]."{,}".
					$dados["NOME_CONTATO"]."{,}".
					$dados["EMAIL_CONTATO"]."{,}".
					$dados["TELEFONE_CONTATO"]."{,}".
					$dados["ASSUNTO_CONTATO"]."{,}".
					$dados["MENSAGEM_CONTATO"]."{,}".
					$dados["ARQUIVO_CONTATO"]."{,}".
					$dados["bool_ativo_contato"];
		} else {
			echo    "[]".
					$dados["id_contato"]."{,}".
					$dados["DT_CONTATO"]."{,}".
					$dados["NOME_CONTATO"]."{,}".
					$dados["EMAIL_CONTATO"]."{,}".
					$dados["TELEFONE_CONTATO"]."{,}".
					$dados["ASSUNTO_CONTATO"]."{,}".
					$dados["MENSAGEM_CONTATO"]."{,}".
					$dados["ARQUIVO_CONTATO"]."{,}".
					$dados["bool_ativo_contato"];
		}
		$cont++;
	}
}

?>
