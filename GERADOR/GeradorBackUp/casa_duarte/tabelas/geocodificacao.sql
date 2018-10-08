
-- Criar tabela geocodificacao
-- Gerando em: 01/08/2018 17:00:32
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `geocodificacao`;

CREATE TABLE IF NOT EXISTS `geocodificacao` (
	`id_geocodificacao` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`endereco_geocodificacao` varchar(200) NOT NULL ,
	`numero_geocodificacao` int(11) NOT NULL ,
	`cep_geocodificacao` varchar(20) NOT NULL ,
	`cidade_geocodificacao` varchar(200) NOT NULL ,
	`latitude_geocodificacao` varchar(200)  ,
	`longitude_geocodificacao` varchar(200)  ,
	`data_atualizacao_geocodificacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_geocodificacao` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO geocodificacao ( `id_geocodificacao`, `endereco_geocodificacao`, `numero_geocodificacao`, `cep_geocodificacao`, `cidade_geocodificacao`, `latitude_geocodificacao`, `longitude_geocodificacao`, `data_atualizacao_geocodificacao`, `usuario_id`, `bool_ativo_geocodificacao`) VALUES ( 1, 'assis figueredo', 260, '37701000', 'poços de caldas', '-21.780565', '-46.565024', '2018-04-19 15:25:01', 1, 1);
INSERT INTO geocodificacao ( `id_geocodificacao`, `endereco_geocodificacao`, `numero_geocodificacao`, `cep_geocodificacao`, `cidade_geocodificacao`, `latitude_geocodificacao`, `longitude_geocodificacao`, `data_atualizacao_geocodificacao`, `usuario_id`, `bool_ativo_geocodificacao`) VALUES ( 2, 'dovilio taconi', 150, '37701253', 'poços de caldas', '-21.798659', '-46.56933', '2018-04-19 15:24:26', 1, 1);
INSERT INTO geocodificacao ( `id_geocodificacao`, `endereco_geocodificacao`, `numero_geocodificacao`, `cep_geocodificacao`, `cidade_geocodificacao`, `latitude_geocodificacao`, `longitude_geocodificacao`, `data_atualizacao_geocodificacao`, `usuario_id`, `bool_ativo_geocodificacao`) VALUES ( 3, 'dovilio taconi', 150, '37701253', 'poços de caldas', '-21.798659', '-46.56933', '2018-04-19 15:25:01', 1, 1);
INSERT INTO geocodificacao ( `id_geocodificacao`, `endereco_geocodificacao`, `numero_geocodificacao`, `cep_geocodificacao`, `cidade_geocodificacao`, `latitude_geocodificacao`, `longitude_geocodificacao`, `data_atualizacao_geocodificacao`, `usuario_id`, `bool_ativo_geocodificacao`) VALUES ( 4, 'dovilio taconi', 150, '37701253', 'poços de caldas', '-21.798659', '-46.56933', '2018-04-19 16:13:25', 1, 1);
INSERT INTO geocodificacao ( `id_geocodificacao`, `endereco_geocodificacao`, `numero_geocodificacao`, `cep_geocodificacao`, `cidade_geocodificacao`, `latitude_geocodificacao`, `longitude_geocodificacao`, `data_atualizacao_geocodificacao`, `usuario_id`, `bool_ativo_geocodificacao`) VALUES ( 5, 'dovilio taconi', 150, '37701253', 'poços de caldas', '-21.798659', '-46.56933', '2018-04-19 16:13:25', 1, 1);
INSERT INTO geocodificacao ( `id_geocodificacao`, `endereco_geocodificacao`, `numero_geocodificacao`, `cep_geocodificacao`, `cidade_geocodificacao`, `latitude_geocodificacao`, `longitude_geocodificacao`, `data_atualizacao_geocodificacao`, `usuario_id`, `bool_ativo_geocodificacao`) VALUES ( 6, 'dovilio taconi', 150, '37701253', 'poços de caldas', '-21.798659', '-46.56933', '2018-04-19 17:58:27', 1, 1);
INSERT INTO geocodificacao ( `id_geocodificacao`, `endereco_geocodificacao`, `numero_geocodificacao`, `cep_geocodificacao`, `cidade_geocodificacao`, `latitude_geocodificacao`, `longitude_geocodificacao`, `data_atualizacao_geocodificacao`, `usuario_id`, `bool_ativo_geocodificacao`) VALUES ( 7, 'dovilio taconi', 150, '37701253', 'poços de caldas', '-21.798659', '-46.56933', '2018-04-19 16:16:29', 1, 1);
INSERT INTO geocodificacao ( `id_geocodificacao`, `endereco_geocodificacao`, `numero_geocodificacao`, `cep_geocodificacao`, `cidade_geocodificacao`, `latitude_geocodificacao`, `longitude_geocodificacao`, `data_atualizacao_geocodificacao`, `usuario_id`, `bool_ativo_geocodificacao`) VALUES ( 8, 'assis figueredo', 210, '37701000', 'poços de caldas', '-21.780157', '-46.564955', '2018-04-19 16:29:31', 1, 1);
INSERT INTO geocodificacao ( `id_geocodificacao`, `endereco_geocodificacao`, `numero_geocodificacao`, `cep_geocodificacao`, `cidade_geocodificacao`, `latitude_geocodificacao`, `longitude_geocodificacao`, `data_atualizacao_geocodificacao`, `usuario_id`, `bool_ativo_geocodificacao`) VALUES ( 9, 'dovilio taconi', 150, '37701253', 'poços de caldas', '-21.798659', '-46.56933', '2018-04-19 16:30:01', 1, 1);
INSERT INTO geocodificacao ( `id_geocodificacao`, `endereco_geocodificacao`, `numero_geocodificacao`, `cep_geocodificacao`, `cidade_geocodificacao`, `latitude_geocodificacao`, `longitude_geocodificacao`, `data_atualizacao_geocodificacao`, `usuario_id`, `bool_ativo_geocodificacao`) VALUES ( 10, 'pernambuco', 679, '37701279', 'poços de caldas', '-21.7843562', '-46.5668704', '2018-04-19 16:31:01', 1, 1);