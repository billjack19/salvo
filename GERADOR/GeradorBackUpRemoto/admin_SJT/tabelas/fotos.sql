
-- Criar tabela fotos
-- Gerando em: 02/08/2018 10:25:00
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `fotos`;

CREATE TABLE IF NOT EXISTS `fotos` (
	`id_fotos` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_fotos` varchar(50) NOT NULL ,
	`imagem_fotos` varchar(100) NOT NULL ,
	`item_id` int(11) NOT NULL ,
	`data_atualizacao_fotos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`usuario_id` int(11) NOT NULL ,
	`bool_ativo_fotos` int(11) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;