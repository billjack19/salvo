
-- Criar tabela viagem_simples_item
-- Gerando em: 01/08/2018 17:00:36
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `viagem_simples_item`;

CREATE TABLE IF NOT EXISTS `viagem_simples_item` (
	`id_viagem_simples_item` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`localizacao_viagem_simples_item` varchar(100) NOT NULL ,
	`cliente_id` int(11) NOT NULL ,
	`viagem_simples_id` int(11) NOT NULL ,
	`bool_confirma_entrega` int(11) NOT NULL DEFAULT 0 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO viagem_simples_item ( `id_viagem_simples_item`, `localizacao_viagem_simples_item`, `cliente_id`, `viagem_simples_id`, `bool_confirma_entrega`) VALUES ( 1, '-21.780204231287797,-46.56462907791138', 1, 1, 0);
INSERT INTO viagem_simples_item ( `id_viagem_simples_item`, `localizacao_viagem_simples_item`, `cliente_id`, `viagem_simples_id`, `bool_confirma_entrega`) VALUES ( 2, '-21.78215695584276,-46.56658172607422', 2, 1, 0);
INSERT INTO viagem_simples_item ( `id_viagem_simples_item`, `localizacao_viagem_simples_item`, `cliente_id`, `viagem_simples_id`, `bool_confirma_entrega`) VALUES ( 3, '-21.787516848796123,-46.578125953674316', 3, 2, 0);
INSERT INTO viagem_simples_item ( `id_viagem_simples_item`, `localizacao_viagem_simples_item`, `cliente_id`, `viagem_simples_id`, `bool_confirma_entrega`) VALUES ( 4, '-21.795093084212976,-46.555917263031006', 4, 2, 0);
INSERT INTO viagem_simples_item ( `id_viagem_simples_item`, `localizacao_viagem_simples_item`, `cliente_id`, `viagem_simples_id`, `bool_confirma_entrega`) VALUES ( 5, '-21.81144961216114,-46.501664221286774', 1, 3, 1);
INSERT INTO viagem_simples_item ( `id_viagem_simples_item`, `localizacao_viagem_simples_item`, `cliente_id`, `viagem_simples_id`, `bool_confirma_entrega`) VALUES ( 6, '-21.801752468555826,-46.56855717301369', 2, 2, 0);