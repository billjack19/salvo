
-- Criar tabela situacao
-- Gerando em: 02/08/2018 10:25:24
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `situacao`;

CREATE TABLE IF NOT EXISTS `situacao` (
	`id_situacao` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_situacao` varchar(200) NOT NULL ,
	`cor_situacao` varchar(20) NOT NULL ,
	`data_atualizacao_situacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_situacao` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;