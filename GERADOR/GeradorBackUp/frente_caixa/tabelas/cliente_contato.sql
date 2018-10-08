
-- Criar tabela cliente_contato
-- Gerando em: 01/08/2018 17:01:47
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `cliente_contato`;

CREATE TABLE IF NOT EXISTS `cliente_contato` (
	`id_cliente_contato` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`telefone_cliente_contato` varchar(100) NOT NULL ,
	`celular_cliente_contato` varchar(100)  ,
	`email_cliente_contato` varchar(100)  ,
	`cliente_id` int(11)  ,
	`data_atualizacao_cliente_contato` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_cliente_contato` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO cliente_contato ( `id_cliente_contato`, `telefone_cliente_contato`, `celular_cliente_contato`, `email_cliente_contato`, `cliente_id`, `data_atualizacao_cliente_contato`, `usuario_id`, `bool_ativo_cliente_contato`) VALUES ( 5, '123', '', '', 1, '2018-06-14 09:56:44', 1, 1);