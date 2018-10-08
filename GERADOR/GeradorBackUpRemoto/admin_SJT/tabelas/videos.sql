
-- Criar tabela videos
-- Gerando em: 02/08/2018 10:25:30
-- Pelo Gerador JK-19

DROP TABLE IF EXISTS `videos`;

CREATE TABLE IF NOT EXISTS `videos` (
	`id_videos` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`descricao_videos` text NOT NULL ,
	`link_videos` varchar(200) NOT NULL ,
	`data_atualizacao_videos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
	`bool_ativo_videos` int(1) NOT NULL DEFAULT 1 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;