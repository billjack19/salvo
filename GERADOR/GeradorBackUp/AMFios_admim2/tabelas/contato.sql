
-- Criar tabela contato
-- Gerando em: 01/08/2018 16:51:33
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `contato`;

CREATE TABLE IF NOT EXISTS `contato` (
	`id_contato` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`DT_CONTATO` datetime(1)  DEFAULT CURRENT_TIMESTAMP(1) on update CURRENT_TIMESTAMP,
	`NOME_CONTATO` varchar(100)  ,
	`EMAIL_CONTATO` varchar(100)  ,
	`TELEFONE_CONTATO` varchar(100)  ,
	`ASSUNTO_CONTATO` varchar(200)  ,
	`MENSAGEM_CONTATO` text  ,
	`ARQUIVO_CONTATO` varchar(200)  ,
	`bool_ativo_contato` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro