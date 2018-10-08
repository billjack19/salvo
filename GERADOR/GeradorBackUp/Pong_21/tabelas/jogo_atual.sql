
-- Criar tabela jogo_atual
-- Gerando em: 01/08/2018 16:58:54
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `jogo_atual`;

CREATE TABLE IF NOT EXISTS `jogo_atual` (
	`id_jogo_atual` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`resultado_jogo_atual` enum('jog_1','jog_2') NOT NULL ,
	`data_atualizacao_jogo_atual` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_jogo_atual` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO jogo_atual ( `id_jogo_atual`, `resultado_jogo_atual`, `data_atualizacao_jogo_atual`, `usuario_id`, `bool_ativo_jogo_atual`) VALUES ( 1, 'jog_2', '2018-02-22 10:15:31', 1, 0);