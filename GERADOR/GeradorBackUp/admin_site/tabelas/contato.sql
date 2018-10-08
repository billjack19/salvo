
-- Criar tabela contato
-- Gerando em: 01/08/2018 16:52:44
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `contato`;

CREATE TABLE IF NOT EXISTS `contato` (
	`id_contato` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`NOME_EMPRESA_contato` varchar(100)  ,
	`NOME_CIDADE_contato` varchar(100)  ,
	`ESTADO_contato` char(2)  ,
	`FONE_contato` varchar(14)  ,
	`FONE_APP_contato` varchar(14)  ,
	`EMAIL_contato` varchar(100)  ,
	`sendusername_contato` varchar(255)  ,
	`sendpassword_contato` varchar(255)  ,
	`smtpserver_contato` varchar(255)  ,
	`smtpserverport_contato` int(11)  ,
	`MailFrom_contato` varchar(255)  ,
	`MailTo_contato` varchar(255)  ,
	`MailCc_contato` varchar(255)  ,
	`data_atualizacao_contato` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_contato` int(1)  DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO contato ( `id_contato`, `NOME_EMPRESA_contato`, `NOME_CIDADE_contato`, `ESTADO_contato`, `FONE_contato`, `FONE_APP_contato`, `EMAIL_contato`, `sendusername_contato`, `sendpassword_contato`, `smtpserver_contato`, `smtpserverport_contato`, `MailFrom_contato`, `MailTo_contato`, `MailCc_contato`, `data_atualizacao_contato`, `bool_ativo_contato`) VALUES ( 1, 'Site Template', 'Poços de Caldas', 'MG', '35 3722-0808', '', 'cdi@cdiinfo.com.br', 'thiago@cdiinfo.com.br', 'Cdidesenv03@', 'mail.cdiinfo.com.br', 465, 'thiago@cdiinfo.com.br', 'thiago.cdi@Hotmail.com', 'cdiinfo.suporte@gmail.com', '2018-01-06 09:12:20', 1
);