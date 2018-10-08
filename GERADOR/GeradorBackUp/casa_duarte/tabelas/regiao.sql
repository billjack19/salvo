
-- Criar tabela regiao
-- Gerando em: 01/08/2018 17:00:34
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `regiao`;

CREATE TABLE IF NOT EXISTS `regiao` (
	`id_regiao` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_regiao` varchar(100) NOT NULL ,
	`lat_lng_regiao` varchar(100) NOT NULL ,
	`raio_regiao` float NOT NULL ,
	`usuario_id` int(11) NOT NULL DEFAULT 1 ,
	`data_atualizacao_regiao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_regiao` int(1)  DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO regiao ( `id_regiao`, `descricao_regiao`, `lat_lng_regiao`, `raio_regiao`, `usuario_id`, `data_atualizacao_regiao`, `bool_ativo_regiao`) VALUES ( 1, 'Zona Leste', '-21.802698803212827,-46.5080451965332', 3000, 1, '2018-04-11 16:54:38', 1);
INSERT INTO regiao ( `id_regiao`, `descricao_regiao`, `lat_lng_regiao`, `raio_regiao`, `usuario_id`, `data_atualizacao_regiao`, `bool_ativo_regiao`) VALUES ( 2, 'Zona Sul', '-21.839112992942866,-46.56924247741699', 3000, 1, '2018-04-11 16:54:38', 1);
INSERT INTO regiao ( `id_regiao`, `descricao_regiao`, `lat_lng_regiao`, `raio_regiao`, `usuario_id`, `data_atualizacao_regiao`, `bool_ativo_regiao`) VALUES ( 3, 'Zona Oeste', '-21.780224157182847,-46.60572052001953', 2500, 1, '2018-04-11 16:54:38', 1);
INSERT INTO regiao ( `id_regiao`, `descricao_regiao`, `lat_lng_regiao`, `raio_regiao`, `usuario_id`, `data_atualizacao_regiao`, `bool_ativo_regiao`) VALUES ( 4, 'Zona Centro', '-21.789509322959844,-46.5615177154541', 2500, 1, '2018-04-11 16:54:38', 1);