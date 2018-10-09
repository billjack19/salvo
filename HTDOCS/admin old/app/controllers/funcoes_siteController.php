
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_site'])) {
	$cont = 1;
	$sql = "	SELECT site.* 
				FROM site site 
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["ID_SITE"].",".
					$dados["NOME_EMPRESA"].",".
					$dados["NOME_CIDADE"].",".
					$dados["ESTADO"].",".
					$dados["FONE"].",".
					$dados["FONE_APP"].",".
					$dados["EMAIL"].",".
					$dados["sendusername"].",".
					$dados["sendpassword"].",".
					$dados["smtpserver"].",".
					$dados["smtpserverport"].",".
					$dados["MailFrom"].",".
					$dados["MailTo"].",".
					$dados["MailCc"].",".
					$dados["bool_ativo_site"];
		} else {
			echo    "[]".
					$dados["ID_SITE"].",".
					$dados["NOME_EMPRESA"].",".
					$dados["NOME_CIDADE"].",".
					$dados["ESTADO"].",".
					$dados["FONE"].",".
					$dados["FONE_APP"].",".
					$dados["EMAIL"].",".
					$dados["sendusername"].",".
					$dados["sendpassword"].",".
					$dados["smtpserver"].",".
					$dados["smtpserverport"].",".
					$dados["MailFrom"].",".
					$dados["MailTo"].",".
					$dados["MailCc"].",".
					$dados["bool_ativo_site"];
		}
		$cont++;
	}
}

if (!empty($_POST['pequisa_site_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT site.* 
				FROM site site
				WHERE id_site = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["ID_SITE"].",".
					$dados["NOME_EMPRESA"].",".
					$dados["NOME_CIDADE"].",".
					$dados["ESTADO"].",".
					$dados["FONE"].",".
					$dados["FONE_APP"].",".
					$dados["EMAIL"].",".
					$dados["sendusername"].",".
					$dados["sendpassword"].",".
					$dados["smtpserver"].",".
					$dados["smtpserverport"].",".
					$dados["MailFrom"].",".
					$dados["MailTo"].",".
					$dados["MailCc"].",".
					$dados["bool_ativo_site"];
	}
}




if (!empty($_POST['pequisa_site_grade'])) {
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT site.* 
				FROM site site 
				WHERE $coluna = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["ID_SITE"].",".
					$dados["NOME_EMPRESA"].",".
					$dados["NOME_CIDADE"].",".
					$dados["ESTADO"].",".
					$dados["FONE"].",".
					$dados["FONE_APP"].",".
					$dados["EMAIL"].",".
					$dados["sendusername"].",".
					$dados["sendpassword"].",".
					$dados["smtpserver"].",".
					$dados["smtpserverport"].",".
					$dados["MailFrom"].",".
					$dados["MailTo"].",".
					$dados["MailCc"].",".
					$dados["bool_ativo_site"];
		} else {
			echo    "[]".
					$dados["ID_SITE"].",".
					$dados["NOME_EMPRESA"].",".
					$dados["NOME_CIDADE"].",".
					$dados["ESTADO"].",".
					$dados["FONE"].",".
					$dados["FONE_APP"].",".
					$dados["EMAIL"].",".
					$dados["sendusername"].",".
					$dados["sendpassword"].",".
					$dados["smtpserver"].",".
					$dados["smtpserverport"].",".
					$dados["MailFrom"].",".
					$dados["MailTo"].",".
					$dados["MailCc"].",".
					$dados["bool_ativo_site"];
		}
		$cont++;
	}
}

?>
