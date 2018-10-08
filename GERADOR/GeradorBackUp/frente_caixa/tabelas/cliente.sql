
-- Criar tabela cliente
-- Gerando em: 01/08/2018 17:01:47
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE IF NOT EXISTS `cliente` (
	`id_cliente` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`nome_cliente` varchar(200) NOT NULL ,
	`data_atualizacao_cliente` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_cliente` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO cliente ( `id_cliente`, `nome_cliente`, `data_atualizacao_cliente`, `usuario_id`, `bool_ativo_cliente`) VALUES ( 1, 'Jack', '2018-06-14 09:43:48', 1, 1);
INSERT INTO cliente ( `id_cliente`, `nome_cliente`, `data_atualizacao_cliente`, `usuario_id`, `bool_ativo_cliente`) VALUES ( 2, 'Ana', '2018-06-14 09:43:57', 1, 1);
INSERT INTO cliente ( `id_cliente`, `nome_cliente`, `data_atualizacao_cliente`, `usuario_id`, `bool_ativo_cliente`) VALUES ( 3, 'João', '2018-06-14 09:44:04', 1, 1);
INSERT INTO cliente ( `id_cliente`, `nome_cliente`, `data_atualizacao_cliente`, `usuario_id`, `bool_ativo_cliente`) VALUES ( 4, 'Maria', '2018-06-14 09:44:15', 1, 1);