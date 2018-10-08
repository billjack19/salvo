
-- Criar tabela compra_item
-- Gerando em: 01/08/2018 17:01:21
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `compra_item`;

CREATE TABLE IF NOT EXISTS `compra_item` (
	`id_compra_item` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_compra_item` varchar(100)  ,
	`item_id` int(11)  ,
	`quantidade_compra_item` float NOT NULL ,
	`valor_unitario_compra_item` float NOT NULL ,
	`total_compra_item` float NOT NULL ,
	`compra_id` int(11) NOT NULL ,
	`data_atualizacao_compra_item` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_compra_item` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO compra_item ( `id_compra_item`, `descricao_compra_item`, `item_id`, `quantidade_compra_item`, `valor_unitario_compra_item`, `total_compra_item`, `compra_id`, `data_atualizacao_compra_item`, `usuario_id`, `bool_ativo_compra_item`) VALUES ( 1, '', 4, 12, 3.5, 42, 1, '2018-07-30 15:29:46', 1, 1);