
-- Criar tabela usuario
-- Gerando em: 01/08/2018 16:54:09
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE IF NOT EXISTS `usuario` (
	`id_usuario` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`nome_usuario` varchar(200)  ,
	`login_usuario` char(3)  ,
	`senha_usuario` varchar(100)  ,
	`nivel_acesso_id` int(11)  DEFAULT 1 ,
	`bool_ativo_usuario` int(1)  DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO usuario ( `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES ( 1, 'ADMINISTRADOR', 'ADM', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 1, 1
);
INSERT INTO usuario ( `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES ( 3, 'JACK', 'JAC', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 1, 1
);
INSERT INTO usuario ( `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES ( 7, 'JOGADOR', 'JOG', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 3, 1
);
INSERT INTO usuario ( `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES ( 8, 'Ajudante de Jogador', 'AJJ', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 4, 1
);
INSERT INTO usuario ( `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `nivel_acesso_id`, `bool_ativo_usuario`) VALUES ( 9, 'Bibliotecaria', 'BIB', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 50, 1
);