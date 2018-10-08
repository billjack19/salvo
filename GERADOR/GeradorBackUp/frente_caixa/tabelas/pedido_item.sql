
-- Criar tabela pedido_item
-- Gerando em: 01/08/2018 17:01:49
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `pedido_item`;

CREATE TABLE IF NOT EXISTS `pedido_item` (
	`id_pedido_item` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`quantidade_pedido_item` float NOT NULL ,
	`valor_unitario_pedido_item` float NOT NULL ,
	`valor_total_pedido_item` float NOT NULL ,
	`item_id` int(100)  ,
	`item_unidade_medida_id` int(100)  ,
	`pedido_id` int(100)  ,
	`data_atualizacao_pedido_item` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_pedido_item` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro