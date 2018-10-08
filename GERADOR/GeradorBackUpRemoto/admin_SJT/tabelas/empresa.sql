
-- Criar tabela empresa
-- Gerando em: 02/08/2018 10:24:56
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `empresa`;

CREATE TABLE IF NOT EXISTS `empresa` (
	`id_empresa` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_empresa` varchar(200) NOT NULL ,
	`imagem_logo_empresa` varchar(200) NOT NULL ,
	`data_atualizacao_empresa` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_empresa` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;