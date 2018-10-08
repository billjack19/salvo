
-- Dados da tabela usuario
-- Gerando em: 02/08/2018 13:30:24
-- Pelo Gerador JK-19

TRUNCATE `usuario`;

-- Dados da tabela: 
INSERT INTO usuario ( `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES ( 1, 'ADMINISTRADOR', 'ADM', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 1, 1);
INSERT INTO usuario ( `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES ( 3, 'JACK', 'JAC', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 1, 1);
INSERT INTO usuario ( `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES ( 7, 'JOGADOR', 'JOG', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 3, 1);
INSERT INTO usuario ( `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES ( 8, 'Ajudante de Jogador', 'AJJ', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 4, 1);
INSERT INTO usuario ( `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES ( 9, 'Bibliotecaria', 'BIB', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 50, 1);