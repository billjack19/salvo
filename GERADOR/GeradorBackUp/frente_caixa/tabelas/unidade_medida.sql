
-- Criar tabela unidade_medida
-- Gerando em: 01/08/2018 17:01:50
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `unidade_medida`;

CREATE TABLE IF NOT EXISTS `unidade_medida` (
	`id_unidade_medida` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_unidade_medida` varchar(100)  ,
	`sigla_unidade_medida` varchar(100) NOT NULL ,
	`data_atualizacao_unidade_medida` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_unidade_medida` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO unidade_medida ( `id_unidade_medida`, `descricao_unidade_medida`, `sigla_unidade_medida`, `data_atualizacao_unidade_medida`, `usuario_id`, `bool_ativo_unidade_medida`) VALUES ( 1, 'Kilo', 'KG', '2018-06-14 10:21:14', 1, 1);
INSERT INTO unidade_medida ( `id_unidade_medida`, `descricao_unidade_medida`, `sigla_unidade_medida`, `data_atualizacao_unidade_medida`, `usuario_id`, `bool_ativo_unidade_medida`) VALUES ( 2, 'Litro', 'LT', '2018-06-14 10:21:26', 1, 1);
INSERT INTO unidade_medida ( `id_unidade_medida`, `descricao_unidade_medida`, `sigla_unidade_medida`, `data_atualizacao_unidade_medida`, `usuario_id`, `bool_ativo_unidade_medida`) VALUES ( 3, 'Unidade', 'UN', '2018-06-14 10:21:38', 1, 1);