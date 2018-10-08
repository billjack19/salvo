
-- Criar tabela imagem_logo
-- Gerando em: 05/08/2018 23:35:04
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `imagem_logo`;

CREATE TABLE IF NOT EXISTS `imagem_logo` (
	`id_imagem_logo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_imagem_logo` varchar(100) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;