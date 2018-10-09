
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
					$dados["id_contato"].",".
					$dados["NOME_EMPRESA_contato"].",".
					$dados["NOME_CIDADE_contato"].",".
					$dados["ESTADO_contato"].",".
					$dados["FONE_contato"].",".
					$dados["FONE_APP_contato"].",".
					$dados["EMAIL_contato"].",".
					$dados["sendusername_contato"].",".
					$dados["sendpassword_contato"].",".
					$dados["smtpserver_contato"].",".
					$dados["smtpserverport_contato"].",".
					$dados["MailFrom_contato"].",".
					$dados["MailTo_contato"].",".
					$dados["MailCc_contato"].",".
					$dados["data_atualizacao_contato"].",".
					$dados["bool_ativo_contato"];
		} else {
			echo    "[]".
					$dados["id_contato"].",".
					$dados["NOME_EMPRESA_contato"].",".
					$dados["NOME_CIDADE_contato"].",".
					$dados["ESTADO_contato"].",".
					$dados["FONE_contato"].",".
					$dados["FONE_APP_contato"].",".
					$dados["EMAIL_contato"].",".
					$dados["sendusername_contato"].",".
					$dados["sendpassword_contato"].",".
					$dados["smtpserver_contato"].",".
					$dados["smtpserverport_contato"].",".
					$dados["MailFrom_contato"].",".
					$dados["MailTo_contato"].",".
					$dados["MailCc_contato"].",".
					$dados["data_atualizacao_contato"].",".
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
					$dados["id_contato"].",".
					$dados["NOME_EMPRESA_contato"].",".
					$dados["NOME_CIDADE_contato"].",".
					$dados["ESTADO_contato"].",".
					$dados["FONE_contato"].",".
					$dados["FONE_APP_contato"].",".
					$dados["EMAIL_contato"].",".
					$dados["sendusername_contato"].",".
					$dados["sendpassword_contato"].",".
					$dados["smtpserver_contato"].",".
					$dados["smtpserverport_contato"].",".
					$dados["MailFrom_contato"].",".
					$dados["MailTo_contato"].",".
					$dados["MailCc_contato"].",".
					$dados["data_atualizacao_contato"].",".
					$dados["bool_ativo_contato"];
	}
}




if (!empty($_POST['pequisa_contato_grade'])) {
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT contato.* 
				FROM contato contato 
				WHERE $coluna = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["id_contato"].",".
					$dados["NOME_EMPRESA_contato"].",".
					$dados["NOME_CIDADE_contato"].",".
					$dados["ESTADO_contato"].",".
					$dados["FONE_contato"].",".
					$dados["FONE_APP_contato"].",".
					$dados["EMAIL_contato"].",".
					$dados["sendusername_contato"].",".
					$dados["sendpassword_contato"].",".
					$dados["smtpserver_contato"].",".
					$dados["smtpserverport_contato"].",".
					$dados["MailFrom_contato"].",".
					$dados["MailTo_contato"].",".
					$dados["MailCc_contato"].",".
					$dados["data_atualizacao_contato"].",".
					$dados["bool_ativo_contato"];
		} else {
			echo    "[]".
					$dados["id_contato"].",".
					$dados["NOME_EMPRESA_contato"].",".
					$dados["NOME_CIDADE_contato"].",".
					$dados["ESTADO_contato"].",".
					$dados["FONE_contato"].",".
					$dados["FONE_APP_contato"].",".
					$dados["EMAIL_contato"].",".
					$dados["sendusername_contato"].",".
					$dados["sendpassword_contato"].",".
					$dados["smtpserver_contato"].",".
					$dados["smtpserverport_contato"].",".
					$dados["MailFrom_contato"].",".
					$dados["MailTo_contato"].",".
					$dados["MailCc_contato"].",".
					$dados["data_atualizacao_contato"].",".
					$dados["bool_ativo_contato"];
		}
		$cont++;
	}
}

?>
