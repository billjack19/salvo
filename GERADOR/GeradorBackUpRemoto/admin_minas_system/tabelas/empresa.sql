
-- Criar tabela empresa
-- Gerando em: 01/08/2018 16:54:42
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `empresa`;

CREATE TABLE IF NOT EXISTS `empresa` (
	`id_empresa` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_empresa` varchar(200) NOT NULL ,
	`imagem_logo_empresa` varchar(200) NOT NULL ,
	`data_atualizacao_empresa` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_empresa` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO empresa ( `id_empresa`, `descricao_empresa`, `imagem_logo_empresa`, `data_atualizacao_empresa`, `usuario_id`, `bool_ativo_empresa`) VALUES ( 1, 'Minas System', 'LogoLg.png', '2018-01-27 09:02:12', 1, 1
);