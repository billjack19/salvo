
-- Criar tabela cliente
-- Gerando em: 01/08/2018 17:00:32
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
INSERT INTO cliente ( `id_cliente`, `nome_cliente`, `data_atualizacao_cliente`, `usuario_id`, `bool_ativo_cliente`) VALUES ( 1, 'Jack Biller', '2018-04-12 17:13:06', 1, 1);
INSERT INTO cliente ( `id_cliente`, `nome_cliente`, `data_atualizacao_cliente`, `usuario_id`, `bool_ativo_cliente`) VALUES ( 2, 'Cliente 2', '2018-04-12 17:15:23', 1, 1);
INSERT INTO cliente ( `id_cliente`, `nome_cliente`, `data_atualizacao_cliente`, `usuario_id`, `bool_ativo_cliente`) VALUES ( 3, 'Cliente 3', '2018-04-12 17:15:28', 1, 1);
INSERT INTO cliente ( `id_cliente`, `nome_cliente`, `data_atualizacao_cliente`, `usuario_id`, `bool_ativo_cliente`) VALUES ( 4, 'Cliente 4', '2018-04-12 17:15:35', 1, 1);