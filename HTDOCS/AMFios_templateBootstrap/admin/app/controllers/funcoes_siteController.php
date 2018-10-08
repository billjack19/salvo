
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_site'])) {
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$cont = 1;
	$sql = "	SELECT site.* 
				FROM site site  
				WHERE site.NOME_EMPRESA LIKE '%$filtro%'
				   OR site.NOME_CIDADE LIKE '%$filtro%'
				   OR site.ESTADO LIKE '%$filtro%'
				   OR site.FONE LIKE '%$filtro%'
				   OR site.FONE_APP LIKE '%$filtro%'
				   OR site.EMAIL LIKE '%$filtro%'
				   OR site.sendusername LIKE '%$filtro%'
				   OR site.sendpassword LIKE '%$filtro%'
				   OR site.smtpserver LIKE '%$filtro%'
				   OR site.smtpserverport LIKE '%$filtro%'
				   OR site.MailFrom LIKE '%$filtro%'
				   OR site.MailTo LIKE '%$filtro%'
				   OR site.MailCc LIKE '%$filtro%'
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["ID_SITE"]."{,}".
					$dados["NOME_EMPRESA"]."{,}".
					$dados["NOME_CIDADE"]."{,}".
					$dados["ESTADO"]."{,}".
					$dados["FONE"]."{,}".
					$dados["FONE_APP"]."{,}".
					$dados["EMAIL"]."{,}".
					$dados["sendusername"]."{,}".
					$dados["sendpassword"]."{,}".
					$dados["smtpserver"]."{,}".
					$dados["smtpserverport"]."{,}".
					$dados["MailFrom"]."{,}".
					$dados["MailTo"]."{,}".
					$dados["MailCc"]."{,}".
					$dados["bool_ativo_site"];
		} else {
			echo    "[]".
					$dados["ID_SITE"]."{,}".
					$dados["NOME_EMPRESA"]."{,}".
					$dados["NOME_CIDADE"]."{,}".
					$dados["ESTADO"]."{,}".
					$dados["FONE"]."{,}".
					$dados["FONE_APP"]."{,}".
					$dados["EMAIL"]."{,}".
					$dados["sendusername"]."{,}".
					$dados["sendpassword"]."{,}".
					$dados["smtpserver"]."{,}".
					$dados["smtpserverport"]."{,}".
					$dados["MailFrom"]."{,}".
					$dados["MailTo"]."{,}".
					$dados["MailCc"]."{,}".
					$dados["bool_ativo_site"];
		}
		$cont++;
	}
}




if (!empty($_POST['pequisa_site_id'])) {
	$id = $_POST['id'];
	$sql = "	SELECT site.* 
				FROM site
				WHERE id_site = $id
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
			echo 	
					$dados["ID_SITE"]."{,}".
					$dados["NOME_EMPRESA"]."{,}".
					$dados["NOME_CIDADE"]."{,}".
					$dados["ESTADO"]."{,}".
					$dados["FONE"]."{,}".
					$dados["FONE_APP"]."{,}".
					$dados["EMAIL"]."{,}".
					$dados["sendusername"]."{,}".
					$dados["sendpassword"]."{,}".
					$dados["smtpserver"]."{,}".
					$dados["smtpserverport"]."{,}".
					$dados["MailFrom"]."{,}".
					$dados["MailTo"]."{,}".
					$dados["MailCc"]."{,}".
					$dados["bool_ativo_site"];
	}
}




if (!empty($_POST['pequisa_site_grade'])) {
	$filtro = !empty($_POST['filtro']) ? $_POST['filtro'] : "";
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT site.* 
				FROM site site 
				WHERE $coluna = $id 
				AND (
					   site.NOME_EMPRESA LIKE '%$filtro%'
					OR site.NOME_CIDADE LIKE '%$filtro%'
					OR site.ESTADO LIKE '%$filtro%'
					OR site.FONE LIKE '%$filtro%'
					OR site.FONE_APP LIKE '%$filtro%'
					OR site.EMAIL LIKE '%$filtro%'
					OR site.sendusername LIKE '%$filtro%'
					OR site.sendpassword LIKE '%$filtro%'
					OR site.smtpserver LIKE '%$filtro%'
					OR site.smtpserverport LIKE '%$filtro%'
					OR site.MailFrom LIKE '%$filtro%'
					OR site.MailTo LIKE '%$filtro%'
					OR site.MailCc LIKE '%$filtro%'
				)
			";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		if ($cont ==  1) {
			echo 	
					$dados["ID_SITE"]."{,}".
					$dados["NOME_EMPRESA"]."{,}".
					$dados["NOME_CIDADE"]."{,}".
					$dados["ESTADO"]."{,}".
					$dados["FONE"]."{,}".
					$dados["FONE_APP"]."{,}".
					$dados["EMAIL"]."{,}".
					$dados["sendusername"]."{,}".
					$dados["sendpassword"]."{,}".
					$dados["smtpserver"]."{,}".
					$dados["smtpserverport"]."{,}".
					$dados["MailFrom"]."{,}".
					$dados["MailTo"]."{,}".
					$dados["MailCc"]."{,}".
					$dados["bool_ativo_site"];
		} else {
			echo    "[]".
					$dados["ID_SITE"]."{,}".
					$dados["NOME_EMPRESA"]."{,}".
					$dados["NOME_CIDADE"]."{,}".
					$dados["ESTADO"]."{,}".
					$dados["FONE"]."{,}".
					$dados["FONE_APP"]."{,}".
					$dados["EMAIL"]."{,}".
					$dados["sendusername"]."{,}".
					$dados["sendpassword"]."{,}".
					$dados["smtpserver"]."{,}".
					$dados["smtpserverport"]."{,}".
					$dados["MailFrom"]."{,}".
					$dados["MailTo"]."{,}".
					$dados["MailCc"]."{,}".
					$dados["bool_ativo_site"];
		}
		$cont++;
	}
}

?>
