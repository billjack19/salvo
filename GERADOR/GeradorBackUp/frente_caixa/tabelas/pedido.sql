
-- Criar tabela pedido
-- Gerando em: 01/08/2018 17:01:49
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `pedido`;

CREATE TABLE IF NOT EXISTS `pedido` (
	`id_pedido` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`documento_pedido` varchar(200) NOT NULL ,
	`total_pedido` float NOT NULL ,
	`emissao_pedido` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ,
	`cliente_id` int(100)  ,
	`nome_cliente_pedido` varchar(100)  ,
	`bool_finalizado_pedido` int(1) NOT NULL ,
	`filial_id` int(200) NOT NULL ,
	`data_atualizacao_pedido` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_pedido` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro