
-- Criar tabela jogos
-- Gerando em: 01/08/2018 16:58:54
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `jogos`;

CREATE TABLE IF NOT EXISTS `jogos` (
	`id_jogos` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_jogos` varchar(200) NOT NULL ,
	`jogador_1_jogos` int(11) NOT NULL ,
	`jogador_2_jogos` int(11) NOT NULL ,
	`resultado_jogos` varchar(200) NOT NULL ,
	`data_atualizacao_jogos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_jogos` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO jogos ( `id_jogos`, `descricao_jogos`, `jogador_1_jogos`, `jogador_2_jogos`, `resultado_jogos`, `data_atualizacao_jogos`, `usuario_id`, `bool_ativo_jogos`) VALUES ( 1, 'teset', 1, 2, '5-3', '2018-02-22 10:10:30', 1, 1);