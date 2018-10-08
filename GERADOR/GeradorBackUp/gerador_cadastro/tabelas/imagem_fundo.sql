
-- Criar tabela imagem_fundo
-- Gerando em: 05/08/2018 23:35:04
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `imagem_fundo`;

CREATE TABLE IF NOT EXISTS `imagem_fundo` (
	`id_imagem_fundo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_imagem_fundo` varchar(100) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;