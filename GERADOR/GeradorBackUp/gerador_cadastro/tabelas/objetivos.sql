
-- Criar tabela objetivos
-- Gerando em: 05/08/2018 23:35:06
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `objetivos`;

CREATE TABLE IF NOT EXISTS `objetivos` (
	`id_objetivos` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_objetivos` varchar(200) NOT NULL ,
	`descricao_objetivos` text NOT NULL ,
	`data_atualizacao_objetivos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_objetivos` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;