
-- Criar tabela topicos_loja
-- Gerando em: 02/08/2018 10:25:26
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `topicos_loja`;

CREATE TABLE IF NOT EXISTS `topicos_loja` (
	`id_topicos_loja` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_topicos_loja` varchar(100) NOT NULL ,
	`descricao_topicos_loja` varchar(100) NOT NULL ,
	`loja_id` int(11) NOT NULL ,
	`data_atualizacao_topicos_loja` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_topicos_loja` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;