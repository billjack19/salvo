
-- Criar tabela loja
-- Gerando em: 02/08/2018 10:25:06
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `loja`;

CREATE TABLE IF NOT EXISTS `loja` (
	`id_loja` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`titulo_loja` varchar(100) NOT NULL ,
	`descricao_loja` varchar(100)  ,
	`imagem_loja` varchar(100)  ,
	`configurar_site_id` int(11) NOT NULL ,
	`data_atualizacao_loja` datetime  DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_loja` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;