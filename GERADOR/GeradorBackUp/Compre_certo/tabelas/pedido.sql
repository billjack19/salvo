
-- Criar tabela pedido
-- Gerando em: 01/08/2018 17:01:24
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `pedido`;

CREATE TABLE IF NOT EXISTS `pedido` (
	`id_pedido` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`total_pedido` float NOT NULL DEFAULT 0 ,
	`data_atualizacao_pedido` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_pedido` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO pedido ( `id_pedido`, `total_pedido`, `data_atualizacao_pedido`, `usuario_id`, `bool_ativo_pedido`) VALUES ( 1, 0, '2018-07-30 15:29:10', 1, 1);