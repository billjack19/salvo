
-- Criar tabela orcamento
-- Gerando em: 01/08/2018 16:52:09
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `orcamento`;

CREATE TABLE IF NOT EXISTS `orcamento` (
	`id_orcamento` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_orcamento` varchar(200) NOT NULL ,
	`cliente_site_id` int(11) NOT NULL ,
	`data_lanc_orcamento` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_orcamento` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO orcamento ( `id_orcamento`, `descricao_orcamento`, `cliente_site_id`, `data_lanc_orcamento`, `bool_ativo_orcamento`) VALUES ( 6, 'Teste', 9, '2018-01-12 21:30:54', 1
);
INSERT INTO orcamento ( `id_orcamento`, `descricao_orcamento`, `cliente_site_id`, `data_lanc_orcamento`, `bool_ativo_orcamento`) VALUES ( 7, 'Omnes Engenharia', 11, '2018-04-23 20:43:34', 1
);