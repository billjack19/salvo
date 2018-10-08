
-- Criar tabela contato_site
-- Gerando em: 01/08/2018 16:50:25
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `contato_site`;

CREATE TABLE IF NOT EXISTS `contato_site` (
	`ID_CONTATO_SITE` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`DT_CONTATO` datetime  ,
	`NOME_CONTATO` varchar(500)  ,
	`EMAIL_CONTATO` varchar(500)  ,
	`TELEFONE_CONTATO` varchar(500)  ,
	`ASSUNTO_CONTATO` varchar(500) NOT NULL ,
	`MENSAGEM_CONTATO` varchar(4000)  ,
	`LOTEAMENTO_CONTATO` varchar(500)  ,
	`LOTE_CONTATO` varchar(500)  ,
	`DS_RETORNO` varchar(4000)  ,
	`DS_EMAIL_RETORNO` varchar(500) NOT NULL ,
	`DT_RETORNO` datetime NOT NULL ,
	`FLAG_RETORNO` int(1) NOT NULL ,
	`DataAtualizacao` datetime  ,
	`HoraAtualizacao` char(8)  ,
	`UsuarioAtualizacao` char(3)  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO contato_site ( `ID_CONTATO_SITE`, `DT_CONTATO`, `NOME_CONTATO`, `EMAIL_CONTATO`, `TELEFONE_CONTATO`, `ASSUNTO_CONTATO`, `MENSAGEM_CONTATO`, `LOTEAMENTO_CONTATO`, `LOTE_CONTATO`, `DS_RETORNO`, `DS_EMAIL_RETORNO`, `DT_RETORNO`, `FLAG_RETORNO`, `DataAtualizacao`, `HoraAtualizacao`, `UsuarioAtualizacao`) VALUES ( 1, '2017-11-30 16:06:29', 'Jack', 'jackbiller@hotmail.com', '9 9723-1080', 'teste', 'testes', '1', '11', '', '', '0000-00-00 00:00:00', 0, '', '', ''
);