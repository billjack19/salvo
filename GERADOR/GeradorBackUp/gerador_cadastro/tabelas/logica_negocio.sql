
-- Criar tabela logica_negocio
-- Gerando em: 05/08/2018 23:35:05
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `logica_negocio`;

CREATE TABLE IF NOT EXISTS `logica_negocio` (
	`id_logica_negocio` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`projetos_id` int(11) NOT NULL ,
	`tabela_logica_negocio` varchar(200) NOT NULL ,
	`campos_logica_negocio` text  ,
	`campos_data_logica_negocio` text  ,
	`campo_resultado_logica_negocio` varchar(200) NOT NULL ,
	`tipo_reultado_logica_negocio` enum('i','d','s') NOT NULL ,
	`formula_id` int(11) NOT NULL ,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_logica_negocio` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;