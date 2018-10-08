
-- Criar tabela supermercado
-- Gerando em: 01/08/2018 17:01:24
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `supermercado`;

CREATE TABLE IF NOT EXISTS `supermercado` (
	`id_supermercado` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_supermercado` varchar(200) NOT NULL ,
	`data_atualizacao_supermercado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_supermercado` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO supermercado ( `id_supermercado`, `descricao_supermercado`, `data_atualizacao_supermercado`, `usuario_id`, `bool_ativo_supermercado`) VALUES ( 0, 'Sem Supermercado', '2018-07-30 16:45:54', 1, 1);
INSERT INTO supermercado ( `id_supermercado`, `descricao_supermercado`, `data_atualizacao_supermercado`, `usuario_id`, `bool_ativo_supermercado`) VALUES ( 1, 'Bretas', '2018-05-21 14:45:51', 1, 1);
INSERT INTO supermercado ( `id_supermercado`, `descricao_supermercado`, `data_atualizacao_supermercado`, `usuario_id`, `bool_ativo_supermercado`) VALUES ( 2, 'Fonceca', '2018-05-21 14:45:55', 1, 1);
INSERT INTO supermercado ( `id_supermercado`, `descricao_supermercado`, `data_atualizacao_supermercado`, `usuario_id`, `bool_ativo_supermercado`) VALUES ( 3, 'San Michael', '2018-05-21 14:46:07', 1, 1);
INSERT INTO supermercado ( `id_supermercado`, `descricao_supermercado`, `data_atualizacao_supermercado`, `usuario_id`, `bool_ativo_supermercado`) VALUES ( 4, 'Super Vale', '2018-05-21 14:46:19', 1, 1);
INSERT INTO supermercado ( `id_supermercado`, `descricao_supermercado`, `data_atualizacao_supermercado`, `usuario_id`, `bool_ativo_supermercado`) VALUES ( 5, 'Almeida', '2018-05-21 14:46:33', 1, 1);
INSERT INTO supermercado ( `id_supermercado`, `descricao_supermercado`, `data_atualizacao_supermercado`, `usuario_id`, `bool_ativo_supermercado`) VALUES ( 6, 'VN', '2018-07-07 22:03:33', 1, 1);