
-- Criar tabela paginas
-- Gerando em: 02/08/2018 10:25:16
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `paginas`;

CREATE TABLE IF NOT EXISTS `paginas` (
	`id_paginas` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`numero_da_pagina_paginas` int(3) NOT NULL ,
	`imagem_paginas` varchar(50) NOT NULL ,
	`imagem_miniatura_paginas` varchar(50) NOT NULL ,
	`new_sjt_id` int(11) NOT NULL ,
	`data_atualizacao_paginas` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_paginas` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;