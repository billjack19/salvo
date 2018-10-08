
-- Criar tabela usuario
-- Gerando em: 01/08/2018 16:52:46
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE IF NOT EXISTS `usuario` (
	`id_usuario` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`nome_usuario` varchar(200) NOT NULL ,
	`login_usuario` varchar(200) NOT NULL ,
	`senha_usuario` varchar(200) NOT NULL ,
	`foto_usuario` varchar(200)  ,
	`nivel_acesso_usuario` int(1) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO usuario ( `id_usuario`, `nome_usuario`, `login_usuario`, `senha_usuario`, `foto_usuario`, `nivel_acesso_usuario`) VALUES ( 1, 'Administrador', 'ADM', '*68922D0185D8333DA80D814C32E5A04C28CC06D0', '', 1
);