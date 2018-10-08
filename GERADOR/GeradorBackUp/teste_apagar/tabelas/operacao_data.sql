
-- Criar tabela operacao_data
-- Gerando em: 01/08/2018 16:54:08
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `operacao_data`;

CREATE TABLE IF NOT EXISTS `operacao_data` (
	`id_operacao_data` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`data_1_operacao_data` date NOT NULL ,
	`data_2_operacao_data` int(11) NOT NULL ,
	`resultado_data_operacao_data` date NOT NULL ,
	`data_atualizacao_operacao_data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_operacao_data` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro