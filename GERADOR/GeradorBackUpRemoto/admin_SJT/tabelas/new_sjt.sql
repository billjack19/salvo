
-- Criar tabela new_sjt
-- Gerando em: 02/08/2018 10:25:07
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `new_sjt`;

CREATE TABLE IF NOT EXISTS `new_sjt` (
	`id_new_sjt` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_new_sjt` varchar(50) NOT NULL ,
	`imagem_demonstrativa_new_sjt` varchar(100) NOT NULL ,
	`numero_edicao_new_sjt` int(3) NOT NULL ,
	`data_atualizacao_new_sjt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_new_sjt` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;