
-- Criar tabela relatorio_tabela
-- Gerando em: 01/08/2018 16:54:50
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `relatorio_tabela`;

CREATE TABLE IF NOT EXISTS `relatorio_tabela` (
	`id_relatorio_tabela` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_relatorio_tabela` varchar(200) NOT NULL ,
	`data_atualizacao_relatorio_tabela` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_relatorio_tabela` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO relatorio_tabela ( `id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES ( 1, 'cliente_site', '2018-04-14 10:40:07', 1
);
INSERT INTO relatorio_tabela ( `id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES ( 2, 'contato', '2018-04-14 10:40:07', 1
);
INSERT INTO relatorio_tabela ( `id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES ( 3, 'grupo', '2018-04-14 10:40:07', 1
);
INSERT INTO relatorio_tabela ( `id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES ( 4, 'item', '2018-04-14 10:40:07', 1
);
INSERT INTO relatorio_tabela ( `id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES ( 5, 'item_orcamento', '2018-04-14 10:40:07', 1
);
INSERT INTO relatorio_tabela ( `id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES ( 6, 'orcamento', '2018-04-14 10:40:07', 1
);
INSERT INTO relatorio_tabela ( `id_relatorio_tabela`, `descricao_relatorio_tabela`, `data_atualizacao_relatorio_tabela`, `bool_ativo_relatorio_tabela`) VALUES ( 7, 'videos', '2018-04-14 10:40:07', 1
);