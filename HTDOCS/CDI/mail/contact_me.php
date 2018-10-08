<?php

session_start();

// ferificação do contatos
if(	empty($_POST['name'])      ||
	empty($_POST['email'])     ||
	empty($_POST['phone'])     ||
	empty($_POST['message'])   ||
	!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
{

	echo "No arguments Provided!";
	return false;

} else {
	// Confuiguração de data para o horario de brasilia
	date_default_timezone_set("America/Sao_Paulo");


/***************************************************************************************************************************/
/* Iniciando conexão com o banco de dados */
/***************************************************************************************************************************/
require_once "../classe/entidade/Contato.php";
require_once "../classe/dao/contatoDAO.php";

$conn = new Conexao();
$pdo = $conn->Connect(); 


/***************************************************************************************************************************/
/* Configurações da tabela site */
/***************************************************************************************************************************/
$sql = "SELECT * FROM site ORDER BY ID_SITE DESC LIMIT 1;";
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





/***************************************************************************************************************************/
/* uploard do PDF */
/***************************************************************************************************************************/
// $uploardBool = false;
// $nome_final = "";
// $arquivo = $_FILES['arquivo']['name'];
// if ($arquivo != "") {
// 	//Pasta onde o arquivo vai ser salvo
// 	$_UP['pasta'] = '../upload/';
// 	//Tamanho máximo do arquivo em Bytes
// 	$_UP['tamanho'] = 1024*1024*1000; //50mb
// 	//Array com a extensões permitidas
// 	$_UP['extensoes'] = array('pdf');
// 	//Renomeiar
// 	// $_UP['renomeia'] = false;
// 	//Array com os tipos de erros de upload do PHP
// 	$_UP['erros'][0] = 'Não houve erro';
// 	$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
// 	$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
// 	$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
// 	$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
// 	//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
// 	if($_FILES['arquivo']['error'] != 0){
// 		// die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['arquivo']['error']]);
// 		//exit; //Para a execução do script
// 	}
// 	//Faz a verificação da extensao do arquivo
// 	$extensao = explode('.', tratarString($_FILES['arquivo']['name']));
// 	for ($i = sizeof($extensao) - 1; $i >= 0; $i--): $extensao = $extensao[$i]; $i = -1; endfor;

// 	if(array_search($extensao, $_UP['extensoes']) === false){}
// 	//Faz a verificação do tamanho do arquivo
// 	else if ($_UP['tamanho'] < $_FILES['arquivo']['size']){}
// 	//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
// 	else{
// 		$nome_final = $_FILES['arquivo']['name'];
// 		$nome_final = date('dmY_His').tratarString($nome_final);
// 		$img_fundo_nome = $nome_final;
		
// 		//Verificar se é possivel mover o arquivo para a pasta escolhida
// 		if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) 
// 			$uploardBool = true;
// 		else $uploardBool = false;
// 	}
// }




/***************************************************************************************************************************/
/* Montagem do E-mail */
/***************************************************************************************************************************/
	$Nome = $_POST['name'];
	$Email = $_POST['email'];
	$Telefone = $_POST['phone'];
	$Assunto = "Formulario de Contato - Site $NOME_EMPRESA";
	$Mensagem = $_POST['message'];

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
				<br><br>
				Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b>
			</div>
			<br><br><br>
			<img src='cid:1' width=\"200\">
		</html>"; // $ComplementoTable



/***************************************************************************************************************************/
/* Evia o E-mail pelo PHPMailer */
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
	$mail->AddAddress($MailTo, $Nome);
	$mail->AddCC($MailCc, $Nome); // Copia
	$mail->AddCC("cdi@cdiinfo.com.br", $Nome); // Copia
	$mail->AddCC("thiago@cdiinfo.com.br", $Nome); // Copia


	

	// Define os dados técnicos da Mensagem
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
	$mail->AddEmbeddedImage('../img/logo/logo.png', '1');
	$mail->CharSet = 'uft-8'; // Charset da mensagem (opcional)

	// Define a mensagem (Texto e Assunto)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->Subject  = "Contato pelo Site: ".$Assunto; // Assunto da mensagem
	$mail->Body = $arquivo;
	$mail->AltBody = "";
	$mail->AddBCC('jackmailteste@gmail.com', 'CDI ($NOME_EMPRESA)'); // Cópia Oculta

	// Define os anexos (opcional)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	// if ($uploardBool) {
		// $mail->AddAttachment("../upload/$nome_final", $nome_final);  // Insere um anexo
	// }

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
		echo "Não foi possível enviar o e-mail.";
		echo "<b>Informações do erro:</b> " . $mail->ErrorInfo;
	}



/***************************************************************************************************************************/
/*gravar contato no banco */
/***************************************************************************************************************************/
	$entidadeContato = new Contato();
	$contatoDAO = new contatoDAO();

	$entidadeContato->set($Nome, 'nome_contato');
	$entidadeContato->set($Email, 'email_contato');
	$entidadeContato->set($Telefone, 'telefone_contato');
	$entidadeContato->set($Assunto, 'assunto_contato');
	$entidadeContato->set($Mensagem, 'mensagem_contato');
	$entidadeContato->set(4, 'usuario_id');
	$entidadeContato->set(1, 'bool_ativo_contato');

	// $entidadeContato->set($Nome, 'NOME_CONTATO');
	// $entidadeContato->set($Email, 'EMAIL_CONTATO');
	// $entidadeContato->set($Telefone, 'TELEFONE_CONTATO');
	// $entidadeContato->set($Assunto, 'ASSUNTO_CONTATO');
	// $entidadeContato->set($Mensagem, 'MENSAGEM_CONTATO');
	// $entidadeContato->set(1, 'bool_ativo_contato');
	// $entidadeContato->set(date('Y-m-d').' '.(date('H')-3).date(':i:s'), 'DT_CONTATO');
	// $entidadeContato->set(date('Y-m-d H:i:s'), 'DT_CONTATO');

	$retorno = $contatoDAO->cadastraContato($entidadeContato);
	if ($retorno == 1 || $retorno == "1") 	$_SESSION['contatoValido'] = true;
	else 									$_SESSION['contatoInvalido'] = true;
	echo 1;
	header("Location: ../contato.php");
}


