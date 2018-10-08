<?php

       if (($sender_email == "") || ($sender_name == "") || ($sender_tel == "") || ($message == "")) { //recebe dados do form
                header("Location: contatos.swf"); //redireciona apos o envio
                exit;
       } 


       $recipient = "luisinho21@gmail.com"; //email recipiente
       $subject = "MENSAGEM DO SITE";      //assunto da mensagem, vc pde alterar este campo

       $mailheaders = "From: <$sender_email> \n"; //email recipiente, "nao altera"
       $mailheaders .= "Reply-To: <$sender_email>\n\n"; //email recipiente, "nao altera"

       $msg = "De: $sender_name\n"; //quem esta enviando
       $msg .= "Email: $sender_email\n"; //email do rementente
       $msg .= "Telefone: $sender_tel\n"; //telefone do rementente
       $msg .= "Messagem: $message\n\n"; //a mensagem do rementente

       mail($recipient, $subject, $msg, $mailheaders) or die ("Impossivel enviar email!"); //caso ouver erro ano envio "or die" ira aparecer a msg "impossivel enviar o email"

?>
<html>
<head>
<title>Contato</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="refresh" content="5;URL=index.html">
</head>
<body bgcolor="#ffffff">
<div align="center">
  <p class=h2 style11 style7 style8><font color="#0033CC" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Email 
    enviado com sucesso!</strong></font></p>
  <P class="style12"><font color="#0000CC" size="2" face="Verdana, Arial, Helvetica, sans-serif">Obrigado, 
    <?php echo "$sender_name"; ?>, por ter enviado
    esta mensagem:</font></p>
  <P class="style12"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo "$message"; ?></font></p>
</div>
</body>
</html>
