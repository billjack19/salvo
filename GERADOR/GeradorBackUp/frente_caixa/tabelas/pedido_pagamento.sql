
-- Criar tabela pedido_pagamento
-- Gerando em: 01/08/2018 17:01:50
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `pedido_pagamento`;

CREATE TABLE IF NOT EXISTS `pedido_pagamento` (
	`id_pedido_pagamento` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`parcela_atual_pedido_pagamento` int(11) NOT NULL ,
	`parcela_total_pedido_pagamento` int(11) NOT NULL ,
	`valor_pago_pedido_pagamento` float NOT NULL ,
	`bool_esta_pago_pedido_pagamento` int(1) NOT NULL ,
	`pedido_id` int(11) NOT NULL ,
	`condicao_de_pagamento_id` int(200) NOT NULL ,
	`data_atualizacao_pedido_pagamento` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_pedido_pagamento` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro