
-- Criar tabela historico_jogo
-- Gerando em: 01/08/2018 16:58:54
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `historico_jogo`;

CREATE TABLE IF NOT EXISTS `historico_jogo` (
	`id_historico_jogo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`sequencia_historico_jogo` int(11) NOT NULL ,
	`placar_historico_jogo` varchar(200) NOT NULL ,
	`jogos_id` int(11) NOT NULL ,
	`data_atualizacao_historico_jogo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_historico_jogo` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO historico_jogo ( `id_historico_jogo`, `sequencia_historico_jogo`, `placar_historico_jogo`, `jogos_id`, `data_atualizacao_historico_jogo`, `usuario_id`, `bool_ativo_historico_jogo`) VALUES ( 1, 1, '1-0', 1, '2018-02-22 10:10:45', 1, 1);
INSERT INTO historico_jogo ( `id_historico_jogo`, `sequencia_historico_jogo`, `placar_historico_jogo`, `jogos_id`, `data_atualizacao_historico_jogo`, `usuario_id`, `bool_ativo_historico_jogo`) VALUES ( 2, 2, '2-0', 1, '2018-02-22 10:10:52', 1, 1);
INSERT INTO historico_jogo ( `id_historico_jogo`, `sequencia_historico_jogo`, `placar_historico_jogo`, `jogos_id`, `data_atualizacao_historico_jogo`, `usuario_id`, `bool_ativo_historico_jogo`) VALUES ( 3, 3, '2-1', 1, '2018-02-22 10:11:04', 1, 1);
INSERT INTO historico_jogo ( `id_historico_jogo`, `sequencia_historico_jogo`, `placar_historico_jogo`, `jogos_id`, `data_atualizacao_historico_jogo`, `usuario_id`, `bool_ativo_historico_jogo`) VALUES ( 4, 4, '2-2', 1, '2018-02-22 10:11:19', 1, 1);
INSERT INTO historico_jogo ( `id_historico_jogo`, `sequencia_historico_jogo`, `placar_historico_jogo`, `jogos_id`, `data_atualizacao_historico_jogo`, `usuario_id`, `bool_ativo_historico_jogo`) VALUES ( 5, 5, '2-3', 1, '2018-02-22 10:11:34', 1, 1);
INSERT INTO historico_jogo ( `id_historico_jogo`, `sequencia_historico_jogo`, `placar_historico_jogo`, `jogos_id`, `data_atualizacao_historico_jogo`, `usuario_id`, `bool_ativo_historico_jogo`) VALUES ( 6, 6, '3-3', 1, '2018-02-22 10:11:40', 1, 1);
INSERT INTO historico_jogo ( `id_historico_jogo`, `sequencia_historico_jogo`, `placar_historico_jogo`, `jogos_id`, `data_atualizacao_historico_jogo`, `usuario_id`, `bool_ativo_historico_jogo`) VALUES ( 7, 7, '4-3', 1, '2018-02-22 10:11:47', 1, 1);
INSERT INTO historico_jogo ( `id_historico_jogo`, `sequencia_historico_jogo`, `placar_historico_jogo`, `jogos_id`, `data_atualizacao_historico_jogo`, `usuario_id`, `bool_ativo_historico_jogo`) VALUES ( 8, 8, '5-3', 1, '2018-02-22 10:11:52', 1, 1);