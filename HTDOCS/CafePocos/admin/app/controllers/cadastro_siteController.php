
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

	$smtpserverport = $_POST['smtpserverport'] == '' ? 0 : $_POST['smtpserverport'];
	$entidadeSite->set($smtpserverport, 'smtpserverport');

	$entidadeSite->set($_POST['MailFrom'], 'MailFrom');
	$entidadeSite->set($_POST['MailTo'], 'MailTo');
	$entidadeSite->set($_POST['MailCc'], 'MailCc');

	$bool_ativo_site = $_POST['bool_ativo_site'] == '' ? 0 : $_POST['bool_ativo_site'];
	$entidadeSite->set($bool_ativo_site, 'bool_ativo_site');


	$retorno = $siteDAO->cadastraSite($entidadeSite);
	echo $retorno;
?>
