
-- Dados da tabela nivel_acesso
-- Gerando em: 05/08/2018 23:35:05
-- Pelo Gerador JK-19

TRUNCATE `nivel_acesso`;

-- Dados da tabela: 
INSERT INTO nivel_acesso ( `id_nivel_acesso`, `descricao_nivel_acesso`, `area_nivel_acesso`, `data_atualizacao_nivel_acesso`, `usuario_id`, `bool_ativo_nivel_acesso`) VALUES ( 1, 'Nivel Administrador', 'formula+logica_negocio+objetivos+padrao_banco_de_dados+tabela_padrao+upload+mapa+mov+relatorio+notificacao+usuario', '2018-08-01 16:15:26', 1, 1);
INSERT INTO nivel_acesso ( `id_nivel_acesso`, `descricao_nivel_acesso`, `area_nivel_acesso`, `data_atualizacao_nivel_acesso`, `usuario_id`, `bool_ativo_nivel_acesso`) VALUES ( 2, 'Usuário Padrão', 'formula+logica_negocio+tabela_padrao+pdf+usuario', '2018-01-31 14:53:15', 1, 1);