<?php
session_start();
require_once "../classe/entidade/Contato.php";
require_once "../classe/dao/contatoDAO.php";	
require_once "../controllers/funcoes.php";

if (!empty($_POST['rf'])) {
	$email = "Sem Registro";
	$loginPost = $_POST['rf'];

	$conn = new Conexao();
	$pdo = $conn->Connect();

	$sql = "SELECT cliefornec_telefone.EMail
			FROM cliefornec_telefone 
			INNER JOIN cliefornec ON cliefornec_telefone.Cliente = cliefornec.codigo
			WHERE cliefornec.CPF_CGC = '$loginPost'
			LIMIT 1;";
	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$email = $dados[0];
	}
	$email = $email == "" ? "Sem Registro" : $email;
	echo $email;
} else if (
		!empty($_POST['login']) 
	&& 	!empty($_POST['telaLogada']) 
	&& 	!empty($_POST['email']) 
	&& 	$_POST['email'] != "" 
	&& 	$_POST['email'] != "Sem Registro"
)
{
	$loginPost = $_POST['login'];
	$email = $_POST['email'];
	$telaLogada = $_POST['telaLogada'];

	$senha = "";
	$nome = "";

	$conn = new Conexao();
	$pdo = $conn->Connect(); 

	// dados do site para enviar email
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

	// redefinir a senha
	$sql = "UPDATE cliefornec 
			SET WEB_SENHA_CNPJ = concat(Cpf_cgc,\"\",\"14122017\")
			WHERE CPF_CGC = '$loginPost'";

	$verifica = $pdo->prepare($sql);
	$result = $verifica->execute();


	$sql = "SELECT WEB_SENHA_CNPJ, RAZAOSOCIAL
			FROM cliefornec 
			WHERE CPF_CGC = '$loginPost'";

	$verifica = $pdo->query($sql);
	foreach ($verifica as $dados) {
		$senha = $dados[0];
		$nome = $dados[1];
	}

	date_default_timezone_set("America/Sao_Paulo");
	$data_envio = date('d/m/Y');
	$hora_envio = date('H:i:s');
	$arrayHora = explode(":", $hora_envio);

	$saudacao = $arrayHora[0] > 00 && $arrayHora[0] < 12 ? $saudacao = "Bom Dia!" :
				$arrayHora[0] > 12 && $arrayHora[0] < 18 ? $saudacao = "Boa Tarde!" : $saudacao = "Boa Noite!";

	/*if ($arrayHora[0] > 00 && $arrayHora[0] < 12) {
		$saudacao = "Bom Dia!";
	} else if ($arrayHora[0] > 12 && $arrayHora[0] < 18) {
		$saudacao = "Boa Tarde!";
	} else {
		$saudacao = "Boa Noite!";
	}*/


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
			<h2>Esqueci Minha Senha</h2>
			<div style=\"font-size: 20px;\">
				$saudacao
				<br>Prezado(a) Senhor(a) $nome
				<br><br>
				<b>Sua senha foi redefinida para:</b>&nbsp;&nbsp;$senha
				<br><br><br>
				Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b>
			</div>
			<br><br><br>
			<img src='cid:1' width=\"200\">
		</html>";


/***************************************************************************************************************************/
/* teste com PHPMailer */
/***************************************************************************************************************************/
		require_once "PHPMailer-master/vendor/autoload.php";

		// Inicia a classe PHPMailer
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail = new PHPMailer\PHPMailer\PHPMailer();

		// Define os dados do servidor e tipo de conexão
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->IsSMTP(); // Define que a mensagem será SMTP
		$mail->SMTPDebug = 0;
		$mail->Host = $smtpserver; // Endereço do servidor SMTP // $mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
		$mail->Username = $sendusername; // Usuário do servidor SMTP // $mail->Username = 'cdiinfo.suporte@gmail.com';
		$mail->Password = $sendpassword; // Senha do servidor SMTP // $mail->Password = 'cdiinfo!@#';
		$mail->Port = $smtpserverport;
		$mail->SMTPAutoTLS = false;
		$mail->SMTPSecure = "";
		
		// Define o remetente
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->From = $MailFrom; // Seu e-mail
		$mail->FromName = "CDI - $NOME_EMPRESA"; // Seu nome


		// Define os destinatário(s)
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		// $mail->AddAddress("jackbiller19@gmail.com", $Nome);
		
		$mail->AddAddress($email, $NOME_EMPRESA);
		/* $mail->AddAddress($MailTo, $Nome); */
		$mail->AddCC($MailCc, $NOME_EMPRESA); // Copia
		$mail->AddBCC('jackmailteste@gmail.com', 'CDI ($NOME_EMPRESA - Esqueci Minha Senha)'); // Cópia Oculta


		// Define os dados técnicos da Mensagem
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
		$mail->AddEmbeddedImage('../img/logo/logo.png', '1');
		$mail->CharSet = 'uft-8'; // Charset da mensagem (opcional)
		
		// Define a mensagem (Texto e Assunto)
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->Subject  = "Esqueci Senha "; // Assunto da mensagem
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
			$_SESSION['esqueciValido'] = true;
		} else {
			$_SESSION['esqueciInvalido'] = true;
		}
	echo "Um E-mail com a nova senha foi enviado. Verifique sua caixa de E-mail ($email).";
	// header("Location: ../".$telaLogada.".php");
}
?>