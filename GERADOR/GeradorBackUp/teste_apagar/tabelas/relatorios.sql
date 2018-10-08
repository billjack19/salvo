
-- Criar tabela relatorios
-- Gerando em: 01/08/2018 16:54:08
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
INSERT INTO relatorios ( `id_relatorios`, `descricao_relatorios`, `tabela_relatorios`, `colunas_relatorios`, `colunas_estrangeiras_relatorios`, `colunas_filtro_relatorios`, `bool_filtro_ativo_relatorios`, `data_atualizacao_relatorios`, `usuario_id`, `bool_emitir_relatorios`, `bool_ativo_relatorios`) VALUES ( 2, 'Relatório de Manhas de Jogos', 'manhas', 'manha_manhas+descricao_manhas', 'manhas_tr_jogo_tr_descricao_jogo+jogo_tr_console_tr_descricao_console+manhas_tr_usuario_tr_nome_usuario', ' AND (jogo.descricao_jogo LIKE \'%Gta%\') AND (console.descricao_console LIKE \'%PC%\')', 1, '2018-01-26 11:39:47', 1, 0, 1
);
INSERT INTO relatorios ( `id_relatorios`, `descricao_relatorios`, `tabela_relatorios`, `colunas_relatorios`, `colunas_estrangeiras_relatorios`, `colunas_filtro_relatorios`, `bool_filtro_ativo_relatorios`, `data_atualizacao_relatorios`, `usuario_id`, `bool_emitir_relatorios`, `bool_ativo_relatorios`) VALUES ( 6, 'Relatório de Livros', 'livro', 'descricao_livro+codigo_livro+data_atualizacao_livro', 'livro_tr_genero_tr_descricao_genero+livro_tr_usuario_tr_nome_usuario', '', 1, '2018-01-23 15:31:12', 1, 0, 1
);
INSERT INTO relatorios ( `id_relatorios`, `descricao_relatorios`, `tabela_relatorios`, `colunas_relatorios`, `colunas_estrangeiras_relatorios`, `colunas_filtro_relatorios`, `bool_filtro_ativo_relatorios`, `data_atualizacao_relatorios`, `usuario_id`, `bool_emitir_relatorios`, `bool_ativo_relatorios`) VALUES ( 7, 'teste', 'aluno', 'nome_aluno+data_nascimento_aluno+sexo_aluno', 'aluno_tr_usuario_tr_nome_usuario+aluno_tr_usuario_tr_login_usuario', '', 1, '2018-01-24 14:25:19', 1, 0, 1
);