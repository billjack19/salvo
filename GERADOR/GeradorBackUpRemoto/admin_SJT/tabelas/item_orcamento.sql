
-- Criar tabela item_orcamento
-- Gerando em: 02/08/2018 10:25:05
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `item_orcamento`;

CREATE TABLE IF NOT EXISTS `item_orcamento` (
	`id_item_orcamento` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`data_lanc_item_orcamento` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`orcamento_id` int(11) NOT NULL ,
	`item_id` int(11) NOT NULL ,
	`quantidade_item_orcamento` float NOT NULL ,
	`total_item_orcamento` float NOT NULL ,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_item_orcamento` int(1)  DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;