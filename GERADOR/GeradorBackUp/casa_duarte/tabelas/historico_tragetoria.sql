
-- Criar tabela historico_tragetoria
-- Gerando em: 01/08/2018 17:00:33
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `historico_tragetoria`;

CREATE TABLE IF NOT EXISTS `historico_tragetoria` (
	`id_historico_tragetoria` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`localizacao_historico_tragetoria` varchar(100) NOT NULL ,
	`caminhao_id` int(11) NOT NULL ,
	`viagem_simples_id` int(11) NOT NULL ,
	`usuario_id` int(11) NOT NULL ,
	`data_atualizacao_historico_tragetoria` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_historico_tragetoria` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: Nenhum registro