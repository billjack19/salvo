
-- Criar tabela configurar_site
-- Gerando em: 01/08/2018 16:53:38
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `configurar_site`;

CREATE TABLE IF NOT EXISTS `configurar_site` (
	`id_configurar_site` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_configurar_site` varchar(100) NOT NULL ,
	`titulo_menu_configurar_site` varchar(100)  ,
	`cor_pagina_configurar_site` varchar(100) NOT NULL ,
	`contra_cor_pagina_configurar_site` varchar(100) NOT NULL ,
	`imagem_icone_configurar_site` varchar(100) NOT NULL ,
	`imagem_logo_configurar_site` varchar(100) NOT NULL ,
	`bem_vindo_configurar_site` varchar(100)  ,
	`data_atualizacao_configurar_site` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_configurar_site` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO configurar_site ( `id_configurar_site`, `titulo_configurar_site`, `titulo_menu_configurar_site`, `cor_pagina_configurar_site`, `contra_cor_pagina_configurar_site`, `imagem_icone_configurar_site`, `imagem_logo_configurar_site`, `bem_vindo_configurar_site`, `data_atualizacao_configurar_site`, `bool_ativo_configurar_site`) VALUES ( 1, 'CaféPoços', 'CaféPoços', '#00aa6a;', '#fff;', 'Logo_cafe_pocos.png', 'Logotipo.JPG', 'Bem Vindo a Café Poços!', '2018-01-24 10:53:58', 1
);