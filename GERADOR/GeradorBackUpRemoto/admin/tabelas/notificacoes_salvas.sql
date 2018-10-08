
-- Criar tabela notificacoes_salvas
-- Gerando em: 01/08/2018 16:52:09
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


-- Dados da tabela: Nenhum registro