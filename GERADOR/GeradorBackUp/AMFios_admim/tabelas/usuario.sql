
-- Criar tabela usuario
-- Gerando em: 01/08/2018 16:49:42
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE IF NOT EXISTS `usuario` (
	`id_usuario` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`nome_usuario` varchar(200)  ,
	`login_usuario` char(3)  ,
	`senha_usuario` varchar(100)  ,
	`bool_ativo_usuario` int(1)  DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO usuario ( `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `bool_ativo_usuario`) VALUES ( 1, 'ADMINISTRADOR', 'ADM', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 1
);