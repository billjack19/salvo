
-- Dados da tabela relatorios
-- Gerando em: 02/08/2018 13:30:23
-- Pelo Gerador JK-19

TRUNCATE `relatorios`;

-- Dados da tabela: 
INSERT INTO relatorios ( `id_relatorios`, `descricao_relatorios`, `tabela_relatorios`, `colunas_relatorios`, `colunas_estrangeiras_relatorios`, `colunas_filtro_relatorios`, `bool_filtro_ativo_relatorios`, `data_atualizacao_relatorios`, `usuario_id`, `bool_emitir_relatorios`, `bool_ativo_relatorios`) VALUES ( 2, 'Relatório de Manhas de Jogos', 'manhas', 'manha_manhas+descricao_manhas', 'manhas_tr_jogo_tr_descricao_jogo+jogo_tr_console_tr_descricao_console+manhas_tr_usuario_tr_nome_usuario', ' AND (jogo.descricao_jogo LIKE \'%Gta%\') AND (console.descricao_console LIKE \'%PC%\')', 1, '2018-01-26 11:39:47', 1, 0, 1);
INSERT INTO relatorios ( `id_relatorios`, `descricao_relatorios`, `tabela_relatorios`, `colunas_relatorios`, `colunas_estrangeiras_relatorios`, `colunas_filtro_relatorios`, `bool_filtro_ativo_relatorios`, `data_atualizacao_relatorios`, `usuario_id`, `bool_emitir_relatorios`, `bool_ativo_relatorios`) VALUES ( 6, 'Relatório de Livros', 'livro', 'descricao_livro+codigo_livro+data_atualizacao_livro', 'livro_tr_genero_tr_descricao_genero+livro_tr_usuario_tr_nome_usuario', '', 1, '2018-01-23 15:31:12', 1, 0, 1);
INSERT INTO relatorios ( `id_relatorios`, `descricao_relatorios`, `tabela_relatorios`, `colunas_relatorios`, `colunas_estrangeiras_relatorios`, `colunas_filtro_relatorios`, `bool_filtro_ativo_relatorios`, `data_atualizacao_relatorios`, `usuario_id`, `bool_emitir_relatorios`, `bool_ativo_relatorios`) VALUES ( 7, 'teste', 'aluno', 'nome_aluno+data_nascimento_aluno+sexo_aluno', 'aluno_tr_usuario_tr_nome_usuario+aluno_tr_usuario_tr_login_usuario', '', 1, '2018-01-24 14:25:19', 1, 0, 1);