
-- Criar tabela item_unidade_medida
-- Gerando em: 01/08/2018 17:01:48
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `item_unidade_medida`;

CREATE TABLE IF NOT EXISTS `item_unidade_medida` (
	`id_item_unidade_medida` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`quantidade_item_unidade_medida` float NOT NULL ,
	`item_id` int(100) NOT NULL ,
	`unidade_medida_id` int(100) NOT NULL ,
	`data_atualizacao_item_unidade_medida` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_item_unidade_medida` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO item_unidade_medida ( `id_item_unidade_medida`, `quantidade_item_unidade_medida`, `item_id`, `unidade_medida_id`, `data_atualizacao_item_unidade_medida`, `usuario_id`, `bool_ativo_item_unidade_medida`) VALUES ( 1, 1, 1, 3, '2018-06-14 10:27:30', 1, 1);
INSERT INTO item_unidade_medida ( `id_item_unidade_medida`, `quantidade_item_unidade_medida`, `item_id`, `unidade_medida_id`, `data_atualizacao_item_unidade_medida`, `usuario_id`, `bool_ativo_item_unidade_medida`) VALUES ( 2, 10, 1, 1, '2018-06-14 10:28:16', 1, 1);
INSERT INTO item_unidade_medida ( `id_item_unidade_medida`, `quantidade_item_unidade_medida`, `item_id`, `unidade_medida_id`, `data_atualizacao_item_unidade_medida`, `usuario_id`, `bool_ativo_item_unidade_medida`) VALUES ( 3, 1, 2, 3, '2018-06-14 10:28:33', 1, 1);