
-- Criar tabela configurar_site
-- Gerando em: 01/08/2018 16:49:40
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `configurar_site`;

CREATE TABLE IF NOT EXISTS `configurar_site` (
	`id_configurar_site` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_configurar_site` varchar(100) NOT NULL ,
	`cor_pagina_configurar_site` varchar(100) NOT NULL ,
	`contra_cor_pagina_configurar_site` varchar(100) NOT NULL ,
	`imagem_icone_configurar_site` varchar(100) NOT NULL ,
	`imagem_logo_configurar_site` varchar(100) NOT NULL ,
	`data_atualizacao_configurar_site` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_configurar_site` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO configurar_site ( `id_configurar_site`, `titulo_configurar_site`, `cor_pagina_configurar_site`, `contra_cor_pagina_configurar_site`, `imagem_icone_configurar_site`, `imagem_logo_configurar_site`, `data_atualizacao_configurar_site`, `bool_ativo_configurar_site`) VALUES ( 1, 'AM Fios & Cabos', '#7ec0fa;', '#fff;', 'Logotipo.png', 'Logotipo_branca.png', '2018-01-08 14:30:42', 1
);