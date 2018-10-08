
-- Criar tabela pedido
-- Gerando em: 01/08/2018 17:00:34
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `pedido`;

CREATE TABLE IF NOT EXISTS `pedido` (
	`id_pedido` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`documento_pedido` varchar(6) NOT NULL ,
	`filila_pedido` int(11) NOT NULL ,
	`total_pedido` float NOT NULL ,
	`data_atualizacao_pedido` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_pedido` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO pedido ( `id_pedido`, `documento_pedido`, `filila_pedido`, `total_pedido`, `data_atualizacao_pedido`, `usuario_id`, `bool_ativo_pedido`) VALUES ( 1, '003596', 10, 150, '2018-04-02 09:48:35', 1, 1);