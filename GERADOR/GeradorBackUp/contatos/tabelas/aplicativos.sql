
-- Criar tabela aplicativos
-- Gerando em: 05/08/2018 23:34:19
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `aplicativos`;

CREATE TABLE IF NOT EXISTS `aplicativos` (
	`id_aplicativos` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_aplicativos` varchar(200) NOT NULL ,
	`data_atualizacao_aplicativos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_aplicativos` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;