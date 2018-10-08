
-- Criar tabela meus_aplicativos
-- Gerando em: 05/08/2018 23:34:19
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `meus_aplicativos`;

CREATE TABLE IF NOT EXISTS `meus_aplicativos` (
	`id_meus_aplicativos` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_meus_aplicativos` varchar(200) NOT NULL ,
	`data_atualizacao_meus_aplicativos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_meus_aplicativos` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;