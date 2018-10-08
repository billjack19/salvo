
-- Criar tabela bairro
-- Gerando em: 01/08/2018 17:00:32
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `bairro`;

CREATE TABLE IF NOT EXISTS `bairro` (
	`id_bairro` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_bairro` varchar(100) NOT NULL ,
	`lat_lng_bairro` varchar(100) NOT NULL ,
	`raio_bairro` float NOT NULL ,
	`regiao_id` int(11)  ,
	`data_atualizacao_bairro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_bairro` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO bairro ( `id_bairro`, `descricao_bairro`, `lat_lng_bairro`, `raio_bairro`, `regiao_id`, `data_atualizacao_bairro`, `usuario_id`, `bool_ativo_bairro`) VALUES ( 1, 'Jardim Quisisana', '-21.800467435696685,-46.56580924987793', 500, 4, '2018-04-11 16:29:37', 1, 1);
INSERT INTO bairro ( `id_bairro`, `descricao_bairro`, `lat_lng_bairro`, `raio_bairro`, `regiao_id`, `data_atualizacao_bairro`, `usuario_id`, `bool_ativo_bairro`) VALUES ( 2, 'Centro', '-21.78628150090536,-46.5695858001709', 500, 4, '2018-04-11 16:29:41', 1, 1);
INSERT INTO bairro ( `id_bairro`, `descricao_bairro`, `lat_lng_bairro`, `raio_bairro`, `regiao_id`, `data_atualizacao_bairro`, `usuario_id`, `bool_ativo_bairro`) VALUES ( 3, 'São José', '-21.809472384508748,-46.56949996948242', 500, 4, '2018-04-11 16:29:43', 1, 1);
INSERT INTO bairro ( `id_bairro`, `descricao_bairro`, `lat_lng_bairro`, `raio_bairro`, `regiao_id`, `data_atualizacao_bairro`, `usuario_id`, `bool_ativo_bairro`) VALUES ( 6, 'São Sebastião', '-21.856878477140818,-46.569929122924805', 500, 2, '2018-04-11 16:48:05', 1, 1);
INSERT INTO bairro ( `id_bairro`, `descricao_bairro`, `lat_lng_bairro`, `raio_bairro`, `regiao_id`, `data_atualizacao_bairro`, `usuario_id`, `bool_ativo_bairro`) VALUES ( 7, 'Jardim Kennedy', '-21.84142342746937,-46.5779972076416', 500, 2, '2018-04-11 16:49:16', 1, 1);
INSERT INTO bairro ( `id_bairro`, `descricao_bairro`, `lat_lng_bairro`, `raio_bairro`, `regiao_id`, `data_atualizacao_bairro`, `usuario_id`, `bool_ativo_bairro`) VALUES ( 8, 'Jardim Country Club', '-21.797917258830815,-46.61421775817871', 500, 3, '2018-04-11 16:50:34', 1, 1);
INSERT INTO bairro ( `id_bairro`, `descricao_bairro`, `lat_lng_bairro`, `raio_bairro`, `regiao_id`, `data_atualizacao_bairro`, `usuario_id`, `bool_ativo_bairro`) VALUES ( 9, 'Jardim Campos Elisios', '-21.798475113899347,-46.50795936584473', 500, 1, '2018-04-11 16:51:23', 1, 1);