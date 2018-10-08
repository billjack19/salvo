
-- Criar tabela imagem_icone
-- Gerando em: 05/08/2018 23:35:04
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `imagem_icone`;

CREATE TABLE IF NOT EXISTS `imagem_icone` (
	`id_imagem_icone` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_imagem_icone` varchar(500) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;