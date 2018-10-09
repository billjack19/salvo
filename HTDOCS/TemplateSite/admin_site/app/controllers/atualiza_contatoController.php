
<?php 
	require_once "../classe/entidade/Contato.php";
	require_once "../classe/dao/contatoDAO.php";

	$entidadeContato = new Contato();
	$contatoDAO = new contatoDAO();
	
	$entidadeContato->set($_POST['NOME_EMPRESA_contato'], 'NOME_EMPRESA_contato');
	$entidadeContato->set($_POST['NOME_CIDADE_contato'], 'NOME_CIDADE_contato');
	$entidadeContato->set($_POST['ESTADO_contato'], 'ESTADO_contato');
	$entidadeContato->set($_POST['FONE_contato'], 'FONE_contato');
	$entidadeContato->set($_POST['FONE_APP_contato'], 'FONE_APP_contato');
	$entidadeContato->set($_POST['EMAIL_contato'], 'EMAIL_contato');
	$entidadeContato->set($_POST['sendusername_contato'], 'sendusername_contato');
	$entidadeContato->set($_POST['sendpassword_contato'], 'sendpassword_contato');
	$entidadeContato->set($_POST['smtpserver_contato'], 'smtpserver_contato');
	$entidadeContato->set($_POST['smtpserverport_contato'], 'smtpserverport_contato');
	$entidadeContato->set($_POST['MailFrom_contato'], 'MailFrom_contato');
	$entidadeContato->set($_POST['MailTo_contato'], 'MailTo_contato');
	$entidadeContato->set($_POST['MailCc_contato'], 'MailCc_contato');
	$entidadeContato->set($_POST['data_atualizacao_contato'], 'data_atualizacao_contato');
	$entidadeContato->set($_POST['bool_ativo_contato'], 'bool_ativo_contato');

	$retorno = $contatoDAO->atualizaContato($entidadeContato, $_POST['id_contato']);
	echo $retorno;
?>
