
-- Criar tabela orcamento_item
-- Gerando em: 01/08/2018 17:01:23
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `orcamento_item`;

CREATE TABLE IF NOT EXISTS `orcamento_item` (
	`id_orcamento_item` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`supermercado_id` int(11) NOT NULL ,
	`item_id` int(11) NOT NULL ,
	`marca_id` int(11)  ,
	`quantidade_orcamento_item` float NOT NULL ,
	`preco_orcamento_item` float NOT NULL ,
	`total_orcamento_item` float NOT NULL ,
	`orcamento_id` int(11)  ,
	`data_atualizacao_orcamento_item` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_orcamento_item` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO orcamento_item ( `id_orcamento_item`, `supermercado_id`, `item_id`, `marca_id`, `quantidade_orcamento_item`, `preco_orcamento_item`, `total_orcamento_item`, `orcamento_id`, `data_atualizacao_orcamento_item`, `usuario_id`, `bool_ativo_orcamento_item`) VALUES ( 4, 1, 1, 1, 12, 2.6, 31.2, 1, '2018-05-21 14:59:20', 1, 1);
INSERT INTO orcamento_item ( `id_orcamento_item`, `supermercado_id`, `item_id`, `marca_id`, `quantidade_orcamento_item`, `preco_orcamento_item`, `total_orcamento_item`, `orcamento_id`, `data_atualizacao_orcamento_item`, `usuario_id`, `bool_ativo_orcamento_item`) VALUES ( 5, 2, 2, 3, 1, 5.6, 5.6, 1, '2018-05-21 14:59:38', 1, 1);