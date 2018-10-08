
-- Criar tabela relatorios
-- Gerando em: 01/08/2018 16:53:39
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `relatorios`;

CREATE TABLE IF NOT EXISTS `relatorios` (
	`id_relatorios` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_relatorios` varchar(200) NOT NULL ,
	`tabela_relatorios` varchar(200) NOT NULL ,
	`colunas_relatorios` text NOT NULL ,
	`colunas_estrangeiras_relatorios` text NOT NULL ,
	`colunas_filtro_relatorios` text  ,
	`bool_filtro_ativo_relatorios` int(1) NOT NULL DEFAULT 1 ,
	`data_atualizacao_relatorios` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_emitir_relatorios` int(1) NOT NULL DEFAULT 0 ,
	`bool_ativo_relatorios` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO relatorios ( `id_relatorios`, `descricao_relatorios`, `tabela_relatorios`, `colunas_relatorios`, `colunas_estrangeiras_relatorios`, `colunas_filtro_relatorios`, `bool_filtro_ativo_relatorios`, `data_atualizacao_relatorios`, `usuario_id`, `bool_emitir_relatorios`, `bool_ativo_relatorios`) VALUES ( 4, 'Relatorio de Link de Videos do YouTube', 'videos', 'descricao_videos+link_videos+data_atualizacao_videos', '', '', 1, '2018-01-19 16:03:00', 1, 0, 1
);
INSERT INTO relatorios ( `id_relatorios`, `descricao_relatorios`, `tabela_relatorios`, `colunas_relatorios`, `colunas_estrangeiras_relatorios`, `colunas_filtro_relatorios`, `bool_filtro_ativo_relatorios`, `data_atualizacao_relatorios`, `usuario_id`, `bool_emitir_relatorios`, `bool_ativo_relatorios`) VALUES ( 5, 'Relatório de Estados', 'estado', 'descricao_estado+sigla_estado', '', '', 1, '2018-01-18 17:28:59', 1, 0, 1
);
INSERT INTO relatorios ( `id_relatorios`, `descricao_relatorios`, `tabela_relatorios`, `colunas_relatorios`, `colunas_estrangeiras_relatorios`, `colunas_filtro_relatorios`, `bool_filtro_ativo_relatorios`, `data_atualizacao_relatorios`, `usuario_id`, `bool_emitir_relatorios`, `bool_ativo_relatorios`) VALUES ( 7, 'Relatório de Clientes', 'cliefornec', 'CPF_CGC+RAZAOSOCIAL', '', '', 1, '2018-01-19 16:27:36', 1, 0, 1
);
INSERT INTO relatorios ( `id_relatorios`, `descricao_relatorios`, `tabela_relatorios`, `colunas_relatorios`, `colunas_estrangeiras_relatorios`, `colunas_filtro_relatorios`, `bool_filtro_ativo_relatorios`, `data_atualizacao_relatorios`, `usuario_id`, `bool_emitir_relatorios`, `bool_ativo_relatorios`) VALUES ( 20, 'Relatório de Contatos', 'contato', 'nome_contato+email_contato+telefone_contato', 'contato_tr_usuario_tr_nome_usuario', ' AND (usuario.nome_usuario LIKE \'%Site%\')', 1, '2018-01-24 14:52:28', 1, 0, 1
);