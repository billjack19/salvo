
-- Criar tabela orcamento
-- Gerando em: 02/08/2018 10:25:15
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `orcamento`;

CREATE TABLE IF NOT EXISTS `orcamento` (
	`id_orcamento` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_orcamento` varchar(200) NOT NULL ,
	`cliente_site_id` int(11) NOT NULL ,
	`data_lanc_orcamento` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_orcamento` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;