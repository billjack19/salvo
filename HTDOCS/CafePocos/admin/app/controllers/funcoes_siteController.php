
<?php
require_once "../classe/conexao.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


if (!empty($_POST['pequisa_site'])) {
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$cont = 1;
	$sql = "	SELECT site.* 
				FROM site site  
				WHERE NOME_EMPRESA LIKE '%$filtro%'
				OR NOME_CIDADE LIKE '%$filtro%'
				OR ESTADO LIKE '%$filtro%'
				OR FONE LIKE '%$filtro%'
				OR FONE_APP LIKE '%$filtro%'
				OR EMAIL LIKE '%$filtro%'
				OR sendusername LIKE '%$filtro%'
				OR sendpassword LIKE '%$filtro%'
				OR smtpserver LIKE '%$filtro%'
				OR smtpserverport LIKE '%$filtro%'
				OR MailFrom LIKE '%$filtro%'
				OR MailTo LIKE '%$filtro%'
				OR MailCc LIKE '%$filtro%'
				OR bool_ativo_site LIKE '%$filtro%'
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
				FROM site site
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
	$filtro = "";
	if (!empty($_POST['filtro'])) {
		$filtro = $_POST['filtro'];
	}
	$coluna = $_POST['tabela']."_id";
	$id = $_POST['id'];
	$cont = 1;
	$sql = "	SELECT site.* 
				FROM site site 
				WHERE $coluna = $id 
				AND (
					   NOME_EMPRESA LIKE '%$filtro%'
					OR NOME_CIDADE LIKE '%$filtro%'
					OR ESTADO LIKE '%$filtro%'
					OR FONE LIKE '%$filtro%'
					OR FONE_APP LIKE '%$filtro%'
					OR EMAIL LIKE '%$filtro%'
					OR sendusername LIKE '%$filtro%'
					OR sendpassword LIKE '%$filtro%'
					OR smtpserver LIKE '%$filtro%'
					OR smtpserverport LIKE '%$filtro%'
					OR MailFrom LIKE '%$filtro%'
					OR MailTo LIKE '%$filtro%'
					OR MailCc LIKE '%$filtro%'
					OR bool_ativo_site LIKE '%$filtro%'
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