function tratarString($texto){
	$texto = str_replace(" ", "_", $texto);

	$texto = str_replace("ç", "c", $texto);
	$texto = str_replace("Ç", "C", $texto);

	$texto = str_replace("é", "e", $texto);
	$texto = str_replace("ê", "e", $texto);
	$texto = str_replace("è", "e", $texto);
	$texto = str_replace("É", "E", $texto);
	$texto = str_replace("Ê", "E", $texto);
	$texto = str_replace("È", "E", $texto);

	$texto = str_replace("â", "a", $texto);
	$texto = str_replace("á", "a", $texto);
	$texto = str_replace("à", "a", $texto);
	$texto = str_replace("ã", "a", $texto);
	$texto = str_replace("Â", "A", $texto);
	$texto = str_replace("Á", "A", $texto);
	$texto = str_replace("À", "A", $texto);
	$texto = str_replace("Ã", "A", $texto);

	$texto = str_replace("ô", "o", $texto);
	$texto = str_replace("ò", "o", $texto);
	$texto = str_replace("ó", "o", $texto);
	$texto = str_replace("õ", "o", $texto);
	$texto = str_replace("Ô", "O", $texto);
	$texto = str_replace("Ó", "O", $texto);
	$texto = str_replace("Ò", "O", $texto);
	$texto = str_replace("Õ", "O", $texto);

	$texto = str_replace("î", "i", $texto);
	$texto = str_replace("ì", "i", $texto);
	$texto = str_replace("í", "i", $texto);
	$texto = str_replace("Î", "I", $texto);
	$texto = str_replace("Ì", "I", $texto);
	$texto = str_replace("Í", "I", $texto);

	$texto = str_replace("û", "u", $texto);
	$texto = str_replace("ú", "u", $texto);
	$texto = str_replace("ù", "u", $texto);
	$texto = str_replace("Û", "U", $texto);
	$texto = str_replace("Ú", "U", $texto);
	$texto = str_replace("Ù", "U", $texto);

	$texto = str_replace("ñ", "n", $texto);
	$texto = str_replace("Ñ", "N", $texto);

	$texto = str_replace("=", "", $texto);

	return $texto;
}

?>