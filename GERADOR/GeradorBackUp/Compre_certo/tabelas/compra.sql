
-- Criar tabela compra
-- Gerando em: 01/08/2018 17:01:21
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `compra`;

CREATE TABLE IF NOT EXISTS `compra` (
	`id_compra` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`total_compra` float NOT NULL DEFAULT 0 ,
	`supermercado_id` int(11) NOT NULL ,
	`pedido_id` int(11) NOT NULL ,
	`data_atualizacao_compra` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_compra` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO compra ( `id_compra`, `total_compra`, `supermercado_id`, `pedido_id`, `data_atualizacao_compra`, `usuario_id`, `bool_ativo_compra`) VALUES ( 1, 42, 1, 1, '2018-07-30 15:30:07', 1, 1);