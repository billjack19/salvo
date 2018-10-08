
-- Criar tabela nivel_acesso
-- Gerando em: 01/08/2018 17:01:48
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `nivel_acesso`;

CREATE TABLE IF NOT EXISTS `nivel_acesso` (
	`id_nivel_acesso` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_nivel_acesso` varchar(200) NOT NULL ,
	`area_nivel_acesso` text NOT NULL ,
	`data_atualizacao_nivel_acesso` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_nivel_acesso` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO nivel_acesso ( `id_nivel_acesso`, `descricao_nivel_acesso`, `area_nivel_acesso`, `data_atualizacao_nivel_acesso`, `usuario_id`, `bool_ativo_nivel_acesso`) VALUES ( 1, 'Nivel Administrador', 'caixa+cliente+condicao_de_pagamento+empresa+estado+filial+grupo+item+operacoes_caixa+unidade_medida+item-grupo+item_unidade_medida-item+cliente_contato-cliente+cliente_endereco-cliente+pedido_item-pedido+pedido_pagamento-pedido+pedido_pagamento_extorno-pedido_pagamento+caixa_operacao-caixa_movimentacao+filial-empresa+upload+mapa+mov+relatorio+notificacao+usuario', '2018-06-14 10:41:22', 1, 1);