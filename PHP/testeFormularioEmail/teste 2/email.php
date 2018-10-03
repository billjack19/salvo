<?php
// ini_set('smtp_port',587);//465

$Nome		= $_POST["Nome"];		// Pega o valor do campo Nome
$Fone		= $_POST["Fone"];		// Pega o valor do campo Telefone
$Email		= $_POST["Email"];		// Pega o valor do campo Email
$Mensagem	= $_POST["Mensagem"];	// Pega os valores do campo Mensagem

// Variável que junta os valores acima e monta o corpo do email



// require_once("PHPMailer_5.2.4/class.phpmailer.php");
// require_once "PHPMailer-master/src/PHPMailer.php";
require_once "PHPMailer-master/vendor/autoload.php";

// define('GUSER', 'cdiinfo.suporte@gmail.com');	// <-- Insira aqui o seu GMail
// define('GPWD', 'cdiinfo!@#');		// <-- Insira aqui a senha do seu GMail

$GUSER 			= 'jackmailteste@gmail.com';
$GPWD 			= 'cdi!@#123';

$destinatario 	= "jackbiller19@gmail.com";
$remetente 		= "jackmailteste@gmail.com";
// $remetente 		= "cdiinfo.suporte@gmail.com";
$remetenteNome 	= "Jack";


$assuntoMail 	= "Email teste CDI via PHP - Jack";
$Vai 			= "	Nome: $Nome<br>
					E-mail: $Email<br>
					Telefone: $Fone<br>
					Mensagem: $Mensagem<br>";


function smtpmailer($emailUser, $pwsUser, $para, $de, $de_nome, $assunto, $corpo) { 
	global $error;
	$protocolo = "tls";
	$porta = 587;

	// Requiring TLS 1.0 or better when using file_get_contents():
	$ctx = stream_context_create([
	                'TLs' => [
	                    'verify_peer'      => false,
	                    'verify_peer_name' => false
	                ]
	            ]);

	$html = file_get_contents('https://google.com/', false, $ctx);

	// Requiring TLS 1.1 or 1.2:
	$ctx = stream_context_create([
	    'TLS' => [
	        'crypto_method' => STREAM_CRYPTO_METHOD_TLSv1_1_CLIENT |
	                           STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT,
	    ],
	]);
	$html = file_get_contents('https://google.com/', false, $ctx);

	// Connecting using the tlsv1.2:// stream socket transport.
	$sock = stream_socket_client('tlsv1.2://google.com:443/');

	var_dump(openssl_get_cert_locations());

	echo "<br><br><h2>Variaveis Globais PHP</h2><b>STREAM_CRYPTO_METHOD_TLS_CLIENT</b>: ".STREAM_CRYPTO_METHOD_TLS_CLIENT;
	echo "<br><b>PHP_OS:</b> ".PHP_OS;
	echo "<br><b>stripos(PHP_OS, 'WIN'):</b> ".stripos(PHP_OS, 'WIN');
	echo "<br><b>PHP_VERSION:</b> ".PHP_VERSION;
	echo "<br><br><br>";

	echo "<h2>Configuração do email</h2>";
	echo "<br> 	<b>emailUser</b>: " . 	$emailUser;
	echo "<br> 	<b>pwsUser</b>: " . 	$pwsUser;
	echo "<br> 	<b>para</b>: " . 		$para;
	echo "<br> 	<b>de</b>: " . 			$de;
	echo "<br> 	<b>de_nome</b>: " . 	$de_nome;
	echo "<br> 	<b>assunto</b>: " . 	$assunto;
	echo "<br> 	<b>corpo</b>: <br>" . 	$corpo;
	echo "<br><br><br>";
	echo "Protocolo: ".$protocolo."<br>";
	echo "Porta: ".$porta."<br><br>";

	// $mail = new PHPMailer();
	$mail = new PHPMailer\PHPMailer\PHPMailer();
	$mail->SetLanguage("br");
	// $mail->IsSMTP();		// Ativar SMTP
	$mail->Mailer = "smtp";
	$mail->SMTPDebug = 1;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
	$mail->Debugoutput = 'html';
	$mail->SMTPAutoTLS = false;
	$mail->SMTPAuth = true;		// Autenticação ativada
	$mail->SMTPSecure = $protocolo;	// SSL REQUERIDO pelo GMail
	$mail->Host = gethostbyname('smtp.gmail.com'); //'smtp.gmail.com';	// SMTP utilizado
	$mail->Port = $porta;  		// A porta 587 deverá estar aberta em seu servidor
	$mail->Username = $emailUser;
	$mail->Password = $pwsUser;
	$mail->SetFrom($de, $de_nome);
	$mail->Subject = $assunto;
	$mail->Body = $corpo;
	$mail->AddAddress($para);
	$mail->Hostname = 'localhost';

	$smtpConnect = $mail->Send();
	$localhost = "	localhost";
	$newLine = "::1";

	// fputs($smtpConnect, 'HELO '.$localhost . $newLine);


	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Mensagem enviada!';
		return true;
	}
}

// Insira abaixo o email que irá receber a mensagem, o email que irá enviar (o mesmo da variável GUSER), 
// o nome do email que envia a mensagem, o Assunto da mensagem e por último a variável com o corpo do email.

if (smtpmailer($GUSER, $GPWD, $destinatario, $remetente, $remetenteNome, $assuntoMail, $Vai)) {
	echo "OK";
	// Header("location:http://www.dominio.com.br/obrigado.html"); // Redireciona para uma página de obrigado.
}
if (!empty($error)) echo $error;
?>