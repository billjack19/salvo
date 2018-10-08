
-- Criar tabela notificacoes_salvas
-- Gerando em: 01/08/2018 17:00:34
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `notificacoes_salvas`;

CREATE TABLE IF NOT EXISTS `notificacoes_salvas` (
	`id_notificacoes_salvas` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_notificacoes_salvas` text NOT NULL ,
	`usuario_atuador_notificacoes_salvas` varchar(200) NOT NULL ,
	`usuaio_requerente_notificacoes_salvas` varchar(200) NOT NULL ,
	`tipo_alteracao_notificacoes_salvas` varchar(50) NOT NULL ,
	`notificacoes_config_id` int(200) NOT NULL ,
	`data_atualizacao_notificacoes_salvas` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_notificacoes_salvas` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO notificacoes_salvas ( `id_notificacoes_salvas`, `descricao_notificacoes_salvas`, `usuario_atuador_notificacoes_salvas`, `usuaio_requerente_notificacoes_salvas`, `tipo_alteracao_notificacoes_salvas`, `notificacoes_config_id`, `data_atualizacao_notificacoes_salvas`, `bool_ativo_notificacoes_salvas`) VALUES ( 1, '<b>Aréa de Atuação: </b>pedido_item-pedido<br><b>Registro inserido:</b><br>Item => /%/SELECT * FROM item WHERE id_item = 1/%/<br>Quantidade => 15<br>Valor Unitário => 250<br>Total => 3750<br>Pedido => /%/SELECT * FROM pedido WHERE id_pedido = 1/%/<br>Usuário => /%/SELECT * FROM usuario WHERE id_usuario = 1/%/<br>Ativo => Sim<br>', '1', '1', 'i', 1, '2018-04-14 08:28:12', 1);