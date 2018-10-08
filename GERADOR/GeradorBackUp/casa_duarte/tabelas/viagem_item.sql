
-- Criar tabela viagem_item
-- Gerando em: 01/08/2018 17:00:35
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `viagem_item`;

CREATE TABLE IF NOT EXISTS `viagem_item` (
	`id_viagem_item` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`endereco_viagem_item` varchar(200) NOT NULL ,
	`item_id` int(11) NOT NULL ,
	`quantidade_viagem_item` float NOT NULL ,
	`viagem_id` int(11) NOT NULL ,
	`pedido_id` int(11) NOT NULL ,
	`data_atualizacao_viagem_item` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_viagem_item` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro