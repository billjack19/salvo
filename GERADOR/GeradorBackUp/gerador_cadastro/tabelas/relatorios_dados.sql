
-- Dados da tabela relatorios
-- Gerando em: 05/08/2018 23:35:07
-- Pelo Gerador JK-19

TRUNCATE `relatorios`;

-- Dados da tabela: 
INSERT INTO relatorios ( `id_relatorios`, `descricao_relatorios`, `tabela_relatorios`, `colunas_relatorios`, `colunas_estrangeiras_relatorios`, `colunas_filtro_relatorios`, `bool_filtro_ativo_relatorios`, `data_atualizacao_relatorios`, `usuario_id`, `bool_emitir_relatorios`, `bool_ativo_relatorios`) VALUES ( 2, 'Relatório de Tabelas Padrão', 'tabela_padrao', 'descricao_tabela_padrao+bool_ativo_tabela_padrao', '', '', 1, '2018-01-31 14:33:36', 1, 0, 1);
INSERT INTO relatorios ( `id_relatorios`, `descricao_relatorios`, `tabela_relatorios`, `colunas_relatorios`, `colunas_estrangeiras_relatorios`, `colunas_filtro_relatorios`, `bool_filtro_ativo_relatorios`, `data_atualizacao_relatorios`, `usuario_id`, `bool_emitir_relatorios`, `bool_ativo_relatorios`) VALUES ( 3, 'Relatório de Fórmulas', 'formula', 'descricao_formula+formula_formula+numero_campos_formula+bool_ativo_formula', '', '', 0, '2018-01-31 14:33:26', 1, 0, 1);
INSERT INTO relatorios ( `id_relatorios`, `descricao_relatorios`, `tabela_relatorios`, `colunas_relatorios`, `colunas_estrangeiras_relatorios`, `colunas_filtro_relatorios`, `bool_filtro_ativo_relatorios`, `data_atualizacao_relatorios`, `usuario_id`, `bool_emitir_relatorios`, `bool_ativo_relatorios`) VALUES ( 4, 'Relatório de nomenclatura de Banco de Dados', 'padrao_banco_de_dados', 'titulo_padrao_banco_de_dados+descricao_padrao_banco_de_dados+observacoes_padrao_banco_de_dados+data_atualizacao_padrao_banco_de_dados', 'padrao_banco_de_dados_tr_usuario_tr_nome_usuario', '', 1, '2018-02-07 10:26:44', 1, 0, 1);