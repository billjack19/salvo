
-- Criar tabela contato
-- Gerando em: 02/08/2018 10:24:54
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `contato`;

CREATE TABLE IF NOT EXISTS `contato` (
	`id_contato` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`nome_contato` varchar(200) NOT NULL ,
	`email_contato` varchar(200)  ,
	`telefone_contato` varchar(200)  ,
	`assunto_contato` varchar(200)  ,
	`mensagem_contato` text  ,
	`usuario_id` int(11) NOT NULL ,
	`data_atualizacao_contato` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_contato` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;