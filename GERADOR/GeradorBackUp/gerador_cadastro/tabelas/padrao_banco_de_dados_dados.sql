
-- Dados da tabela padrao_banco_de_dados
-- Gerando em: 05/08/2018 23:35:07
-- Pelo Gerador JK-19

TRUNCATE `padrao_banco_de_dados`;

-- Dados da tabela: 
INSERT INTO padrao_banco_de_dados ( `id_padrao_banco_de_dados`, `titulo_padrao_banco_de_dados`, `descricao_padrao_banco_de_dados`, `observacoes_padrao_banco_de_dados`, `data_atualizacao_padrao_banco_de_dados`, `usuario_id`, `bool_ativo_padrao_banco_de_dados`) VALUES ( 1, 'Chave Primaria', 'Toda chave primaria de começar com "id_" e o nome da tabela', '', '2018-02-07 10:00:04', 1, 1);
INSERT INTO padrao_banco_de_dados ( `id_padrao_banco_de_dados`, `titulo_padrao_banco_de_dados`, `descricao_padrao_banco_de_dados`, `observacoes_padrao_banco_de_dados`, `data_atualizacao_padrao_banco_de_dados`, `usuario_id`, `bool_ativo_padrao_banco_de_dados`) VALUES ( 2, 'Nome da Tabela', 'Não pode começar com \'log_\'', 'Porque as tabelas de logs serão alimentadas por TRIGGERS  e servem apenas para gravar historio de registro', '2018-02-07 10:01:41', 1, 1);
INSERT INTO padrao_banco_de_dados ( `id_padrao_banco_de_dados`, `titulo_padrao_banco_de_dados`, `descricao_padrao_banco_de_dados`, `observacoes_padrao_banco_de_dados`, `data_atualizacao_padrao_banco_de_dados`, `usuario_id`, `bool_ativo_padrao_banco_de_dados`) VALUES ( 3, 'Campo Bool_ativo', 'Todas as tabelas tem que ter o campo "bool_ativo_" e nome da tabela', 'O sistemas gerados não apagam registros, apenas muda-os de ativos para não ativo', '2018-02-07 10:03:15', 1, 1);
INSERT INTO padrao_banco_de_dados ( `id_padrao_banco_de_dados`, `titulo_padrao_banco_de_dados`, `descricao_padrao_banco_de_dados`, `observacoes_padrao_banco_de_dados`, `data_atualizacao_padrao_banco_de_dados`, `usuario_id`, `bool_ativo_padrao_banco_de_dados`) VALUES ( 4, 'Coluna que não é chave estrangeira', 'Deve se escrita da seguinte forma "nome da coluna" _ \'nome da tabela"', 'Isso para não haver nenhuma repetição de campos pelo resto da estrutura do banco de dados com exceção da chave estrangeira', '2018-02-07 10:05:15', 1, 1);
INSERT INTO padrao_banco_de_dados ( `id_padrao_banco_de_dados`, `titulo_padrao_banco_de_dados`, `descricao_padrao_banco_de_dados`, `observacoes_padrao_banco_de_dados`, `data_atualizacao_padrao_banco_de_dados`, `usuario_id`, `bool_ativo_padrao_banco_de_dados`) VALUES ( 5, 'Campo Chave estrangeira', 'Dever ser definia com o nome da tabela estrangeira mais "_id"', '', '2018-02-07 10:07:04', 1, 1);
INSERT INTO padrao_banco_de_dados ( `id_padrao_banco_de_dados`, `titulo_padrao_banco_de_dados`, `descricao_padrao_banco_de_dados`, `observacoes_padrao_banco_de_dados`, `data_atualizacao_padrao_banco_de_dados`, `usuario_id`, `bool_ativo_padrao_banco_de_dados`) VALUES ( 6, 'Carácter \'+\'', 'Nenhum nome de tabela pode haver em sua descrição o carácter \'+\'', 'O sistema usa texto com nome de tabela concatenados com o carácter \'+\'', '2018-02-07 10:09:02', 1, 1);
INSERT INTO padrao_banco_de_dados ( `id_padrao_banco_de_dados`, `titulo_padrao_banco_de_dados`, `descricao_padrao_banco_de_dados`, `observacoes_padrao_banco_de_dados`, `data_atualizacao_padrao_banco_de_dados`, `usuario_id`, `bool_ativo_padrao_banco_de_dados`) VALUES ( 7, 'Coluna de Data', 'Antes era sempre dateTime.<br>
Porém não foi definido que usasse os tipos Date ou DateTime para registros', '', '2018-02-07 10:10:32', 1, 1);
INSERT INTO padrao_banco_de_dados ( `id_padrao_banco_de_dados`, `titulo_padrao_banco_de_dados`, `descricao_padrao_banco_de_dados`, `observacoes_padrao_banco_de_dados`, `data_atualizacao_padrao_banco_de_dados`, `usuario_id`, `bool_ativo_padrao_banco_de_dados`) VALUES ( 8, 'Coluna de busca', 'Coluna para se fazer busca num registro de chave estrangeira será a segunda coluna', '', '2018-02-07 10:11:33', 1, 1);
INSERT INTO padrao_banco_de_dados ( `id_padrao_banco_de_dados`, `titulo_padrao_banco_de_dados`, `descricao_padrao_banco_de_dados`, `observacoes_padrao_banco_de_dados`, `data_atualizacao_padrao_banco_de_dados`, `usuario_id`, `bool_ativo_padrao_banco_de_dados`) VALUES ( 9, 'Nome chave estrangeira', 'O nome da chave estrangeira segue o seguinte padrão <br>
\'fk_\' + nome da tabela local + "<>" + nome da tabela estrangeira', '', '2018-02-07 10:13:06', 1, 1);
INSERT INTO padrao_banco_de_dados ( `id_padrao_banco_de_dados`, `titulo_padrao_banco_de_dados`, `descricao_padrao_banco_de_dados`, `observacoes_padrao_banco_de_dados`, `data_atualizacao_padrao_banco_de_dados`, `usuario_id`, `bool_ativo_padrao_banco_de_dados`) VALUES ( 10, 'Quantidade de Colunas Chave Primaria', 'Todas as tabelas devem ter apenas um index primario', '', '2018-02-07 10:14:08', 1, 1);
INSERT INTO padrao_banco_de_dados ( `id_padrao_banco_de_dados`, `titulo_padrao_banco_de_dados`, `descricao_padrao_banco_de_dados`, `observacoes_padrao_banco_de_dados`, `data_atualizacao_padrao_banco_de_dados`, `usuario_id`, `bool_ativo_padrao_banco_de_dados`) VALUES ( 11, 'A tabela de login', 'Ter no mínimo campos:<br>
nome, <br>
login, <br>
senha, <br>
chave estrangeira para nível de acesso', '', '2018-02-07 10:15:39', 1, 1);
INSERT INTO padrao_banco_de_dados ( `id_padrao_banco_de_dados`, `titulo_padrao_banco_de_dados`, `descricao_padrao_banco_de_dados`, `observacoes_padrao_banco_de_dados`, `data_atualizacao_padrao_banco_de_dados`, `usuario_id`, `bool_ativo_padrao_banco_de_dados`) VALUES ( 12, 'Prefixo e nome de tabela', 'As tabelas não podem começar com prefixo de nome de coluna', 'Os Prefixos são: <br>
Imagem, <br>
Video, <br>
Audio, <br>
Texto, <br>
Senha, <br>
Bool, <br>
Id, <br>
Status', '2018-02-07 17:37:48', 1, 1);
INSERT INTO padrao_banco_de_dados ( `id_padrao_banco_de_dados`, `titulo_padrao_banco_de_dados`, `descricao_padrao_banco_de_dados`, `observacoes_padrao_banco_de_dados`, `data_atualizacao_padrao_banco_de_dados`, `usuario_id`, `bool_ativo_padrao_banco_de_dados`) VALUES ( 13, 'Posição chave primaria', 'A coluna de chave primaria deve ser a primeira', '', '2018-02-07 10:18:17', 1, 1);
INSERT INTO padrao_banco_de_dados ( `id_padrao_banco_de_dados`, `titulo_padrao_banco_de_dados`, `descricao_padrao_banco_de_dados`, `observacoes_padrao_banco_de_dados`, `data_atualizacao_padrao_banco_de_dados`, `usuario_id`, `bool_ativo_padrao_banco_de_dados`) VALUES ( 14, 'Nome Trigger', 'O nome das triggers devem seguir o seguinte padrão: <br>
"tgr_\' + nomeTabela + "_" + operação', 'As operações podem ser:<br>
BI -> Before Insert<br>
BU -> Before Update<br>
BD -> Before Delete<br>
AI -> After Insert,<br>
AU -> After Update, <br>
AD -> After Delete', '2018-02-07 13:03:08', 1, 1);
INSERT INTO padrao_banco_de_dados ( `id_padrao_banco_de_dados`, `titulo_padrao_banco_de_dados`, `descricao_padrao_banco_de_dados`, `observacoes_padrao_banco_de_dados`, `data_atualizacao_padrao_banco_de_dados`, `usuario_id`, `bool_ativo_padrao_banco_de_dados`) VALUES ( 15, 'Tabela Padrão', 'Nenhuma tabela pode ter nome de tabela padrão', 'As Tabelas Padrão são:<br>
upload_arq<br>
relatorios<br>
relatorio_tabela<br>
area_acesso<br>
nivel_acesso<br>
usuario<br>
notificacoes_config<br>
notificacoes<br>
notificacoes_salvas<br>
notificacoes_pendentes<br>', '2018-02-07 15:12:58', 1, 1);