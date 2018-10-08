
-- Criar tabela site
-- Gerando em: 01/08/2018 16:50:27
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `site`;

CREATE TABLE IF NOT EXISTS `site` (
	`ID_SITE` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`NOME_EMPRESA` varchar(100) NOT NULL ,
	`NOME_CIDADE` varchar(100) NOT NULL ,
	`ESTADO` char(2) NOT NULL ,
	`FONE` varchar(14) NOT NULL ,
	`FONE_APP` varchar(14)  ,
	`EMAIL` varchar(100) NOT NULL ,
	`sendusername` varchar(225) NOT NULL ,
	`sendpassword` varchar(225) NOT NULL ,
	`smtpserver` varchar(225) NOT NULL ,
	`smtpserverport` int(11) NOT NULL ,
	`MailFrom` varchar(225) NOT NULL ,
	`MailTo` varchar(225) NOT NULL ,
	`MailCc` varchar(225) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO site ( `ID_SITE`, `NOME_EMPRESA`, `NOME_CIDADE`, `ESTADO`, `FONE`, `FONE_APP`, `EMAIL`, `sendusername`, `sendpassword`, `smtpserver`, `smtpserverport`, `MailFrom`, `MailTo`, `MailCc`) VALUES ( 1, 'Contrutora Brothers', 'Poços de Caldas', 'MG', '35 3721-5667', '', 'cdi@cdiinfo.com.br', 'cdiinfo.suporte@gmail.com', 'cdiinfo!@#', 'smtp.gmail.com', 465, 'cdiinfo.suporte@gmail.com', 'thiago.cdi@Hotmail.com', 'cdiinfo.suporte@gmail.com'
);