
-- Criar tabela telefone
-- Gerando em: 05/08/2018 23:34:22
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `telefone`;

CREATE TABLE IF NOT EXISTS `telefone` (
	`id_telefone` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`telefone_telefone` varchar(20) NOT NULL ,
	`pessoa_id` int(11) NOT NULL ,
	`data_atualizacao_telefone` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_telefone` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;