
-- Criar tabela lanc_preco
-- Gerando em: 01/08/2018 17:01:22
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `lanc_preco`;

CREATE TABLE IF NOT EXISTS `lanc_preco` (
	`id_lanc_preco` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`supermercado_id` int(11) NOT NULL ,
	`item_id` int(11) NOT NULL ,
	`marca_id` int(11)  ,
	`preco_lanc_preco` float NOT NULL ,
	`data_atualizacao_lanc_preco` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_lanc_preco` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO lanc_preco ( `id_lanc_preco`, `supermercado_id`, `item_id`, `marca_id`, `preco_lanc_preco`, `data_atualizacao_lanc_preco`, `usuario_id`, `bool_ativo_lanc_preco`) VALUES ( 1, 1, 2, 3, 5.6, '2018-05-21 14:52:10', 1, 1);
INSERT INTO lanc_preco ( `id_lanc_preco`, `supermercado_id`, `item_id`, `marca_id`, `preco_lanc_preco`, `data_atualizacao_lanc_preco`, `usuario_id`, `bool_ativo_lanc_preco`) VALUES ( 2, 2, 1, 1, 2.6, '2018-05-21 14:52:26', 1, 1);