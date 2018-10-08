
-- Criar tabela operacoes_caixa
-- Gerando em: 01/08/2018 17:01:49
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `operacoes_caixa`;

CREATE TABLE IF NOT EXISTS `operacoes_caixa` (
	`id_operacoes_caixa` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_operacoes_caixa` varchar(200) NOT NULL ,
	`data_atualizacao_operacoes_caixa` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_operacoes_caixa` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO operacoes_caixa ( `id_operacoes_caixa`, `descricao_operacoes_caixa`, `data_atualizacao_operacoes_caixa`, `usuario_id`, `bool_ativo_operacoes_caixa`) VALUES ( 1, 'Sangria', '2018-06-14 10:14:53', 1, 1);
INSERT INTO operacoes_caixa ( `id_operacoes_caixa`, `descricao_operacoes_caixa`, `data_atualizacao_operacoes_caixa`, `usuario_id`, `bool_ativo_operacoes_caixa`) VALUES ( 2, 'Reforço', '2018-06-14 10:15:29', 1, 1);
INSERT INTO operacoes_caixa ( `id_operacoes_caixa`, `descricao_operacoes_caixa`, `data_atualizacao_operacoes_caixa`, `usuario_id`, `bool_ativo_operacoes_caixa`) VALUES ( 3, 'Devolução', '2018-06-14 10:15:33', 1, 1);
INSERT INTO operacoes_caixa ( `id_operacoes_caixa`, `descricao_operacoes_caixa`, `data_atualizacao_operacoes_caixa`, `usuario_id`, `bool_ativo_operacoes_caixa`) VALUES ( 4, 'Fechamento', '2018-06-14 10:15:46', 1, 0);