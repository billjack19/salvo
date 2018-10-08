
-- Criar tabela pedido_pagamento_extorno
-- Gerando em: 01/08/2018 17:01:50
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `pedido_pagamento_extorno`;

CREATE TABLE IF NOT EXISTS `pedido_pagamento_extorno` (
	`id_pedido_pagamento_extorno` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`motivo_pedido_pagamento_extorno` varchar(200) NOT NULL ,
	`pedido_pagamento_id` int(200) NOT NULL ,
	`data_atualizacao_pedido_pagamento_extorno` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_pedido_pagamento_extorno` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro