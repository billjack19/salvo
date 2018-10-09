
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_contato'])) {
	$cont = 1;
	$sql = "	SELECT contato.* 
				FROM contato contato 
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["ID_CONTATO"].",".
					$dados["DT_CONTATO"].",".
					$dados["NOME_CONTATO"].",".
					$dados["EMAIL_CONTATO"].",".
					$dados["TELEFONE_CONTATO"].",".
					$dados["ASSUNTO_CONTATO"].",".
					$dados["MENSAGEM_CONTATO"];
		} else {
			echo    "[]".
					$dados["ID_CONTATO"].",".
					$dados["DT_CONTATO"].",".
					$dados["NOME_CONTATO"].",".
					$dados["EMAIL_CONTATO"].",".
					$dados["TELEFONE_CONTATO"].",".
					$dados["ASSUNTO_CONTATO"].",".
					$dados["MENSAGEM_CONTATO"];
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
					$dados["ID_CONTATO"].",".
					$dados["DT_CONTATO"].",".
					$dados["NOME_CONTATO"].",".
					$dados["EMAIL_CONTATO"].",".
					$dados["TELEFONE_CONTATO"].",".
					$dados["ASSUNTO_CONTATO"].",".
					$dados["MENSAGEM_CONTATO"];
	}
}
?>
