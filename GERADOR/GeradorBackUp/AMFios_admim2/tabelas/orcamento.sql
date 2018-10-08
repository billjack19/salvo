
-- Criar tabela orcamento
-- Gerando em: 01/08/2018 16:51:34
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
INSERT INTO orcamento ( `id_orcamento`, `descricao_orcamento`, `cliente_site_id`, `data_lanc_orcamento`, `bool_ativo_orcamento`) VALUES ( 1, 'Teste', 1, '2018-01-08 13:33:04', 1
);
INSERT INTO orcamento ( `id_orcamento`, `descricao_orcamento`, `cliente_site_id`, `data_lanc_orcamento`, `bool_ativo_orcamento`) VALUES ( 2, 'Orcamento Teste', 4, '2018-01-11 17:49:47', 1
);