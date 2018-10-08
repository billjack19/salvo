
-- Criar tabela equivalentes
-- Gerando em: 01/08/2018 17:01:21
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `equivalentes`;

CREATE TABLE IF NOT EXISTS `equivalentes` (
	`id_equivalentes` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`codigo_equivalentes` varchar(50) NOT NULL ,
	`especificacao_equivalentes` varchar(100)  ,
	`item_id` int(100) NOT NULL ,
	`data_atualizacao_equivalentes` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_equivalentes` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dados da tabela: 
INSERT INTO equivalentes ( `id_equivalentes`, `codigo_equivalentes`, `especificacao_equivalentes`, `item_id`, `data_atualizacao_equivalentes`, `usuario_id`, `bool_ativo_equivalentes`) VALUES ( 1, '7896020160052', 'Embalagem Azul', 6, '2018-07-26 20:27:05', 1, 1);