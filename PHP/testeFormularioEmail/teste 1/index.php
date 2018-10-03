<?php
 
/* apenas dispara o envio do formulário caso exista $_POST['enviarFormulario']*/
 // 
if (isset($_POST['enviarFormulario'])){
 
 
/*** INÍCIO - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/
 
$enviaFormularioParaNome = "Jack Biller";
$enviaFormularioParaEmail = 'jackbiller19@gmail.com';
 
$caixaPostalServidorNome = 'smtp.gmail.com';
$caixaPostalServidorEmail = 'cdiinfo.suporte@gmail.com';
$caixaPostalServidorSenha = 'cdiinfo!@#';
 
/*** FIM - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/ 
 
 
/* abaixo as veriaveis principais, que devem conter em seu formulario*/
 
//Dados do formulário
$Nome = $_POST["remetenteNome"]; 
$Assunto = $_POST["assunto"]; 
// $Fone = $_POST["Fone"];
$Email = $_POST["remetenteEmail"]; 
$Mensagem = $_POST["mensagem"]; 
//Monta a mensagem que será enviada
$body = "  	Nome: $Nome <br/>
			E-mail: $Email<br/>
			Mensagem: $Mensagem ";
//Credenciais
$username = "cdiinfo.suporte@gmail.com";
$password = "cdiinfo!@#";
$remetente = array("CDI", "cdiinfo.suporte@gmail.com");
$destinatario = "jackbiller19@gmail.com";
//Instancia a classe
require_once('PHPMailer/class.phpmailer.php');
// phpmailer.phprequire("PHPMailer/class.phpmailer.php");
$mail = new PHPMailer();
$mail->SetLanguage("br");
$mail->isSMTP();
$mail->SMTPAuth  	= true;
$mail->Port     	= 587;
$mail->Host     	= "smtp.gmail.com";
$mail->SMTPSecure 	= "tls";
$mail->Username  	= $username;
$mail->Password		= $password;
$mail->SetFrom($remetente[1], $remetente[0]);
// $mail->FromName  	= $remetente[0];
// $mail->From			= $remetente[1];
$mail->Subject 	 	= $Assunto;
$mail->Body			= $body;
$mail->AddAddress($destinatario);
if ($mail->send()):	
	$mensagemRetorno = "<center>Ok! Mensagem Enviada com Sucesso</center>";
else:
	$mensagemRetorno = "Erro: Não foi possível enviar a mensagem.<br> $mail->ErrorInfo ";
endif;



// $remetenteNome  = $_POST['remetenteNome'];
// // echo "remetenteNome: ".$_POST['remetenteNome'];
// $remetenteEmail = $_POST['remetenteEmail'];
// // echo "remetenteEmail: ".$_POST['remetenteEmail'];
// $assunto  = $_POST['assunto'];
// // echo "assunto: ".$_POST['assunto'];
// $mensagem = $_POST['mensagem'];
// // echo "mensagem: ".$_POST['mensagem'];
//  // $remetenteNome = "Jack";
//  // $remetenteEmail = "jackbiller19@gmail.com";
//  // $assunto = "teste";
//  // $mensagem = "teste";

// $mensagemConcatenada = 'Formulário gerado via website'.'<br/>'; 
// $mensagemConcatenada .= '-------------------------------<br/><br/>'; 
// $mensagemConcatenada .= 'Nome: '.$remetenteNome.'<br/>'; 
// $mensagemConcatenada .= 'E-mail: '.$remetenteEmail.'<br/>'; 
// $mensagemConcatenada .= 'Assunto: '.$assunto.'<br/>';
// $mensagemConcatenada .= '-------------------------------<br/><br/>'; 
// $mensagemConcatenada .= 'Mensagem: "'.$mensagem.'"<br/>';
 
 
/*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/ 
 
// require_once('PHPMailer/class.phpmailer.php');
 
// $mail = new PHPMailer();
 
// $mail->IsSMTP();
// $mail->SMTPDebug = false; // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
// $mail->SMTPAuth  = true; // Ativar SMTP
// $mail->SMTPSecure = 'ssl'; //tls
// $mail->Host  = 'smtp.gmail.com';
// $mail->Port  = 465;
// $mail->Username  = 'cdiinfo.suporte@gmail.com';
// $mail->Password  = 'cdiinfo!@#';

// $mail->SetFrom('cdiinfo.suporte@gmail.com','CDI');

// $mail->AddAddress('jackbiller19@gmail.com');
// // $mail->AddBCC('jackbiller19@gmail.com'); 

// $mail->Subject=($assunto);
// $mail->msgHTML($mensagemConcatenada);
// // $mail->IsHTML(true);
// // $mail->CharSet = 'UTF-8';
// // $mail->Subject  = $assunto;
// // $mail->Body  = $mensagemConcatenada;
// // $mail->From  = $caixaPostalServidorEmail;
// // $mail->FromName  = utf8_decode($caixaPostalServidorNome);
 
 
// // $mail->AddAddress($enviaFormularioParaEmail,utf8_decode($enviaFormularioParaNome));
 
// if(!$mail->Send()){
// $mensagemRetorno = 'Erro ao enviar formulário: '. print($mail->ErrorInfo);
// }else{
// $mensagemRetorno = 'Formulário enviado com sucesso!';
// } 
 
 
}
?>
 
 
 
<!DOCTYPE html>
<html lang="pt-BR">
 
<head>
    <meta charset="utf-8">
<title>Formulário Exemplo Autenticado</title>
 
 
</head>
 
<body>
 
<?php
if(isset($mensagemRetorno)){
	echo $mensagemRetorno;
}
 
?>
 
<form method="POST" action="" style="width:300px;">
<input type="text" name="remetenteNome" placeholder="Nome completo" style="float:left;margin:10px;">
<input type="text" name="remetenteEmail" placeholder="Email" style="float:left;margin:10px;">
<input type="text" name="assunto" placeholder="Assunto" style="float:left;margin:10px;">
<textarea name="mensagem" placeholder="Mensagem" style="float:left;margin:10px;height:100px;width:200px;"></textarea>
<input type="submit" value="enviar" name="enviarFormulario" style="float:left;margin:10px;">
</form>
 
</body>
</html>