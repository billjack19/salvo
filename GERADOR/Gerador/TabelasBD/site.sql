

CREATE TABLE IF NOT EXISTS `site` (
  `ID_SITE` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `NOME_EMPRESA` varchar(100) DEFAULT NULL,
  `NOME_CIDADE` varchar(100) DEFAULT NULL,
  `ESTADO` char(2) DEFAULT NULL,
  `FONE` varchar(14) DEFAULT NULL,
  `FONE_APP` varchar(14) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `sendusername` varchar(255) DEFAULT NULL,
  `sendpassword` varchar(255) DEFAULT NULL,
  `smtpserver` varchar(255) DEFAULT NULL,
  `smtpserverport` int(11) DEFAULT NULL,
  `MailFrom` varchar(255) DEFAULT NULL,
  `MailTo` varchar(255) DEFAULT NULL,
  `MailCc` varchar(255) DEFAULT NULL,
  `bool_ativo_site` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `site` 
(
  `NOME_EMPRESA`, 
  `NOME_CIDADE`, 
  `ESTADO`, 
  `FONE`, 
  `FONE_APP`, 
  `EMAIL`, 

  `sendusername`, 
  `sendpassword`, 
  `smtpserver`, 
  `smtpserverport`, 
  `MailFrom`, 
  `MailTo`, 
  `MailCc`, 
  `bool_ativo_site`
) VALUES (
  '', 
  'Poços de Caldas', 
  'MG', 
  '', 
  '', 
  'cdi@cdiinfo.com.br', 

  'thiago@cdiinfo.com.br', 
  'Cdidesenv03@', 
  'mail.cdiinfo.com.br', 
  465, 
  'thiago@cdiinfo.com.br', 
  'thiago.cdi@Hotmail.com', 
  'cdiinfo.suporte@gmail.com', 
  1
);
