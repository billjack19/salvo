
-- Criar tabela marca
-- Gerando em: 01/08/2018 17:01:22
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `marca`;

CREATE TABLE IF NOT EXISTS `marca` (
	`id_marca` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_marca` varchar(200) NOT NULL ,
	`data_atualizacao_marca` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_marca` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO marca ( `id_marca`, `descricao_marca`, `data_atualizacao_marca`, `usuario_id`, `bool_ativo_marca`) VALUES ( 1, 'Quatá', '2018-05-21 14:38:55', 1, 1);
INSERT INTO marca ( `id_marca`, `descricao_marca`, `data_atualizacao_marca`, `usuario_id`, `bool_ativo_marca`) VALUES ( 2, 'Itambé', '2018-05-21 14:39:07', 1, 1);
INSERT INTO marca ( `id_marca`, `descricao_marca`, `data_atualizacao_marca`, `usuario_id`, `bool_ativo_marca`) VALUES ( 3, 'Nescal', '2018-05-21 14:39:13', 1, 1);
INSERT INTO marca ( `id_marca`, `descricao_marca`, `data_atualizacao_marca`, `usuario_id`, `bool_ativo_marca`) VALUES ( 4, 'Tody', '2018-05-21 14:39:19', 1, 1);
INSERT INTO marca ( `id_marca`, `descricao_marca`, `data_atualizacao_marca`, `usuario_id`, `bool_ativo_marca`) VALUES ( 5, 'Baurel', '2018-07-11 23:48:34', 1, 1);
INSERT INTO marca ( `id_marca`, `descricao_marca`, `data_atualizacao_marca`, `usuario_id`, `bool_ativo_marca`) VALUES ( 6, 'Sorriso', '2018-07-11 23:48:48', 1, 1);
INSERT INTO marca ( `id_marca`, `descricao_marca`, `data_atualizacao_marca`, `usuario_id`, `bool_ativo_marca`) VALUES ( 7, 'Colgate', '2018-07-11 23:49:14', 1, 1);
INSERT INTO marca ( `id_marca`, `descricao_marca`, `data_atualizacao_marca`, `usuario_id`, `bool_ativo_marca`) VALUES ( 8, 'Santa Amália', '2018-07-12 20:34:32', 1, 1);
INSERT INTO marca ( `id_marca`, `descricao_marca`, `data_atualizacao_marca`, `usuario_id`, `bool_ativo_marca`) VALUES ( 9, 'Vigor', '2018-07-14 21:01:41', 1, 1);