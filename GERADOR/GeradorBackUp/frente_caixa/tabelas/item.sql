
-- Criar tabela item
-- Gerando em: 01/08/2018 17:01:48
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `item`;

CREATE TABLE IF NOT EXISTS `item` (
	`id_item` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_item` varchar(200) NOT NULL ,
	`grupo_id` int(100) NOT NULL ,
	`data_atualizacao_item` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_item` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO item ( `id_item`, `descricao_item`, `grupo_id`, `data_atualizacao_item`, `usuario_id`, `bool_ativo_item`) VALUES ( 1, 'Pão Francês', 1, '2018-06-14 10:13:45', 1, 1);
INSERT INTO item ( `id_item`, `descricao_item`, `grupo_id`, `data_atualizacao_item`, `usuario_id`, `bool_ativo_item`) VALUES ( 2, 'Rosca', 1, '2018-06-14 10:14:29', 1, 1);