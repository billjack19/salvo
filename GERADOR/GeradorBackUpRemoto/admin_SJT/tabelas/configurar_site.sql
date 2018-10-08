
-- Criar tabela configurar_site
-- Gerando em: 02/08/2018 10:24:53
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `configurar_site`;

CREATE TABLE IF NOT EXISTS `configurar_site` (
	`id_configurar_site` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_configurar_site` varchar(100) NOT NULL ,
	`titulo_menu_configurar_site` varchar(100) NOT NULL ,
	`cor_pagina_configurar_site` varchar(100) NOT NULL ,
	`contra_cor_pagina_configurar_site` varchar(100) NOT NULL ,
	`imagem_icone_configurar_site` varchar(100) NOT NULL ,
	`imagem_logo_configurar_site` varchar(100) NOT NULL ,
	`data_atualizacao_configurar_site` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_configurar_site` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;