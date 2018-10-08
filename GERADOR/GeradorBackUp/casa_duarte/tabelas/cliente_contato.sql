
-- Criar tabela cliente_contato
-- Gerando em: 01/08/2018 17:00:32
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `cliente_contato`;

CREATE TABLE IF NOT EXISTS `cliente_contato` (
	`id_cliente_contato` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`telefone_cliente_contato` varchar(200) NOT NULL ,
	`cliente_id` int(200) NOT NULL ,
	`data_atualizacao_cliente_contato` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_cliente_contato` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO cliente_contato ( `id_cliente_contato`, `telefone_cliente_contato`, `cliente_id`, `data_atualizacao_cliente_contato`, `usuario_id`, `bool_ativo_cliente_contato`) VALUES ( 1, '9999-9999', 1, '2018-04-12 17:14:57', 1, 1);
INSERT INTO cliente_contato ( `id_cliente_contato`, `telefone_cliente_contato`, `cliente_id`, `data_atualizacao_cliente_contato`, `usuario_id`, `bool_ativo_cliente_contato`) VALUES ( 2, '9991-9991', 1, '2018-04-12 17:15:10', 1, 1);
INSERT INTO cliente_contato ( `id_cliente_contato`, `telefone_cliente_contato`, `cliente_id`, `data_atualizacao_cliente_contato`, `usuario_id`, `bool_ativo_cliente_contato`) VALUES ( 3, '9999-9999', 2, '2018-04-12 17:16:06', 1, 1);
INSERT INTO cliente_contato ( `id_cliente_contato`, `telefone_cliente_contato`, `cliente_id`, `data_atualizacao_cliente_contato`, `usuario_id`, `bool_ativo_cliente_contato`) VALUES ( 4, '9999-9999', 3, '2018-04-12 17:16:17', 1, 1);
INSERT INTO cliente_contato ( `id_cliente_contato`, `telefone_cliente_contato`, `cliente_id`, `data_atualizacao_cliente_contato`, `usuario_id`, `bool_ativo_cliente_contato`) VALUES ( 5, '9999-9999', 4, '2018-04-12 17:16:27', 1, 1);