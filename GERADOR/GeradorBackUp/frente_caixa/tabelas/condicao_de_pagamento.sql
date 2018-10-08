
-- Criar tabela condicao_de_pagamento
-- Gerando em: 01/08/2018 17:01:47
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `condicao_de_pagamento`;

CREATE TABLE IF NOT EXISTS `condicao_de_pagamento` (
	`id_condicao_de_pagamento` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_condicao_de_pagamento` varchar(200) NOT NULL ,
	`data_atualizacao_condicao_de_pagamento` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_condicao_de_pagamento` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO condicao_de_pagamento ( `id_condicao_de_pagamento`, `descricao_condicao_de_pagamento`, `data_atualizacao_condicao_de_pagamento`, `usuario_id`, `bool_ativo_condicao_de_pagamento`) VALUES ( 1, 'Dinheiro', '2018-06-14 09:57:20', 1, 1);
INSERT INTO condicao_de_pagamento ( `id_condicao_de_pagamento`, `descricao_condicao_de_pagamento`, `data_atualizacao_condicao_de_pagamento`, `usuario_id`, `bool_ativo_condicao_de_pagamento`) VALUES ( 2, 'Cartão Crédito', '2018-06-14 09:57:34', 1, 1);
INSERT INTO condicao_de_pagamento ( `id_condicao_de_pagamento`, `descricao_condicao_de_pagamento`, `data_atualizacao_condicao_de_pagamento`, `usuario_id`, `bool_ativo_condicao_de_pagamento`) VALUES ( 3, 'Cartão Débito', '2018-06-14 09:57:42', 1, 1);
INSERT INTO condicao_de_pagamento ( `id_condicao_de_pagamento`, `descricao_condicao_de_pagamento`, `data_atualizacao_condicao_de_pagamento`, `usuario_id`, `bool_ativo_condicao_de_pagamento`) VALUES ( 4, 'Cheque', '2018-06-14 09:57:48', 1, 1);
INSERT INTO condicao_de_pagamento ( `id_condicao_de_pagamento`, `descricao_condicao_de_pagamento`, `data_atualizacao_condicao_de_pagamento`, `usuario_id`, `bool_ativo_condicao_de_pagamento`) VALUES ( 5, 'Boleto', '2018-06-14 09:57:58', 1, 1);