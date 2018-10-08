
-- Criar tabela grade
-- Gerando em: 05/08/2018 23:35:03
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `grade`;

CREATE TABLE IF NOT EXISTS `grade` (
	`id_grade` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_grade` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`projetos_id` int(11) NOT NULL ,
	`tabela_primaria` varchar(200) NOT NULL ,
	`tabela_grade` varchar(200) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;