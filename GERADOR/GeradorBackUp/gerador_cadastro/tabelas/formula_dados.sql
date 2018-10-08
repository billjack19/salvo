
-- Dados da tabela formula
-- Gerando em: 05/08/2018 23:35:03
-- Pelo Gerador JK-19

TRUNCATE `formula`;

-- Dados da tabela: 
INSERT INTO formula ( `id_formula`, `descricao_formula`, `formula_formula`, `numero_campos_formula`, `numero_campos_data_formula`, `bool_ativo_formula`) VALUES ( 1, 'soma_dois', 'n0 + n1', 2, 0, 1);
INSERT INTO formula ( `id_formula`, `descricao_formula`, `formula_formula`, `numero_campos_formula`, `numero_campos_data_formula`, `bool_ativo_formula`) VALUES ( 2, 'subtrai_dois', 'n0 - n1', 2, 0, 1);
INSERT INTO formula ( `id_formula`, `descricao_formula`, `formula_formula`, `numero_campos_formula`, `numero_campos_data_formula`, `bool_ativo_formula`) VALUES ( 3, 'multiplica_dois', 'n0 * n1', 2, 0, 1);
INSERT INTO formula ( `id_formula`, `descricao_formula`, `formula_formula`, `numero_campos_formula`, `numero_campos_data_formula`, `bool_ativo_formula`) VALUES ( 4, 'divide_dois', 'n0 / n1', 2, 0, 1);
INSERT INTO formula ( `id_formula`, `descricao_formula`, `formula_formula`, `numero_campos_formula`, `numero_campos_data_formula`, `bool_ativo_formula`) VALUES ( 5, 'pontencia_quadrada', 'n0 * n0', 1, 0, 1);
INSERT INTO formula ( `id_formula`, `descricao_formula`, `formula_formula`, `numero_campos_formula`, `numero_campos_data_formula`, `bool_ativo_formula`) VALUES ( 6, 'raiz', 'n0 r n1', 2, 0, 1);
INSERT INTO formula ( `id_formula`, `descricao_formula`, `formula_formula`, `numero_campos_formula`, `numero_campos_data_formula`, `bool_ativo_formula`) VALUES ( 7, 'media_tre_num', '( n0 + n1 + n2 ) / 3', 3, 0, 1);
INSERT INTO formula ( `id_formula`, `descricao_formula`, `formula_formula`, `numero_campos_formula`, `numero_campos_data_formula`, `bool_ativo_formula`) VALUES ( 8, 'potenciacao_simples', 'n0 e n1', 2, 0, 1);
INSERT INTO formula ( `id_formula`, `descricao_formula`, `formula_formula`, `numero_campos_formula`, `numero_campos_data_formula`, `bool_ativo_formula`) VALUES ( 9, 'desconto_loja', 'n0 - ( n0 p n1 )', 2, 0, 1);
INSERT INTO formula ( `id_formula`, `descricao_formula`, `formula_formula`, `numero_campos_formula`, `numero_campos_data_formula`, `bool_ativo_formula`) VALUES ( 10, 'data_entrega', 'd0 d+ n0', 1, 1, 1);
INSERT INTO formula ( `id_formula`, `descricao_formula`, `formula_formula`, `numero_campos_formula`, `numero_campos_data_formula`, `bool_ativo_formula`) VALUES ( 11, 'diferenca_datas', 'd0 d<> d1', 0, 2, 1);