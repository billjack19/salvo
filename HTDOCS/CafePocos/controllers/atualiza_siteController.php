
<?php 
	require_once "../classe/entidade/Site.php";
	require_once "../classe/dao/siteDAO.php";

	$entidadeSite = new Site();
	$siteDAO = new siteDAO();
	
	$entidadeSite->set($_POST['NOME_EMPRESA'], 'NOME_EMPRESA');
	$entidadeSite->set($_POST['NOME_CIDADE'], 'NOME_CIDADE');
	$entidadeSite->set($_POST['ESTADO'], 'ESTADO');
	$entidadeSite->set($_POST['FONE'], 'FONE');
	$entidadeSite->set($_POST['FONE_APP'], 'FONE_APP');
	$entidadeSite->set($_POST['EMAIL'], 'EMAIL');
	$entidadeSite->set($_POST['sendusername'], 'sendusername');
	$entidadeSite->set($_POST['sendpassword'], 'sendpassword');
	$entidadeSite->set($_POST['smtpserver'], 'smtpserver');
	$entidadeSite->set($_POST['smtpserverport'], 'smtpserverport');
	$entidadeSite->set($_POST['MailFrom'], 'MailFrom');
	$entidadeSite->set($_POST['MailTo'], 'MailTo');
	$entidadeSite->set($_POST['MailCc'], 'MailCc');

	$retorno = $siteDAO->atualizaSite($entidadeSite, $_POST['ID_SITE']);
	echo $retorno;
?>
