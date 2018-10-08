
-- Criar tabela nivel_acesso
-- Gerando em: 01/08/2018 17:00:33
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
INSERT INTO nivel_acesso ( `id_nivel_acesso`, `descricao_nivel_acesso`, `area_nivel_acesso`, `data_atualizacao_nivel_acesso`, `usuario_id`, `bool_ativo_nivel_acesso`) VALUES ( 1, 'Nivel Administrador', 'bairro+caminhao+cliente+geocodificacao+item+motorista+pedido+regiao+viagem+viagem_item-viagem+pedido_item-pedido+bairro-regiao+cliente_contato-cliente+upload+mapa+mov+relatorio+notificacao+usuario', '2018-04-19 10:58:58', 1, 1);