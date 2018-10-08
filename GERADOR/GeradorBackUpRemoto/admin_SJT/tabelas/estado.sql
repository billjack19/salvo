
-- Criar tabela estado
-- Gerando em: 02/08/2018 10:24:59
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `estado`;

CREATE TABLE IF NOT EXISTS `estado` (
	`id_estado` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_estado` varchar(100) NOT NULL ,
	`sigla_estado` char(2) NOT NULL ,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_estado` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;