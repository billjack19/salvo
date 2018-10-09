<?php
	/* contatoController .php */
	session_start();
	require_once "../classe/entidade/Contato.php";
	require_once "../classe/dao/contatoDAO.php";	


	$conn = new Conexao();
	$pdo = $conn->Connect(); 

	$sql = "SELECT * FROM site;";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$NOME_EMPRESA = 	$dados['NOME_EMPRESA'];
		$NOME_CIDADE = 		$dados['NOME_CIDADE'];
		$ESTADO = 			$dados['ESTADO'];
		$FONE = 			$dados['FONE'];
		$FONE_APP = 		$dados['FONE_APP'];
		$EMAIL = 			$dados['EMAIL'];
		$sendusername = 	$dados['sendusername'];
		$sendpassword = 	$dados['sendpassword'];
		$smtpserver = 		$dados['smtpserver'];
		$smtpserverport = 	$dados['smtpserverport'];
		$MailFrom = 		$dados['MailFrom'];
		$MailTo = 			$dados['MailTo'];
		$MailCc = 			$dados['MailCc'];
	}



	$Nome = $_POST['Nome'];
	$Email = $_POST['Email'];
	$Telefone = $_POST['Telefone'];
	$Assunto = $_POST['Assunto'];
	$Mensagem = $_POST['Mensagem'];
	date_default_timezone_set("America/Sao_Paulo");
	$data_envio = date('d/m/Y');
	$hora_envio = date('H:i:s');

	// Compo E-mail
	$arquivo = "
		<style type='text/css'>
			body {
				margin:0px;
				font-family:Verdane;
				font-size:12px;
				color: #444;
			}
			a{
				color: #666666;
				text-decoration: none;
			}
			a:hover {
				color: #FF0000;
				text-decoration: none;
			}
			h2 {
				font-size:20px;
			}
		</style>
		<html>
			<h2>Formulario de Contato</h2>
			<div style=\"font-size: 20px;\">
				<b>Nome:</b>&nbsp;&nbsp;$Nome
				<br>
				<b>E-mail:</b>&nbsp;$Email
				<br>
				<b>Telefone:</b>&nbsp;$Telefone
				<br>
				<b>Assunto:</b>&nbsp;$Assunto
				<br>
				<b>Mensagem:</b>&nbsp;$Mensagem
				<br>
				
				<br><br>
				Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b>
			</div>
			<br><br><br>
			<img src='cid:1' width=\"200\">
		</html>";


/***************************************************************************************************************************/
/* teste com PHPMailer */
/***************************************************************************************************************************/
	require_once "../lb/PHPMailer-master/vendor/autoload.php";

	// Inicia a classe PHPMailer
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail = new PHPMailer\PHPMailer\PHPMailer();

	// Define os dados do servidor e tipo de conexão
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->IsSMTP(); // Define que a mensagem será SMTP
	$mail->SMTPDebug = 0;
	$mail->Host = $smtpserver; //"mail.cdiinfo.com.br"; // Endereço do servidor SMTP // $mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
	$mail->Username = $sendusername; //'thiago@cdiinfo.com.br'; // Usuário do servidor SMTP // $mail->Username = 'cdiinfo.suporte@gmail.com';
	$mail->Password = $sendpassword; //'Cdidesenv03@'; // Senha do servidor SMTP // $mail->Password = 'cdiinfo!@#';
	$mail->Port = $smtpserverport;
	$mail->SMTPAutoTLS = false;
	$mail->SMTPSecure = "";
	
	// Define o remetente
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->From = $MailFrom; //"thiago@cdiinfo.com.br"; // Seu e-mail
	$mail->FromName = "CDI"; // Seu nome
	
	// Define os destinatário(s)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	// $mail->AddAddress("jackbiller19@gmail.com", $Nome);
	$mail->AddAddress($MailTo, $Nome);
	$mail->AddCC($MailCc, $Nome); // Copia
	
	$mail->AddBCC('jackmailteste@gmail.com', 'Thigo CDI (Format - Teste)'); // Cópia Oculta
	
	// Define os dados técnicos da Mensagem
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
	$mail->AddEmbeddedImage('../img/Logotipo.jpg', '1');
	$mail->CharSet = 'uft-8'; // Charset da mensagem (opcional)
	
	// Define a mensagem (Texto e Assunto)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->Subject  = "Contato pelo Site: ".$Assunto; // Assunto da mensagem
	$mail->Body = $arquivo;
	$mail->AltBody = "";
	
	// Define os anexos (opcional)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	//$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo
	
	// Envia o e-mail
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$enviado = $mail->Send();
	
	// Limpa os destinatários e os anexos
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();

	// Exibe uma mensagem de resultado
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	if ($enviado) {
		$emailEnviado = true;
		// echo "E-mail enviado com sucesso!";
	} else {
		$emailEnviado = false;
		// echo "Não foi possível enviar o e-mail.";
		// echo "<b>Informações do erro:</b> " . $mail->ErrorInfo;
	}



/***************************************************************************************************************************/
/* gravar contato no banco */
/***************************************************************************************************************************/
	$entidadeContato = new Contato();
	$contatoDAO = new contatoDAO();

	$entidadeContato->set($Nome, 'NOME_CONTATO');
	$entidadeContato->set($Email, 'EMAIL_CONTATO');
	$entidadeContato->set($Telefone, 'TELEFONE_CONTATO');
	$entidadeContato->set($Assunto, 'ASSUNTO_CONTATO');
	$entidadeContato->set($Mensagem, 'MENSAGEM_CONTATO');
	$entidadeContato->set(date('Y-m-d H:i:s'), 'DT_CONTATO');

	$retorno = $contatoDAO->cadastraContato($entidadeContato);


	header("Location: ../../index.php");
?>