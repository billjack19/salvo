
-- Criar tabela pedido_item
-- Gerando em: 01/08/2018 17:01:24
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `pedido_item`;

CREATE TABLE IF NOT EXISTS `pedido_item` (
	`id_pedido_item` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`item_id` int(11) NOT NULL ,
	`quantidade_pedido_item` float NOT NULL ,
	`valor_unitario_pedido_item` float NOT NULL ,
	`total_pedido_item` float NOT NULL ,
	`pedido_id` int(11) NOT NULL ,
	`supermercado_id` int(11) NOT NULL ,
	`data_atualizacao_pedido_item` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_pedido_item` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO pedido_item ( `id_pedido_item`, `item_id`, `quantidade_pedido_item`, `valor_unitario_pedido_item`, `total_pedido_item`, `pedido_id`, `supermercado_id`, `data_atualizacao_pedido_item`, `usuario_id`, `bool_ativo_pedido_item`) VALUES ( 1, 4, 13, 3.5, 45.5, 1, 3, '2018-07-30 15:57:57', 1, 1);