
-- Criar tabela site
-- Gerando em: 01/08/2018 16:54:51
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `site`;

CREATE TABLE IF NOT EXISTS `site` (
	`ID_SITE` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`NOME_EMPRESA` varchar(100)  ,
	`NOME_CIDADE` varchar(100)  ,
	`ESTADO` char(2)  ,
	`FONE` varchar(14)  ,
	`FONE_APP` varchar(14)  ,
	`EMAIL` varchar(100)  ,
	`sendusername` varchar(255)  ,
	`sendpassword` varchar(255)  ,
	`smtpserver` varchar(255)  ,
	`smtpserverport` int(11)  ,
	`MailFrom` varchar(255)  ,
	`MailTo` varchar(255)  ,
	`MailCc` varchar(255)  ,
	`bool_ativo_site` int(1)  DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO site ( `ID_SITE`, `NOME_EMPRESA`, `NOME_CIDADE`, `ESTADO`, `FONE`, `FONE_APP`, `EMAIL`, `sendusername`, `sendpassword`, `smtpserver`, `smtpserverport`, `MailFrom`, `MailTo`, `MailCc`, `bool_ativo_site`) VALUES ( 1, 'Minas System', 'Poços de Caldas', 'MG', '(35) 3712-6037', '', 'cdi@cdiinfo.com.br', 'thiago@cdiinfo.com.br', 'Cdidesenv03@', 'mail.cdiinfo.com.br', 465, 'thiago@cdiinfo.com.br', 'thiago.cdi@Hotmail.com', 'cdiinfo.suporte@gmail.com', 1
);