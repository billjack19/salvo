
-- Criar tabela item_orcamento
-- Gerando em: 01/08/2018 16:49:41
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `item_orcamento`;

CREATE TABLE IF NOT EXISTS `item_orcamento` (
	`id_item_orcamento` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`data_lanc_item_orcamento` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`orcamento_id` int(11) NOT NULL ,
	`item_id` int(11) NOT NULL ,
	`quantidade_item_orcamento` float NOT NULL ,
	`total_item_orcamento` float NOT NULL ,
	`bool_ativo_item_orcamento` int(1)  DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO item_orcamento ( `id_item_orcamento`, `data_lanc_item_orcamento`, `orcamento_id`, `item_id`, `quantidade_item_orcamento`, `total_item_orcamento`, `bool_ativo_item_orcamento`) VALUES ( 1, '2018-01-08 13:33:23', 1, 5, 10, 0, 1
);
INSERT INTO item_orcamento ( `id_item_orcamento`, `data_lanc_item_orcamento`, `orcamento_id`, `item_id`, `quantidade_item_orcamento`, `total_item_orcamento`, `bool_ativo_item_orcamento`) VALUES ( 2, '2018-01-11 17:56:32', 2, 4, 2, 20, 1
);
INSERT INTO item_orcamento ( `id_item_orcamento`, `data_lanc_item_orcamento`, `orcamento_id`, `item_id`, `quantidade_item_orcamento`, `total_item_orcamento`, `bool_ativo_item_orcamento`) VALUES ( 3, '2018-01-11 17:56:42', 2, 8, 13, 25, 1
);