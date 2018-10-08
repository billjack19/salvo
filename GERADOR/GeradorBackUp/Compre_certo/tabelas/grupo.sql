
-- Criar tabela grupo
-- Gerando em: 01/08/2018 17:01:22
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `grupo`;

CREATE TABLE IF NOT EXISTS `grupo` (
	`id_grupo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_grupo` varchar(200) NOT NULL ,
	`data_atualizacao_grupo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_grupo` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 1, 'Diversos', '2018-07-11 23:05:50', 1, 1);
INSERT INTO grupo ( `id_grupo`, `descricao_grupo`, `data_atualizacao_grupo`, `usuario_id`, `bool_ativo_grupo`) VALUES ( 2, 'Comidas', '2018-05-21 14:38:36', 1, 1);