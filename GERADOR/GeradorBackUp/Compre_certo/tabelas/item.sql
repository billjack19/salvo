
-- Criar tabela item
-- Gerando em: 01/08/2018 17:01:22
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `item`;

CREATE TABLE IF NOT EXISTS `item` (
	`id_item` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_item` varchar(200) NOT NULL ,
	`marca_id` int(11) NOT NULL ,
	`quantidade_item` float NOT NULL ,
	`unidade_medida_id` int(11) NOT NULL ,
	`grupo_id` int(200) NOT NULL DEFAULT 1 ,
	`data_atualizacao_item` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_item` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO item ( `id_item`, `descricao_item`, `marca_id`, `quantidade_item`, `unidade_medida_id`, `grupo_id`, `data_atualizacao_item`, `usuario_id`, `bool_ativo_item`) VALUES ( 1, 'Leite 1Lt', 0, 0, 0, 1, '2018-05-21 14:39:41', 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `marca_id`, `quantidade_item`, `unidade_medida_id`, `grupo_id`, `data_atualizacao_item`, `usuario_id`, `bool_ativo_item`) VALUES ( 2, 'Achocolatado em pó', 0, 0, 0, 2, '2018-05-21 14:40:55', 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `marca_id`, `quantidade_item`, `unidade_medida_id`, `grupo_id`, `data_atualizacao_item`, `usuario_id`, `bool_ativo_item`) VALUES ( 3, 'Tenys Pé', 5, 100, 3, 1, '2018-07-25 21:47:23', 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `marca_id`, `quantidade_item`, `unidade_medida_id`, `grupo_id`, `data_atualizacao_item`, `usuario_id`, `bool_ativo_item`) VALUES ( 4, 'Leite UHT Integral', 1, 1, 5, 1, '2018-07-14 10:46:09', 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `marca_id`, `quantidade_item`, `unidade_medida_id`, `grupo_id`, `data_atualizacao_item`, `usuario_id`, `bool_ativo_item`) VALUES ( 5, 'Margarina com sal', 9, 500, 3, 1, '2018-07-14 21:02:29', 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `marca_id`, `quantidade_item`, `unidade_medida_id`, `grupo_id`, `data_atualizacao_item`, `usuario_id`, `bool_ativo_item`) VALUES ( 6, 'tenys pé', 5, 100, 3, 1, '2018-07-26 20:27:05', 1, 1);